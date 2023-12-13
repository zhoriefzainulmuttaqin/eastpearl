<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class RestaurantController extends Controller
{
    public function restaurants()
    {
        if (Cookie::get('user-language') != NULL) {
            $locale = Cookie::get('user-language');
            App::setLocale($locale);
        } else {
            $locale = "id";
            App::setLocale("id");
        }
        $restaurants = Restaurant::paginate(12);

        $data = [
            'restaurants' => $restaurants,
        ];

        return view('user.restaurants', $data);
    }

    public function admin_kuliner()
    {
        $restaurants = Restaurant::orderBy('name', 'asc')->get();

        $data = [
            'restaurants' => $restaurants,
        ];
        return view('admin.kuliner', $data);
    }

    public function tambah_kuliner()
    {
        return view('admin.tambah_kuliner');
    }

    public function proses_tambah_kuliner(Request $request)
    {
        $validatedData = $request->validate(
            [
                'slug' => 'unique:restaurants',
                'phone' => 'unique:restaurants',
                'image' => 'image',
            ],
            [
                'slug.unique' => 'Slug sudah ada !',
                'phone.unique' => 'No. Handphone sudah ada !',
                'image.image' => 'File harus berupa gambar',
            ]
        );

        // file
        $image = $request->file('image');
        $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move('./assets/kuliner/', $nameImage);

        // wajib
        $name = $request->name;
        $name_en = $request->name_en;
        $phone = $request->phone;
        $price = $request->price;
        $city = $request->city;
        $facilities = NULL;
        $facilities_en = NULL;
        $address = $request->address;

        // optional (Boleh kosong)
        $link_instagram = $request->link_instagram == "" ? NULL :  $request->link_instagram;
        $link_facebook = $request->link_facebook == "" ? NULL :  $request->link_facebook;
        $link_tiktok = $request->link_tiktok == "" ? NULL :  $request->link_tiktok;
        $link_youtube = $request->link_youtube == "" ? NULL :  $request->link_youtube;

        Restaurant::insert([
            'name' =>  $name,
            'name_en' =>  $name_en,
            'phone' =>  $phone,
            'price' =>  $price,
            'city' =>  $city,
            'facilities' =>  $facilities,
            'facilities_en' =>  $facilities_en,
            'address' =>  $address,
            'link_instagram' =>  $link_instagram,
            'link_facebook' =>  $link_facebook,
            'link_tiktok' =>  $link_tiktok,
            'link_youtube' =>  $link_youtube,
            'slug' =>  Str::of($request->slug)->slug('-'),
            'picture' =>  $nameImage,
            'cover_picture' =>  $nameImage,
        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Kuliner Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/kuliner');
    }

    public function ubah_kuliner(Request $request)
    {
        $slug = $request->slug;

        $restaurant = Restaurant::where('slug', $slug)->first();

        if ($restaurant) {
            $data = [
                'restaurant' => $restaurant,
            ];
            return view('admin.ubah_kuliner', $data);
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data kuliner tidak ditemukan !</p>");
            return redirect()->to('/app-admin/data/kuliner');
        }
    }

    public function proses_ubah_kuliner(Request $request)
    {
        // wajib
        $id = $request->id;
        $slug = $request->slug;
        $name = $request->name;
        $name_en = $request->name_en;
        $phone = $request->phone;
        $price = $request->price;
        $city = $request->city;
        $facilities = NULL;
        $facilities_en = NULL;
        $address = $request->address;

        // optional (Boleh kosong)
        $link_instagram = $request->link_instagram == "" ? NULL :  $request->link_instagram;
        $link_facebook = $request->link_facebook == "" ? NULL :  $request->link_facebook;
        $link_tiktok = $request->link_tiktok == "" ? NULL :  $request->link_tiktok;
        $link_youtube = $request->link_youtube == "" ? NULL :  $request->link_youtube;


        $data_resto = Restaurant::where('id', $id)->first();

        $rules = [];

        if ($request->slug != $data_resto->slug) {
            $rules['slug'] = 'required|unique:restaurants';
        } else {
            $rules['slug'] = 'required';
        }

        if ($request->phone != $data_resto->phone) {
            $rules['phone'] = 'required|unique:restaurants';
        } else {
            $rules['phone'] = 'required';
        }

        $rules['image'] = 'image';

        $validateData = $request->validate($rules, [
            'phone.unique' => 'No. Handphone : ' . $phone . ' sudah terdaftar !',
            'slug.unique' => 'Slug : ' . $slug . ' sudah terdaftar !',
            'image.image' => 'File harus berupa gambar !',
        ]);

        if ($request->file('image')) {
            if ($data_resto->picture != NULL) {
                unlink(('./assets/kuliner/') . $data_resto->picture);
            }
            $image = $request->file('image');
            $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move('./assets/kuliner/', $nameImage);
        } else {
            $nameImage = $request->picture_old;
        }

        Restaurant::where('id', $id)
            ->update([
                'name' =>  $name,
                'name_en' =>  $name_en,
                'phone' =>  $phone,
                'price' =>  $price,
                'city' =>  $city,
                'facilities' =>  $facilities,
                'facilities_en' =>  $facilities_en,
                'address' =>  $address,
                'link_instagram' =>  $link_instagram,
                'link_facebook' =>  $link_facebook,
                'link_tiktok' =>  $link_tiktok,
                'link_youtube' =>  $link_youtube,
                'slug' =>  Str::of($slug)->slug('-'),
                'picture' =>  $nameImage,
                'cover_picture' =>  $nameImage,
            ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Kuliner Berhasil Diubah</p>");
        return redirect()->to('app-admin/data/ubah/kuliner/' . $slug);
    }

    public function proses_hapus_kuliner(Request $request)
    {
        $slug = $request->slug;
        $resto = Restaurant::where('slug', $slug)->first();

        if ($resto) {
            unlink(('./assets/kuliner/') . $resto->picture);
            Restaurant::where('slug', $slug)->delete();
            session()->flash('msg_status', 'success');
            session()->flash('msg', "<h5>Berhasil</h5><p>Data kuliner berhasil dihapus !</p>");
            return redirect()->to('/app-admin/data/kuliner');
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data kuliner tidak ditemukan !</p>");
            return redirect()->to('/app-admin/data/kuliner');
        }
    }
}
