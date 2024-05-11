<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;


use Illuminate\Http\Request;
use Cookie;

class LocaleController extends Controller
{
    //
    public function atur_bahasa($locale)
    {
        Cookie::queue('user-language', $locale, 60 * 24 * 365);
        return back();
    }
    public function set_bahasa($locale)
    {
        $response = response("Hello");
        $minutes = 60 * 24 * 30; // Misalnya, 30 hari
        // Cookie::queue(Cookie::make('user_language', $locale, 30));
        $response->withCookie("user_language", $locale, $minutes);

        return redirect("layanan-produk");
    }
    public function getCookie()
    {
        $value = Cookie::get('user-language');
        dd($value);
    }
}