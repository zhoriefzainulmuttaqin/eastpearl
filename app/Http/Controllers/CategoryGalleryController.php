<?php

namespace App\Http\Controllers;

use App\Models\CategoryGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryGalleryController extends Controller
{
    public function admin_kategori_galeri(Request $request)
    {
        $kategori_galeri = CategoryGallery::get();
        return view('admin.kategori_galeri', compact('kategori_galeri'));
    }

    public function tambah_kategori_galeri(Request $request)
    {
        $kategori_galeri = CategoryGallery::get();
        return view('admin.tambah_kategori_galeri', compact('kategori_galeri'));
    }

    public function proses_tambah_kategori_galeri(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'name_en' => 'required',
                'name_mandarin' => 'required',
            ],
            [
                'name.required' => 'Data harus diisi!',
                'name_en.required' => 'Data harus diisi!',
                'name_mandarin.required' => 'Data harus diisi!',

            ]
        );

        CategoryGallery::insert([

            'name' => $request->name,
            'name_en' => $request->name_en,
            'name_mandarin' => $request->name_mandarin,
            'slug' => $request->slug,

        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/kategori_galeri');
    }

    public function ubah_kategori_galeri(Request $request)
    {
        $slug = $request->slug;

        $kategori_galeri = CategoryGallery::where('slug', $slug)->first();
        return view('admin.ubah_kategori_galeri', compact('kategori_galeri'));
    }
    public function proses_ubah_kategori_galeri(Request $request)
    {
        // wajib
        $id = $request->id;
        $name = $request->name;
        $name_en = $request->name_en;
        $name_mandarin = $request->name_mandarin;
        $slug = $request->slug; // Ambil nilai slug dari input form

        $data_kategori_galeri = CategoryGallery::where('id', $id)->first();

        $rules = [];

        if ($request->slug != $data_kategori_galeri->slug) {
            $rules['slug'] = 'required|unique:categories';
        } else {
            $rules['slug'] = 'required';
        }


        $validateData = $request->validate(
            [
                'slug.unique' => 'Slug : ' . $slug . ' sudah terdaftar !',

            ],
        );

        CategoryGallery::where('id', $id)
            ->update([
                'name' => $name,
                'name_en' => $name_en,
                'name_mandarin' => $name_mandarin,
                'slug' => Str::of($slug)->slug('-'), // Gunakan nilai slug dari input form
            ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Diubah</p>");
        return redirect()->to('/app-admin/data/kategori_galeri/ubah/' . $slug);
    }

    public function proses_hapus_kategori_galeri(Request $request)
    {
        $id = $request->id;
        $kategori_galeri = CategoryGallery::where('id', $id)->first();


        if ($kategori_galeri) {
            CategoryGallery::where('id', $id)->delete();
            session()->flash('msg_status', 'success');
            session()->flash('msg', "<h5>Berhasil</h5><p>Data kategori_galeri berhasil dihapus !</p>");
            return redirect()->to('/app-admin/data/kategori_galeri');
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data kategori_galeri tidak ditemukan !</p>");
            return redirect()->to('/app-admin/data/kategori_galeri');
        }

    }
}