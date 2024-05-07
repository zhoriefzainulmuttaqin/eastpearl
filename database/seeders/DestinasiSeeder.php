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

                'image' => 'kCkIBDRm8EtuPYrAtfxYRNus3aaI0ksiF0QKb1PO.png',
                'name' => 'Pulau Padar',
                'name_en' => 'Pulau Padar',
                'name_mandarin' => 'Pulau Padar',
                'description' => 'Pulau Padar adalah permata menakjubkan yang terletak di Taman Nasional Komodo di Indonesia. Terkenal dengan panorama dan bentang alamnya yang menakjubkan, Pulau Padar menawarkan pengunjung kesempatan untuk mendaki ke titik tertinggi dan menyaksikan pemandangan spektakuler menghadap tiga pantai dengan warna berbeda. Dengan medan terjal, perairan sebening kristal, dan kehidupan laut yang dinamis, Pulau Padar adalah surga bagi pecinta alam dan pencari petualangan.',
                'description_en' => 'Padar Island is a stunning gem located within the Komodo National Park in Indonesia. Famous for its panoramic views and breathtaking landscapes, Padar Island offers visitors the opportunity to hike to its highest point and witness spectacular vistas overlooking three different colored beaches. With its rugged terrain, crystal-clear waters, and vibrant marine life, Padar Island is a paradise for nature enthusiasts and adventure seekers alike.',
                'description_mandarin' => '帕达岛位于印度尼西亚的科莫多国家公园内，是一个令人惊叹的宝石。以其全景美景和令人叹为观止的景观而闻名，帕达岛为游客提供了徒步登上其最高点并欣赏俯瞰三个不同颜色海滩的壮丽景色的机会。凭借其崎岖的地形、清澈的水域和丰富的海洋生物，帕达岛是自然爱好者和冒险追求者的天堂。',
            ]),
            ([

                'image' => 'NLln0ypOcm4AmdIckspeUwD9uMavS2om27gXF2gw.png',
                'name' => 'Pulau Komodo',
                'name_en' => 'Pulau Komodo',
                'name_mandarin' => 'Pulau Komodo',
                'description' => 'Pulau Komodo yang terletak di kepulauan Indonesia terkenal sebagai habitat komodo, kadal terbesar di dunia. Situs Warisan Dunia UNESCO ini terkenal dengan bentang alamnya yang terjal, hutan lebat, dan pantainya yang masih asli. Pengunjung Pulau Komodo berkesempatan untuk menyaksikan tingkah laku komodo yang mempesona di habitat aslinya, serta menjelajahi beragam biota laut di pulau tersebut melalui snorkeling dan diving. Keindahan alam pulau yang menakjubkan dan satwa liar yang unik menjadikannya destinasi yang wajib dikunjungi bagi pecinta alam dan penggemar petualangan.',
                'description_en' => 'Komodo Island, located in the Indonesian archipelago, is famous for being the habitat of the Komodo dragon, the worlds largest lizard. This UNESCO World Heritage Site is renowned for its rugged landscapes, lush forests, and pristine beaches. Visitors to Komodo Island have the opportunity to witness the fascinating behavior of Komodo dragons in their natural habitat, as well as explore the islands diverse marine life through snorkeling and diving. The islands breathtaking natural beauty and unique wildlife make it a must-visit destination for nature lovers and adventure enthusiasts alike.',
                'description_mandarin' => '科莫多岛位于印度尼西亚群岛，以是世界上最大蜥蜴——科莫多巨蜥的栖息地而闻名。这个联合国教科文组织世界遗产地以其崎岖的地貌、茂密的森林和原始的海滩而闻名。前往科莫多岛的游客有机会在其自然栖息地中目睹科莫多巨蜥的迷人行为，以及通过浮潜和潜水探索岛上丰富的海洋生物。岛上壮观的自然风光和独特的野生动物使其成为自然爱好者和冒险爱好者的必访之地',
            ]),

        ]);

        DB::table('destination')->insert($destination);
    }
}
