<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutModel;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //admin
    public function admin_tentang(Request $request)
    {
        $about = About::get();
        return view('admin.about', compact('about'));
    }

    public function galeri(Request $request)
    {

        return view('user.galeri',);
    }

    public function openTrip(Request $request)
    {

        return view('user.openTrip',);
    }

}
