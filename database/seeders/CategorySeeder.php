<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ([
            ([
                'name' => 'Open Trip',
                'name_en' => 'Open Trip',
                'name_mandarin' => '开放行程',
                'slug' => 'open-trip',
            ]),
            ([
                'name' => 'Private Trip',
                'name_en' => 'Private Trip',
                'name_mandarin' => '私人旅行',
                'slug' => 'private-trip',
            ]),
            ([
                'name' => 'Land Trip',
                'name_en' => 'Land Trip',
                'name_mandarin' => '陆路旅行',
                'slug' => 'Land-trip',
            ]),
            ([
                'name' => 'Fly Bajo',
                'name_en' => 'Fly Bajo',
                'name_mandarin' => '纳闽巴霍飞行',
                'slug' => 'fly-bajo',
            ]),
        ]);

        DB::table('categories')->insert($categories);
    }
}
