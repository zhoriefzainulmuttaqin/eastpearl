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



        $data = ([

        ]);

        return view("user.home", $data);
    }
}
