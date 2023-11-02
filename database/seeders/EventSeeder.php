<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = ([
            ([
                "admin_id"   => 1,
                "cover_picture"   => "pentas-seni.jpg",
                "name"   => "Pentas Seni & Festifal Band 2023",
                "name_en"   => "Art Showcase & Band Festival 2023",
                "slug"   => "pentas-seni",
                "location"   => "Kantor Bupati, Cirebon",
                "published_date"   => "2023-10-20",
                "published_time"   => "12:00",
                "start_date"   => "2023-10-31",
                "start_time"   => "12:00",
                "end_date"   => "2023-10-31",
                "end_time"   => "16:00",
                "details"   => "Ayoo ikut serta dan menangkan hadiahnya",
                "details_en"   => "Come and join to win the prizes",
            ]),
            ([
                "admin_id"   => 1,
                "cover_picture"   => "pentas-seni.jpg",
                "name"   => "Pentas Seni & Festifal Band 2022",
                "name_en"   => "Art Showcase & Band Festival 2022",
                "slug"   => "pentas-seni",
                "location"   => "Kantor Bupati, Cirebon",
                "published_date"   => "2022-10-07",
                "published_time"   => "12:00",
                "start_date"   => "2022-10-10",
                "start_time"   => "12:00",
                "end_date"   => "2022-10-10",
                "end_time"   => "16:00",
                "details"   => "Ayoo ikut serta dan menangkan hadiahnya",
                "details_en"   => "Come and join to win the prizes",
            ]),
            ([
                "admin_id"   => 1,
                "cover_picture"   => "pentas-seni.jpg",
                "name"   => "Pentas Seni & Festifal Band 2021",
                "name_en"   => "Art Showcase & Band Festival 2021",
                "slug"   => "pentas-seni",
                "location"   => "Kantor Bupati, Cirebon",
                "published_date"   => "2021-10-11",
                "published_time"   => "12:00",
                "start_date"   => "2021-10-12",
                "start_time"   => "12:00",
                "end_date"   => "2021-10-12",
                "end_time"   => "16:00",
                "details"   => "Ayoo ikut serta dan menangkan hadiahnya",
                "details_en"   => "Come and join to win the prizes",
            ]),
            ([
                "admin_id"   => 1,
                "cover_picture"   => "pentas-seni.jpg",
                "name"   => "Pentas Seni & Festifal Band 2020",
                "name_en"   => "Art Showcase & Band Festival 2020",
                "slug"   => "pentas-seni",
                "location"   => "Kantor Bupati, Cirebon",
                "published_date"   => "2020-10-11",
                "published_time"   => "12:00",
                "start_date"   => "2020-10-12",
                "start_time"   => "12:00",
                "end_date"   => "2020-10-12",
                "end_time"   => "16:00",
                "details"   => "Ayoo ikut serta dan menangkan hadiahnya",
                "details_en"   => "Come and join to win the prizes",
            ]),
            ([
                "admin_id"   => 1,
                "cover_picture"   => "pentas-seni.jpg",
                "name"   => "Pentas Seni & Festifal Band 2019",
                "name_en"   => "Art Showcase & Band Festival 2019",
                "slug"   => "pentas-seni",
                "location"   => "Kantor Bupati, Cirebon",
                "published_date"   => "2019-10-11",
                "published_time"   => "12:00",
                "start_date"   => "2019-10-12",
                "start_time"   => "12:00",
                "end_date"   => "2019-10-12",
                "end_time"   => "16:00",
                "details"   => "Ayoo ikut serta dan menangkan hadiahnya",
                "details_en"   => "Come and join to win the prizes",
            ]),
            ([
                "admin_id"   => 1,
                "cover_picture"   => "pentas-seni.jpg",
                "name"   => "Pentas Seni & Festifal Band 2018",
                "name_en"   => "Art Showcase & Band Festival 2018",
                "slug"   => "pentas-seni",
                "location"   => "Kantor Bupati, Cirebon",
                "published_date"   => "2018-10-11",
                "published_time"   => "12:00",
                "start_date"   => "2018-10-12",
                "start_time"   => "12:00",
                "end_date"   => "2018-10-12",
                "end_time"   => "16:00",
                "details"   => "Ayoo ikut serta dan menangkan hadiahnya",
                "details_en"   => "Come and join to win the prizes",
            ]),
        ]);

        DB::table('events')->insert($events);
    }
}
