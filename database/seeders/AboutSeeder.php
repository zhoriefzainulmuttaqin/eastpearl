<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('about')->insert([
            'company_name' => 'East Pearl',
            'image' => 'F3VvXkXRkzo3BvYfrVWntwEg86WQ8VpiX2K03Tl8.png',
            'description' => 'East Pearl Trip merupakan Tour Operator yang menjalankan langsung aktivitas tour dengan konsep berpetualang di wisata alam Indonesia',
            'description_en' => 'East Pearl Trip is a Tour Operator that directly carries out tour activities with the concept of adventure in Indonesia',
            'description_mandarin' => '东方明珠之旅是一家在印尼自然旅游领域直接开展以探险为理念的旅游活动的旅行社',
            'long_description' => 'East Pearl Trip merupakan Tour Operator yang menjalankan langsung aktivitas tour dengan konsep berpetualang di wisata alam Indonesia. Berpengalaman lebih dari 9 tahun dengan review Tour Terbaik di TripAdvisor, kami menyediakan paket wisata Open Trip dan Private Trip&mdash;termasuk sewa kapal Phinisi. Destinasi wisata pilihan kami adalah Labuan Bajo. Dengan tim Guide Lokal yang memiliki pengetahuan daerah yang lengkap dan pelayanan dari hati, East Pearl memastikan setiap wisatawan yang berlibur bersama East Pearl akan mendapatkan pengalaman terbaiknya! Kami juga menjamin harga terbaik, tanpa hidden fee. Informasi biaya setiap paket trip ditampilkan sedetail mungkin dan akan diperjelas lagi saat berkomunikasi via WhatsApp agar kamu bisa merencanakan budget liburan dengan tepat.',
            'long_description_en' => 'East Pearl Trip is a tour operator that directly carries out tour activities with the concept of adventure in Indonesias natural tourism. With more than 9 years of experience with the Best Tour reviews on TripAdvisor, we provide Open Trip and Private Trip tour packages including Phinisi boat rental. Our preferred tourist destination is Labuan Bajo. With a team of Local Guides who have complete regional knowledge and service from the heart, East Pearl ensures that every tourist who vacations with East Pearl will get the best experience! We also guarantee the best prices, without hidden fees. Information on the cost of each trip package is displayed in as much detail as possible and will be made clearer when communicating via WhatsApp so you can plan your holiday budget appropriately.',
            'long_description_mandarin' => '东方明珠之旅是一家在印尼自然旅游领域直接开展以探险为理念的旅游活动的旅行社。我们拥有超过 9 年的 TripAdvisor 最佳旅游评论经验，提供开放式旅行和私人旅行旅游套餐，包括 Phinisi 船租赁。我们的首选旅游目的地是纳闽巴焦。东方明珠拥有一支拥有完整区域知识和发自内心的服务的本地导游团队，确保每一位与东方明珠一起度假的游客都能获得最佳的体验！我们还保证最优惠的价格，无隐藏费用。每个旅行套餐的费用信息都会尽可能详细地显示，并且在通过 WhatsApp 沟通时会更加清晰，以便您可以适当地计划您的假期预算。',
            'slogan' => 'Prefered Partner for Travel',
            'location' => 'Labuan Bajo, Kec. Komodo, Kabupaten Manggarai Barat, Nusa Tenggara Timur',
            'link_maps' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d4040274.644699747!2d115.34492491944239!3d-8.540022277157082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2db467006814a545%3A0xd89df8d8a31a011b!2sEast%20Pearl%20Tour%20%26%20Travel!5e0!3m2!1sid!2',

        ]);
    }
}