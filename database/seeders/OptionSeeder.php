<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Option;

class OptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $options = ([
            ([
                "option_code" => "tourism_card_price",
                "option_value" => "25000",
            ]),
            ([
                "option_code" => "cs_phone",
                "option_value" => "+6285292252220",
            ]),
            ([
                "option_code" => "email",
                "option_value" => "info@eastpearl.id",
            ]),
            ([
                "option_code" => "slogan",
                "option_value" => "Preferred Partner For Travel",
            ]),
            ([
                "option_code" => "fb_link",
                "option_value" => "https://www.facebook.com/profile.php?id=61558959234440",
            ]),
            ([
                "option_code" => "ig_link",
                "option_value" => "https://www.instagram.com/eastpearl.id/",
            ]),
            ([
                "option_code" => "tiktok_link",
                "option_value" => "https://www.tiktok.com/@east.pearl",
            ]),
            ([
                "option_code" => "youtube_link",
                "option_value" => "https://www.youtube.com/channel/UCCkb7FZj67-WU3JBBok3v6w",
            ])
        ]);

        Option::insert($options);
    }
}