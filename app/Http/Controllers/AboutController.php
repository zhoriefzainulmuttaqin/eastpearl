<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //

    public function about(Request $request)
    {

        return view('user.about',);
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
