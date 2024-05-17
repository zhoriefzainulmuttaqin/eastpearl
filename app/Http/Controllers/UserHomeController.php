<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Ads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

use App\Models\Event;
use App\Models\News;
use App\Models\Restaurant;
use App\Models\Shop;
use App\Models\Tour;
use App\Models\Accomodation;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Lainnya;
use App\Models\Layanan;
use App\Models\ServicesGallery;
use Illuminate\Support\Facades\Cookie;

class UserHomeController extends Controller
{
    //
    public function home()
    {
        if (Cookie::get('user-language') != NULL) {
            $locale = Cookie::get('user-language');
            App::setLocale($locale);
        } else {
            $locale = "id";
            App::setLocale("id");
        }

        $category = Category::first();
        $categories = Category::all();
        $about = About::first();
        $trip = Destination::orderByRaw("CASE WHEN name = 'Pulau Komodo' THEN 0 ELSE 1 END")
            ->orderBy('name')
            ->get();
        $topServices = Layanan::where('name', 'One Day Trip')
            ->orWhere('name', 'one day trip')
            ->orWhere('name', 'Panoramic Paradise Road to Golomori')
            ->orWhere('name', 'panoramic paradise road to golomori')
            ->orWhere('name', '3D2N Beautiful Bajo Private Trip')
            ->orWhere('name', '3d2n beautiful bajo private trip')
            ->orWhere('name', 'Joy Flight Labuan Bajo')
            ->orWhere('name', 'joy flight labuan bajo')
            ->get();
        $other_services = Lainnya::all();

        // $facilities = $topServices->facilities;
        // $destination = $topServices->destinations;

        return view("user.home", compact('category', 'about', 'categories', 'trip', 'topServices', 'other_services'));
    }
}