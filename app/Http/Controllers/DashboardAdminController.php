<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\News;
use App\Models\Restaurant;
use App\Models\Shop;
use App\Models\Tour;
use App\Models\Accomodation;
use App\Models\Destination;
use App\Models\Payment;
use App\Models\Pattern;
use App\Models\DiscountCard;
use App\Models\DiscountCardSale;
use App\Models\Fasilitas;
use App\Models\Gift;
use App\Models\GiftSale;
use App\Models\GiftSaleItem;
use App\Models\Layanan;
use Illuminate\Support\Str;

class DashboardAdminController extends Controller
{
    //
    public function dashboard()
    {
        $count_sharing_trip = Layanan::whereHas('categories', function ($query) {
            $query->where('name', 'sharing & private trip')->orWhere('name', 'Sharing & Private Trip');
        })->count();


        $count_land_trip = Layanan::whereHas('categories', function ($query) {
            $query->where('name', 'land trip')->orWhere('name', 'Land Trip');
        })->count();

        $count_fly_bajo = Layanan::whereHas('categories', function ($query) {
            $query->where('name', 'fly bajo')->orWhere('name', 'Fly Bajo');
        })->count();

        $count_destination = Destination::count();
        $count_facility = Fasilitas::count();
        $services = Layanan::get();
        $fasilitas = Fasilitas::get();
        $destination = Destination::get();


        $data = ([
            "count_sharing_trip" => $count_sharing_trip,
            "count_land_trip" => $count_land_trip,
            "count_fly_bajo" => $count_fly_bajo,
            "count_destination" => $count_destination,
            "count_facility" => $count_facility,
            "services" => $services,
            "fasilitas" => $fasilitas,
            "destination" => $destination,
        ]);

        return view("admin.dashboard", $data);
    }


    public function buat_slug(Request $request)
    {
        $slug = Str::of($request->name)->slug('-');
        return response()->json(['slug' => $slug]);
    }
}