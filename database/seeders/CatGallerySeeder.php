<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CatGallerySeeder extends Seeder
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
                'slug' => 'alam',
            ]),
            ([
                'name' => 'Budaya',
                'name_en' => 'Culture',
                'name_mandarin' => '文化',
                'slug' => 'budaya',
            ]),

        ]);

        DB::table('category_gallery')->insert($category);
    }
}