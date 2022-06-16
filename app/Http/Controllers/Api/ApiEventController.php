<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\PopularPlaces;
use App\Http\Resources\Place as PlaceResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Event, App\Models\SubmittedEvent;
use GuzzleHttp\Psr7\Response;
use Illuminate\Support\Facades\Response as FacadesResponse;
use Illuminate\Support\Facades\Validator;

class ApiEventController extends Controller
{
    public function index(Request $request)
    {
        // lat lng filter
        $lat = $request->query('lat');
        $lng = $request->query('lng');
        $distance_radius_query = '';
        $distance_query = '';
        if ($lat && $lng) {
            $distance_query = ",(6371 * acos(cos(radians($lat)) * cos(radians(lat)) * cos(radians(lng) - radians($lng)) + sin(radians($lat)) * sin(radians(lat)))) AS distance";
            $distance_radius_query = 'HAVING distance < 2 ORDER BY distance';
        }

        // abaikan dulu
        // $popular_place = $request->query('popular_place') ?? 'IS NOT NULL';

        // keyword filter
        $keyword_query = $request->query('keyword') ? 'AND e.name like "%' . $request->query('keyword') . '%"' : '';

        // category filter
        $category_query = $request->query('cat') ? 'AND e.category_id = ' . $request->query('cat') : '';

        // date filter
        $date = $request->query('date');
        $date_query = '';
        if ($date == 'month') {
            $date_query = 'AND month(e.start_date) = month(now())';
        } elseif ($date == 'year') {
            $date_query = 'AND year(e.start_date) = year(now())';
        } else { // default week
            $start_of_week = Carbon::now()->startOfWeek();
            $end_of_week = Carbon::now()->endOfWeek();
            $date_query = "AND e.start_date BETWEEN '$start_of_week' AND '$end_of_week'";
        }



        $native_query = "SELECT 
        e.id, e.name, e.description, e.start_date, e.location, e.lat, e.lng, e.photo, 
        c.name as category_name, e.category_id,
        se.status
        $distance_query
         FROM events e
            inner join submitted_events se on e.id = se.event_id
            inner join categories c on c.id = e.category_id
         where se.status = 'verified' 
         $category_query
         $date_query
         $keyword_query
         GROUP BY e.id
         $distance_radius_query
         ";

        //  return $native_query;

        $places = DB::select($native_query);

        // return response()->json([
        //     'count' => count($places),
        //     'query' => [
        //         [
        //             'lat' => $lat,
        //             'lng' => $lng,
        //             'keyword_query' => $keyword_query,
        //             // 'popular_place' => $popular_place,
        //             'cat' => $category_query,
        //             'date_query' => $date_query,
        //         ]
        //     ],
        //     'data' => $places
        // ]);

        $geoJSONdata = collect($places)->map(function ($place) {
            return [
                'type' => 'Feature',
                'properties' => [
                    'id' => $place->id,
                    'name' => $place->name,
                    'description' => $place->description,
                    'start_date' => date_format(date_create($place->start_date), "H:i, j F Y"),
                    'location' => $place->location,
                    'lat' => $place->lat,
                    'lng' => $place->lng,
                    'photo' => $place->photo,
                    'category_name' => $place->category_name,
                    'category_id' => $place->category_id,
                    'status' => $place->status,
                ],
                'geometry' => [
                    'type' => 'Point',
                    'coordinates' => [
                        $place->lng,
                        $place->lat,
                    ],
                ],
            ];
        });

        return response()->json([
            'type' => 'FeatureCollection',
            'features' => $geoJSONdata,
        ]);
    }

    public function getEventsByOrganizer(Request $request, $id)
    {
        $events = Event::where('organizer_id', $id)->with(['status'])->get();
        return response()->json($events);
    }


    public function eventDetail($id)
    {
        return Event::with(['organizer', 'category'])->find($id);
    }

    public function yogyakartaGeoJSON()
    {
        // $yogyaStr = file_get_contents(storage_path() . '/app/public/geojson/yogyakarta-province.geojson');
        // $yogyaJson = json_decode($yogyaStr, true);
        // return response()->json($yogyaJson);

        $res = DB::select("SELECT name, ST_ASGEOJSON(polygon_area) AS polygon FROM place_boundaries");

        return response()->json([
            "type" => "FeatureCollection",
            "features" => collect($res)->map(function ($place) {
                return [
                    'type' => 'Feature',
                    'properties' => ['region' => $place->name],
                    'geometry' => json_decode($place->polygon),
                ];
            })
        ]);
    }


    public function validateEvent(Request $request)
    {
        $errors = [];
        if ($request->name == null) {
            array_push($errors, ['field' => 'name', 'message' => 'name required']);
        }



        // validate body request from frontend 
        // front end send a body req as json object not form
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'categoryId' => 'required',
            'description' => 'required',
            'date.start' => 'required',
            'date.end' => 'required',
            'location.lat' => 'required',
            'location.lng' => 'required',
        ]);


        if ($validator->fails()) {
            $errors = $validator->errors();
            return response()->json($errors, 422);
        }


        // event must inside jogja 
        $not_in_popular_place = $request->location['popular_place_id'];
        if ($not_in_popular_place == null) {
            $lat = $request->location['lat'];
            $lng = $request->location['lng'];
            $event_as_point_text = "POINT($lng $lat)";
            $jogjaStr = file_get_contents(storage_path() . '/app/public/geojson/yogyakarta-province.geojson');

            $native_query = "SELECT (
                ST_WITHIN(
                        GeomFromText('$event_as_point_text'),
                        ST_GeomFromText(ST_AsText(ST_GeomFromGeoJSON('$jogjaStr')))
                    )
                ) AS is_inside_jogja";
            $is_inside_jogja = DB::select($native_query)[0]->is_inside_jogja == 1 ? true : false;

            if ($is_inside_jogja == false) {
                array_push($errors, ['location' => 'Location must be in Yogyakarta province']);
                return response()->json($errors, 422);
            }
        }

        if (count($errors) == 0) {
            return response()->json(['data' => true, 'status' => 'success', 'messages' => 'all data valid'], 200);
        }
    }


    public function submissionHistory($id)
    {
        return SubmittedEvent::where('event_id', $id)->orderBy('created_at', 'desc')->get();
    }
}
