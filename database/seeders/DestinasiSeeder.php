<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $destination = ([
            ([

                'image' => 'F3VvXkXRkzo3BvYfrVWntwEg86WQ8VpiX2K03Tl8.png',
                'name' => 'Pulau Padar',
                'name_en' => 'Pulau Padar',
                'name_mandarin' => 'Pulau Padar',
                'description' => 'Pulau Padar',
                'description_en' => 'Pulau Padar',
                'description_mandarin' => 'Pulau Padar',
            ]),
            ([

                'image' => 'F3VvXkXRkzo3BvYfrVWntwEg86WQ8VpiX2K03Tl8.png',
                'name' => 'Pulau Komodo',
                'name_en' => 'Pulau Komodo',
                'name_mandarin' => 'Pulau Komodo',
                'description' => 'Pulau Komodo',
                'description_en' => 'Pulau Komodo',
                'description_mandarin' => 'Pulau Komodo',
            ]),

        ]);

        DB::table('destination')->insert($destination);
    }
}