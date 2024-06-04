<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = ([
            ([
                'name' => 'Alam',
                'name_en' => 'Nature',
                'name_mandarin' => '自然的',
            ]),
            ([
                'name' => 'Budaya',
                'name_en' => 'Culture',
                'name_mandarin' => '文化',
            ]),
            ([
                'name' => 'Tour & Travel',
                'name_en' => 'Tour & Travel',
                'name_mandarin' => '旅游与旅行',
            ]),

        ]);

        DB::table('category_news')->insert($category);
    }
}