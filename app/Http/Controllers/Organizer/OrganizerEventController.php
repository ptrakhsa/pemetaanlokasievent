<?php

namespace App\Http\Controllers\Organizer;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Organizer;
use App\Models\SubmittedEvent;
use Illuminate\Support\Facades\DB;

class OrganizerEventController extends Controller
{
    public function store(Request $request)
    {
        $event = new Event;
        $event->name = $request->name;
        $event->description = $request->description;
        $event->content = $request->content;

        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;

        $event->location = $request->location;

        $event->lat = $request->lat;
        $event->lng = $request->lng;

        $event->position = DB::raw("ST_GeomFromText('POINT($request->lng $request->lat)',4326)");

        $event->popular_place_id = $request->popular_place_id;

        // save uploaded file
        $fileName = time() . '_' . $request->file('photo')->getClientOriginalName();
        $filePath = $request->file('photo')->storeAs('events', $fileName, 'public');
        $event->photo =  '/storage/' . $filePath;

        // set to google map route link
        $event->link = "https://www.google.com/maps/dir/?api=1&destination=$request->lat,$request->lng";
        $event->organizer_id = Auth::guard('organizer')->user()->id;
        $event->category_id = $request->category_id;

        $event->save();


        // create submission 
        SubmittedEvent::create([
            'status' => 'waiting',
            'event_id' => $event->id,
        ]);
        return redirect()->route('organizer.dashboard');
    }


    public function organizerEventDetail($id)
    {
        $event = DB::table('events')
            ->select('events.id', 'events.name', 'events.description', 'events.content', 'events.start_date', 'events.end_date', 'events.location', 'events.photo', 'events.link')
            ->addSelect('categories.name AS category_name', 'organizers.name AS organizer_name')
            ->join('categories', 'categories.id', '=', 'events.category_id')
            ->join('organizers', 'organizers.id', '=', 'events.organizer_id')
            ->where('events.id', $id)
            ->first();

        return view('organizer.event-detail', compact('event'));
    }

    public function organizerEventEdit($id)
    {
        $event = DB::table('events')
            ->select('events.id', 'events.name', 'events.description', 'events.content', 'events.start_date', 'events.end_date', 'events.location', 'events.photo', 'events.link')
            ->addSelect('categories.name AS category_name', 'organizers.name AS organizer_name')
            ->join('categories', 'categories.id', '=', 'events.category_id')
            ->join('organizers', 'organizers.id', '=', 'events.organizer_id')
            ->where('events.id', $id)
            ->first();
            
        return view('organizer.event-edit', ['event' => $event]);
    }

    public function organizerActivity()
    {
        $id = auth()->guard('organizer')->user()->id;
        /**
         * expected result {created_at, status, event_name}
         */

        $activities = DB::select('select se.created_at, se.status, se.reason, e.name as event_name,e.organizer_id from submitted_events se inner  join events e on se.event_id = e.id where e.organizer_id = ' . $id . ' order by se.created_at desc');
        // return $activities;

        return view('organizer.activity', ['activities' => $activities]);
    }
}
