<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\AboutModel;
use Illuminate\Support\Str;

use Illuminate\Http\Request;

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
                'office_name' => 'required',
                'description' => 'required',
                'office_address' => 'required',
                'office_maps' => 'required',
                'image' => 'image',
            ],
            [
                'office_name.required' => 'Data harus diisi!',
                'description.required' => 'Data harus diisi!',
                'office_address.required' => 'Data harus diisi!',
                'office_maps.required' => 'Data harus diisi!',
                'image.image' => 'File harus berupa gambar',
            ]
        );
        // file
        $image = $request->file('image');
        $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move('./assets/tentang/', $nameImage);


        About::insert([

            'office_name' =>  $request->office_name,
            'description' =>  $request->description,
            'office_address' =>  $request->office_address,
            'office_maps' =>  $request->office_maps,
            'image' =>  $nameImage,
        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/tentang');
    }

      public function ubah_tentang(Request $request)
    {
        $about = About::get();
        return view('admin.ubahTentang', compact('about'));
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

        return view('user.galeri',);
    }

    public function openTrip(Request $request)
    {

        return view('user.openTrip',);
    }

      public function about(Request $request)
    {

        return view('user.about',);
    }
}