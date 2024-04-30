<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutModel;
use App\Models\Galeri;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;

class AboutController extends Controller
{
    //admin
    public function admin_tentang(Request $request)
    {
        $about = About::get();
        return view('admin.about', compact('about'));
    }

    public function tambah_tentang(Request $request)
    {
        $about = About::get();
        return view('admin.tambahTentang', compact('about'));
    }

    public function proses_tambah_tentang(Request $request)
    {
        $validatedData = $request->validate(
            [
                'company_name' => 'required',
                'description' => 'required',
                'description_en' => 'required',
                'description_mandarin' => 'required',
                'long_description' => 'required',
                'long_description_en' => 'required',
                'long_description_mandarin' => 'required',
                'location' => 'required',
                'link_maps' => 'required',
                'image' => 'image',
                'slogan' => 'required',
            ],
            [
                'company_name.required' => 'Data harus diisi!',
                'description.required' => 'Data harus diisi!',
                'description_en.required' => 'Data harus diisi!',
                'description_mandarin.required' => 'Data harus diisi!',
                'long_description.required' => 'Data harus diisi!',
                'long_description_en.required' => 'Data harus diisi!',
                'long_description_mandarin.required' => 'Data harus diisi!',
                'location.required' => 'Data harus diisi!',
                'link_maps.required' => 'Data harus diisi!',
                'slogan.required' => 'Data harus diisi!',
                'image.image' => 'File harus berupa gambar',
            ]
        );
        // file
        $image = $request->file('image');
        $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move('./assets/tentang/', $nameImage);


        About::insert([

            'company_name' => $request->company_name,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'description_mandarin' => $request->description_mandarin,
            'long_description' => $request->long_description,
            'long_description_en' => $request->long_description_en,
            'long_description_mandarin' => $request->long_description_mandarin,
            'location' => $request->location,
            'link_maps' => $request->link_maps,
            'slogan' => $request->slogan,
            'image' => $nameImage,
        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/tentang');
    }

    public function ubah_tentang()
    {
        $tentang = About::first();

        return view('admin.ubahTentang', compact('tentang'));
    }

    public function proses_ubah_tentang(Request $request)
    {
        $checkEvent = About::where('company_name', $request->input('company_name'))->where('id', '!=', $request->input('tentang_id'))->first();
        if ($checkEvent) {
            $rules = [
                'company_name' => 'max:255',

            ];
        } else {
            $rules = [
                'company_name' => 'max:255',

            ];
        }

        $validatedData = $request->validate(
            $rules,
            [
                'company_name.max' => 'Nama maksimal 255 karakter',

            ]
        );

        About::where('id', $request->input('tentang_id'))->update($validatedData);
        $tentang = About::where('id', $request->input('tentang_id'))->first();

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Diubah</p>");
        return redirect()->to("/app-admin/data/ubah/tentang/$tentang->company_name");
    }


    public function proses_hapus_tentang(Request $request)
    {
        $id = $request->id;
        $tentang = About::where('id', $id)->first();

        if ($tentang) {
            unlink(('./assets/tentang/') . $tentang->image);
            About::where('id', $id)->delete();
            session()->flash('msg_status', 'success');
            session()->flash('msg', "<h5>Berhasil</h5><p>Data tentang berhasil dihapus !</p>");
            return redirect()->to('/app-admin/data/tentang');
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data tentang tidak ditemukan !</p>");
            return redirect()->to('/app-admin/data/tentang');
        }
    }

    public function galeri(Request $request)
    {

        return view('user.galeri', );
    }

    public function openTrip(Request $request)
    {

        return view('user.openTrip', );
    }

    public function about(Request $request)
    {
        if (Cookie::get('user-language') != NULL) {
            $locale = Cookie::get('user-language');
            App::setLocale($locale);
        } else {
            $locale = "id";
            App::setLocale("id");
        }

        $about = About::get();
        $galeri = Galeri::get();

        return view('user.about', compact('about', 'galeri'));
    }
}