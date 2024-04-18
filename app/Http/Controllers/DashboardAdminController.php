<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\News;
use App\Models\Restaurant;
use App\Models\Shop;
use App\Models\Tour;
use App\Models\Accomodation;
use App\Models\Payment;
use App\Models\Pattern;
use App\Models\DiscountCard;
use App\Models\DiscountCardSale;
use App\Models\Gift;
use App\Models\GiftSale;
use App\Models\GiftSaleItem;

class DashboardAdminController extends Controller
{
    //
    public function dashboard(){
        // $count_wisata = Tour::count();
        // $count_kuliner = Restaurant::count();
        // $count_oleholeh = Shop::count();
        // $count_akomodasi = Accomodation::count();

        // $events = Event::where("start_date",">=",date("Y-m-d"))->orderBy("start_date","asc")->get();

        // $cardSales = DiscountCardSale::where("status",1)->orderBy("id","desc")->limit(10)->get();
        // $giftSales = GiftSale::where("status",1)->orderBy("id","desc")->limit(10)->get();

        // $news = News::join('categories', 'news.category_id', '=', 'categories.id')
        // ->join('administrators', 'news.admin_id', '=', 'administrators.id')
        // ->where('categories.type', 1)
        // ->select(['news.*', 'categories.name as category_name', 'categories.name_en as category_name_en', 'administrators.name as admin_name'])
        // ->limit(3)
        // ->orderBy('news.published_date', 'desc')
        // ->get();

        $data = ([
            // "count_wisata" => $count_wisata,
            // "count_kuliner" => $count_kuliner,
            // "count_oleholeh" => $count_oleholeh,
            // "count_akomodasi" => $count_akomodasi,
            // "events"    => $events,
            // "cardSales" => $cardSales,
            // "giftSales" => $giftSales,
            // "news"  => $news,
        ]);

        return view("admin.dashboard",$data);
    }
}