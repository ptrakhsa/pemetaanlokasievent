<?php

namespace Database\Seeders;

use App\Models\Event;
use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     "
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seede"d
     */
    public function run()
    {
        $faker = Faker::create();
        $dt = new DateTime;

        DB::table('events')->insert([
            [
                "name" => "Event galeria mall",
                "position" => DB::raw("ST_GeomFromText('POINT(110.36051135103978 -7.751823562463178)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.751823562463178,110.36051135103978",
                'location' => "galeria mall",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Graha UGM",
                "position" => DB::raw("ST_GeomFromText('POINT(110.37782533410076 -7.770251638746828)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.770251638746828,110.37782533410076",
                'location' => "Graha UGM",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Malioboro Yogyakarta",
                "position" => DB::raw("ST_GeomFromText('POINT(110.36588792192126 -7.791903826254844)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.791903826254844,110.36588792192126",
                'location' => "Malioboro Yogyakarta",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Rumah Hantu Malioboro",
                "position" => DB::raw("ST_GeomFromText('POINT(110.36524862738847 -7.7955240296755)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.7955240296755,110.36524862738847",
                'location' => "Rumah Hantu Malioboro",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Alun-alun Utara",
                "position" => DB::raw("ST_GeomFromText('POINT(110.36457646626006 -7.8036826323673365)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.8036826323673365,110.36457646626006",
                'location' => "Alun-alun Utara",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Hutan Pinus",
                "position" => DB::raw("ST_GeomFromText('POINT(110.43204265428571 -7.925889639813071)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.925889639813071,110.43204265428571",
                'location' => "Hutan Pinus",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Heha Ocean View",
                "position" => DB::raw("ST_GeomFromText('POINT(110.4615208258146 -8.10575836644449)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-8.10575836644449,110.4615208258146",
                'location' => "Heha Ocean View",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Ledok Sambi",
                "position" => DB::raw("ST_GeomFromText('POINT(110.42825000067224 -7.64684972577411)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.64684972577411,110.42825000067224",
                'location' => "Ledok Sambi",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Taman Merapi Yogyakarta",
                "position" => DB::raw("ST_GeomFromText('POINT(110.42181334297364 -7.6203681463691915)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.6203681463691915,110.42181334297364",
                'location' => "Taman Merapi Yogyakarta",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Suraloka Zoo",
                "position" => DB::raw("ST_GeomFromText('POINT(110.42148185027408 -7.606597657727463)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.606597657727463,110.42148185027408",
                'location' => "Suraloka Zoo",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Teras Merapi",
                "position" => DB::raw("ST_GeomFromText('POINT(110.45589624669641 -7.584781751348995)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.584781751348995,110.45589624669641",
                'location' => "Teras Merapi",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Stadion Madya Mandala",
                "position" => DB::raw("ST_GeomFromText('POINT(110.38430137378029 -7.795475867129514)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.795475867129514,110.38430137378029",
                'location' => "Stadion Madya Mandala",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Taman Pintar Yogyakarta",
                "position" => DB::raw("ST_GeomFromText('POINT(110.36775906414765 -7.800486716182875)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.800486716182875,110.36775906414765",
                'location' => "Taman Pintar Yogyakarta",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Taman Budaya Yogyakarta",
                "position" => DB::raw("ST_GeomFromText('POINT(110.36764988050301 -7.799930108450771)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.799930108450771,110.36764988050301",
                'location' => "Taman Budaya Yogyakarta",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Titik Nol Kilometer Yogyakarta",
                "position" => DB::raw("ST_GeomFromText('POINT(110.36477883416917 -7.801311700759353)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.801311700759353,110.36477883416917",
                'location' => "Titik Nol Kilometer Yogyakarta",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Museum sonobudoyo Unit 1",
                "position" => DB::raw("ST_GeomFromText('POINT(110.36454901245968 -7.802209467288816)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.802209467288816,110.36454901245968",
                'location' => "Museum sonobudoyo Unit 1",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Alun-alun Kidul",
                "position" => DB::raw("ST_GeomFromText('POINT(110.36310595255604 -7.8117809536176575)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.8117809536176575,110.36310595255604",
                'location' => "Alun-alun Kidul",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Kampung Wisata Tamansari",
                "position" => DB::raw("ST_GeomFromText('POINT(110.35931589602912 -7.809820230150456)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.809820230150456,110.35931589602912",
                'location' => "Kampung Wisata Tamansari",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Monumen Yogya Kembali",
                "position" => DB::raw("ST_GeomFromText('POINT(110.36956694493706 -7.749108634722534)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.749108634722534,110.36956694493706",
                'location' => "Monumen Yogya Kembali",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Jogja Bay",
                "position" => DB::raw("ST_GeomFromText('POINT(110.41935511534935 -7.748971553595012)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.748971553595012,110.41935511534935",
                'location' => "Jogja Bay",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Candi Gebang",
                "position" => DB::raw("ST_GeomFromText('POINT(110.41633181878827 -7.751246746715519)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.751246746715519,110.41633181878827",
                'location' => "Candi Gebang",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Candi Prambanan",
                "position" => DB::raw("ST_GeomFromText('POINT(110.49139855375093 -7.7511342341190215)',4326)"),
                'start_date' => date('Y-m-d H:i:s'),
                'end_date' => date('Y-m-d H:i:s', strtotime("+3 days")),
                "description" => $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.7511342341190215,110.49139855375093",
                'location' => "Candi Prambanan",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],


            // DATA TEST : SATU TEMPAT BANYAK EVENT BEDA JAM
            [
                "name" => "Event Plaza Ambarukmo 1",
                "position" => DB::raw("ST_GeomFromText('POINT(110.40141912419814 -7.781336868828283)',4326)"),
                'start_date' => $dt->setTime(9, 0, 0)->format('Y-m-d H:i:s'),
                'end_date' => $dt->setTime(12, 0, 0)->format('Y-m-d H:i:s'),
                "description" => "[TEST]_BEDAJAM:" . $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.781336868828283,110.40141912419814",
                'location' => "Plaza Ambarukmo",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],
            [
                "name" => "Event Plaza Ambarukmo 2",
                "position" => DB::raw("ST_GeomFromText('POINT(110.40141912419814 -7.781336868828283)',4326)"),
                'start_date' => $dt->setTime(13, 0, 0)->format('Y-m-d H:i:s'),
                'end_date' => $dt->setTime(15, 0, 0)->format('Y-m-d H:i:s'),
                "description" => "[TEST]_BEDAJAM:" . $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.781336868828283,110.40141912419814",
                'location' => "Plaza Ambarukmo",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],


            // DATA TEST : EVENT TAUN DEPAN
            [
                "name" => "Event Gunung kidul tahun depan", // diselenggarakan dua hari 
                "position" => DB::raw("ST_GeomFromText('POINT(110.60214696749847 -7.9617187575403925)',4326)"),
                'start_date' => date('Y-m-d H:i:s', strtotime("+365 days")),
                'end_date' => date('Y-m-d H:i:s', strtotime("+368 days")),
                "description" => "[TEST]_TAHUNDEPAN:" . $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.9617187575403925,110.60214696749847",
                'location' => "Plaza Ambarukmo",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],


            // DATA TEST : EVENT YANG DITAKEDOWN
            [
                "name" => "EventWates", // diselenggarakan dua hari 
                "position" => DB::raw("ST_GeomFromText('POINT(110.14206552364774 -7.894417885238265)',4326)"),
                'start_date' => date('Y-m-d H:i:s', strtotime("+14 days")),
                'end_date' => date('Y-m-d H:i:s', strtotime("+15 days")),
                "description" => "[TEST]_DITAKEDOWN:" . $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.894417885238265,110.14206552364774",
                'location' => "Plaza Ambarukmo",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],


            [
                "name" => "Sindu Kusuma Edupark",
                "position" => DB::raw("ST_GeomFromText('POINT(110.35320652788593 -7.764205902265705)',4326)"),
                'start_date' => date('Y-m-d H:i:s', strtotime("+14 days")),
                'end_date' => date('Y-m-d H:i:s', strtotime("+15 days")),
                "description" =>  $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-7.764205902265705,110.35320652788593",
                'location' => 'Sindu Kusuma Edupark',
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ],

        ]);


        // SUBMITTED EVENTS 
        // insert all data waiting
        $waiting =  collect(DB::table('events')->pluck('id'))->map(function ($id) {
            return [
                'event_id' => $id,
                'status' => 'waiting'
            ];
        })->toArray();
        DB::table('submitted_events')->insert($waiting);

        // verified
        $verified =  collect(DB::table('events')->pluck('id'))->map(function ($id) {
            return [
                'event_id' => $id,
                'status' => 'verified'
            ];
        })->toArray();
        DB::table('submitted_events')->insert($verified);

        // DATA TEST : EVENT YANG DITOLAK
        // rejected
        DB::table('events')->insert(
            [
                "name" => "EventAustralia",
                "position" => DB::raw("ST_GeomFromText('POINT(135.00128814750178 -23.762681285706176)',4326)"),
                'start_date' => date('Y-m-d H:i:s', strtotime("+365 days")),
                'end_date' => date('Y-m-d H:i:s', strtotime("+368 days")),
                "description" => "[TEST]_DITOLAK:" . $faker->text(),
                'content' => $this->quilHTMLContent(),
                'photo' => $this->sampleImages(),
                'link' => "https://www.google.com/maps/dir/?api=1&destination=-23.762681285706176,135.00128814750178",
                'location' => "Australia kota",
                'organizer_id' => \App\Models\Organizer::inRandomOrder()->first()->id,
                'category_id' => \App\Models\Category::inRandomOrder()->first()->id,
            ]
        );
        $rejected_id = DB::table('events')->where('name', '=', 'EventAustralia')->value('id');
        DB::table('submitted_events')->insert([
            'event_id' => $rejected_id,
            'status' => 'waiting'
        ]);
        DB::table('submitted_events')->insert([
            'event_id' => $rejected_id,
            'status' => 'rejected'
        ]);


        // takedown 
        $takedown_id = DB::table('events')->where('name', '=', 'EventWates')->value('id');
        DB::table('submitted_events')->insert([
            'event_id' => $takedown_id,
            'status' => 'takedown'
        ]);
    }


    public function sampleImages()
    {
        $imgs = [
            "1.png",
            "2.png",
            "3.png",
            "4.png",
            "architecture1.jpg",
            "banana.jpg",
            "bg-mountain.jpg",
            "building.jpg",
            "jump.jpg",
            "motorcycle.jpg",
            "origami.jpg",
            "water.jpg",
        ];
        $img = $imgs[rand(0, count($imgs) - 1)];
        $path = "/assets/images/samples/$img";
        return $path;
    }


    public function quilHTMLContent()
    {
        $content = '<p><span class="ql-size-huge">Lorem Ipsum</span></p>
                    <p><br></p>
                    <p><img src="/assets/images/samples/1.png" width="655" style=""></p>
                    <p><br></p>
                    <p style="text-align: justify;">Contrary to popular belief, <strong>Lorem Ipsum</strong> is not simply random text. It has roots in a piece of
                        classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at
                        Hampden-Sydney College in Virginia, looked up one of the more obscure <span
                            style="background-color: rgb(255, 194, 102);">Latin words</span>, consectetur, from a Lorem Ipsum passage, and
                        going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes
                        from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero,
                        written in <u>45 BC</u>. This book is a treatise on the theory of ethics, very popular during the Renaissance. The
                        first line of Lorem Ipsum, "<em>Lorem ipsum dolor sit amet</em>..", <strong style="color: rgb(240, 102, 102);">comes
                            from a line in section 1.10.32</strong>.</p>
                    <p><br></p>
                    <ol><li>Lorem Ipsum is simply dummy text of the printing and typesetting industry</li>
                        <li>Lorem Ipsum has been the industry standard dummy text ever since the 1500s</li>
                        <li>when an unknown printer took a galley of type and scrambled it to make a type specimen book</li>
                        <li><s>its paid promotion</s>, <strong style="color: rgb(230, 0, 0);">its free promotion</strong></li>
                    </ol>
                    <p><br></p>
                    <p><br></p><iframe class="ql-video" frameborder="0" allowfullscreen="true" width="655" height="355"
                        src="https://www.youtube.com/embed/UwsrzCVZAb8?showinfo=0"></iframe>
                    <p><br></p>
                    <p><br></p>
                    <p><img src="/assets/images/samples/socmed/link-ig.png"> <a href="https://instagram.com" target="_blank">ig event</a></p>
                    <p><img src="/assets/images/samples/socmed/link-tt.png"> <a href="https://www.tiktok.com/" target="_blank">tiktok
                            event</a></p>
                    <p><img src="/assets/images/samples/socmed/link-yt.png"> <a href="https://youtube.com" target="_blank">youtube event </a>
                    </p>

                    <p><br></p><p><br></p>
                    <p> thanks and lemme be your partner now </p>';

        return $content;
    }
}
