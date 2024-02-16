<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    //

    public function about(Request $request)
    {
        // if (Cookie::get('user-language') != NULL) {
        //     $locale = Cookie::get('user-language');
        //     App::setLocale($locale);
        // } else {
        //     $locale = "id";
        //     App::setLocale("id");
        // }
        // if ($request->keyword) {
        //     $keyword = $request->keyword;
        // } else {
        //     $keyword = '';
        // }

        // $order = [];
        // if ($request->order) {
        //     $order = explode(",", $request->order);
        // }
        // $events = Event::join('administrators', 'events.admin_id', '=', 'administrators.id')
        //     ->when($order, function (Builder $query, $order) {
        //         if ($order) {
        //             $query->orderBy('events.start_date', 'desc');
        //         } else {
        //             $query->orderBy('events.start_date', 'desc');
        //         }
        //     })
        //     ->when($locale, function (Builder $query, $locale) use ($keyword) {
        //         if ($locale == 'en') {
        //             $query->where('events.name_en', 'like',  '%' . $keyword . '%');
        //         } else {
        //             $query->where('events.name', 'like',  '%' . $keyword . '%');
        //         }
        //     })
        //     ->select(['events.*', 'administrators.name as admin_name'])
        //     ->paginate(10);
        // if ($request->keyword) {
        //     $events->appends(array('keyword' => $keyword));
        // }
        // if ($request->star_list) {
        //     $events->appends($order);
        // }
        // $data = [
        //     'events' => $events,
        //     'keyword' => $keyword,
        //     'order' => implode(",", $order),
        // ];
        return view('user.about',);
    }
}
