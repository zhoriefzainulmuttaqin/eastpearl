<?php

namespace App\Http\Controllers;

use App\Models\CategorySouvenir;
use App\Models\Souvenir;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class SouvenirController extends Controller
{
    public function souvenir(Request $request)
    {
        if (Cookie::get('user-language') != NULL) {
            $locale = Cookie::get('user-language');
            App::setLocale($locale);
        } else {
            $locale = "id";
            App::setLocale("id");
        }
        if ($request->keyword) {
            $keyword = $request->keyword;
        } else {
            $keyword = '';
        }

        $cat_list = [];
        $cat_list_data = [];

        if ($request->cat_list) {
            $cat_list = $request->cat_list;
            $cat_list_data = array_fill_keys($request->cat_list, 'category');
        };

        $souvenir = Souvenir::join('category_souvenir', 'souvenir.souvenir_category_id', '=', 'category_souvenir.id')
            ->when($locale, function (Builder $query, $locale) use ($keyword) {
                if ($locale == 'en') {
                    $query->where('souvenir.name_en', 'like',  '%' . $keyword . '%');
                }elseif ($locale == 'mandarin') {
                    $query->where('souvenir.name_mandarin', 'like',  '%' . $keyword . '%');
                } else {
                    $query->where('souvenir.name', 'like',  '%' . $keyword . '%');
                }
            })
            // ->where('tours.name', 'like',  '%' . $keyword . '%')
            // ->Orwhere('tours.name_en', 'like',  '%' . $keyword . '%')
            // ->where(function (Builder $query) use ($cat_list, $request) {
            //     if ($request->cat_list) {
            //         if ($request->cat_list[0] != "0") {
            //             $query->where(
            //                 function (Builder $q) use ($cat_list) {
            //                     foreach ($cat_list as $key => $value) {
            //                         $q->orWhere('tours.category_id', $value);
            //                     }
            //                 }
            //             );
            //         }
            //     }
            // })
            ->where(function (Builder $query) use ($cat_list) {
                $query->where(
                    function (Builder $q) use ($cat_list) {
                        foreach ($cat_list as $key => $value) {
                            $q->orWhere('souvenir.souvenir_category_id', $value);
                        }
                    }
                );
            })
            ->select(['souvenir.*', 'category_souvenir.name as category_name', 'category_souvenir.name_en as category_name_en', 'category_souvenir.name_mandarin as category_name_mandarin'])
            ->orderBy('souvenir.created_at', 'desc')
            ->paginate(12);
        if ($request->keyword) {
            $souvenir->appends(array('keyword' => $keyword));
        }
        if ($request->cat_list) {
            $souvenir->appends($cat_list);
        }

        $categories = CategorySouvenir::orderBy('name', 'asc')->get();
        $data = [
            'souvenir' => $souvenir,
            'categories' => $categories,
            "cat_list"   => $cat_list_data,
        ];
        return view('user.souvenir', $data);
    }
}