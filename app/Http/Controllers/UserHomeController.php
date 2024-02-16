<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use App\Models\Event;
use App\Models\News;
use App\Models\Restaurant;
use App\Models\Shop;
use App\Models\Tour;
use App\Models\Accomodation;

use Illuminate\Support\Facades\Cookie;

class UserHomeController extends Controller
{
    //
    public function home()
    {
        if(Cookie::get('user-language') != NULL){
            $locale = Cookie::get('user-language');
            App::setLocale($locale);
        }else{
            $locale = "id";
            App::setLocale("id");
        }

        $events = Event::orderBy("start_date", "asc")->orderBy("id", "asc")->get();
        $culiners = Restaurant::get();
        $cafe = Restaurant::where('cafe_resto', '=', 1)->limit(12)->get();
        $souvenirs = Shop::where("id","!=",1)->whereIn('id', [4, 57, 29])->get();
        // $iklanAtas = Ads::where('status', 1)->get();
        // $iklanBawah = Ads::where('status', 2)->get();
        // $iklanPopup = Ads::where('status', 3)->get();
        $news = News::join('categories', 'news.category_id', '=', 'categories.id')
            ->join('administrators', 'news.admin_id', '=', 'administrators.id')
            ->where('categories.type', 1)
            ->select(['news.*', 'categories.name as category_name', 'categories.name_en as category_name_en', 'administrators.name as admin_name'])
            ->limit(3)
            ->orderBy('news.published_date', 'desc')
            ->get();
        $tours = Tour::limit(20)->get();
        $accomodations = Accomodation::limit(20)->get();

        $data = ([
            "events" => $events,
            "culiners" => $culiners,
            "souvenirs" => $souvenirs,
            // "iklanAtas" => $iklanAtas,
            // "iklanBawah" => $iklanBawah,
            // "iklanPopup" => $iklanPopup,
            "news" => $news,
            "tours" => $tours,
            "accomodations" => $accomodations,
            "cafe" => $cafe,
        ]);

        return view("user.home", $data);
    }
}
