<?php

namespace App\Http\Controllers;

use App\Models\Galeri;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class GaleriController extends Controller
{
    // ADMIN
    public function galeri()
    {
        $galeri = Galeri::get();

        return view('admin.galeri', compact('galeri'));
    }

    public function tambah_galeri()
    {
        $galeri = Galeri::get();

        return view('admin.tambahGaleri', compact('galeri'));
    }

    public function proses_tambah_galeri(Request $request)
    {
        $validatedData = $request->validate(
            [
                'image_name' => 'unique:galleries',
                'image' => 'image',
            ],
            [
                'image_name.unique' => 'Nama sudah ada !',
                'image.image' => 'File harus berupa gambar',
            ]
        );
        // file
        $image = $request->file('image');
        $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move('./assets/galeri/', $nameImage);


        Galeri::insert([

            'image_name' => $request->image_name,
            'image' => $nameImage,
        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Gambar Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/galeri');
    }

    public function ubah_galeri(Request $request)
    {
        $id = $request->id;

        $galeri = Galeri::where('id', $id)->first();

        return view('admin.ubahGaleri', compact('galeri'));
    }
    public function proses_ubah_galeri(Request $request)
    {
        // wajib
        $id = $request->id;
        $image_name = $request->image_name;

        $data_galeri = Galeri::where('id', $id)->first();

        $rules = [];

        if ($request->image_name != $data_galeri->image_name) {
            $rules['image_name'] = 'required|unique:galleries';
        } else {
            $rules['image_name'] = 'required';
        }


        $rules['image'] = 'image';

        $validateData = $request->validate(
            [
                'image_name' => $rules['image_name'],
                'image' => $rules['image'],
            ],
            [
                'image_name.required' => 'Nama harus diisi.',
                'image_name.unique' => 'Nama sudah terdaftar.',
                'image.image' => 'File harus berupa gambar.',
            ]
        );

        if ($request->file('image')) {
            if ($data_galeri->image != NULL) {
                unlink(('./assets/galeri/') . $data_galeri->image);
            }
            $image = $request->file('image');
            $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move('./assets/galeri/', $nameImage);
        } else {
            $nameImage = $request->image_old;
        }

        Galeri::where('id', $id)
            ->update([

                'image_name' => $image_name,
                'image' => $nameImage,

            ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Gambar Berhasil Diubah</p>");
        return redirect()->to('app-admin/data/galeri/ubah/' . $image_name . '/' . $id);
    }

    public function proses_hapus_galeri(Request $request)
    {
        $id = $request->id;
        $galeri = Galeri::where('id', $id)->first();

        if ($galeri) {
            unlink(('./assets/galeri/') . $galeri->image);
            Galeri::where('id', $id)->delete();
            session()->flash('msg_status', 'success');
            session()->flash('msg', "<h5>Berhasil</h5><p>Data galeri berhasil dihapus !</p>");
            return redirect()->to('/app-admin/data/galeri');
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data galeri tidak ditemukan !</p>");
            return redirect()->to('/app-admin/data/galeri');
        }
    }

    // USER
    public function user_galeri()
    {
        if (Cookie::get('user-language') != NULL) {
            $locale = Cookie::get('user-language');
            App::setLocale($locale);
        } else {
            $locale = "id";
            App::setLocale("id");
        }
        $galeri = Galeri::get();

        return view('user.galeri', compact('galeri'));
    }
}