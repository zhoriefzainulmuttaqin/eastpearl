<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FasilitasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $facilities = ([
            ([
                'name' => 'Makan',
                'name_en' => 'Eat',
                'name_mandarin' => '吃',
            ]),
            ([
                'name' => 'Tourguide Profesional',
                'name_en' => 'Tourguide Profesional',
                'name_mandarin' => '专业导游',
            ]),
            ([
                'name' => 'Air Mineral',
                'name_en' => 'Mineral Water',
                'name_mandarin' => '矿泉水',
            ]),
            ([
                'name' => 'Life jacket/vest',
                'name_en' => 'Life jacket/vest',
                'name_mandarin' => '救生衣/背心',
            ]),
        ]);

        DB::table('facilities')->insert($facilities);
    }
}