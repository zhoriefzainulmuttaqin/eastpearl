<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function admin_kategori(Request $request)
    {
        $kategori = Category::get();
        return view('admin.kategori', compact('kategori'));
    }

    public function tambah_kategori(Request $request)
    {
        $kategori = Category::get();
        return view('admin.tambahKategori', compact('kategori'));
    }

    public function proses_tambah_kategori(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'name_en' => 'required',
                'name_mandarin' => 'required',
                'image' => 'image',
            ],
            [
                'name.required' => 'Data harus diisi!',
                'name_en.required' => 'Data harus diisi!',
                'name_mandarin.required' => 'Data harus diisi!',
                'image.image' => 'File harus berupa gambar',

            ]
        );

        // file
        $image = $request->file('image');
        $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move('./assets/kategori/', $nameImage);

        Category::insert([

            'name' => $request->name,
            'name_en' => $request->name_en,
            'name_mandarin' => $request->name_mandarin,
            'slug' => $request->slug,
            'image' => $nameImage,

        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/kategori');
    }

    public function ubah_kategori(Request $request)
    {
        $slug = $request->slug;

        $kategori = Category::where('slug', $slug)->first();
        return view('admin.ubahkategori', compact('kategori'));
    }
    public function proses_ubah_kategori(Request $request)
    {
        // wajib
        $id = $request->id;
        $name = $request->name;
        $name_en = $request->name_en;
        $name_mandarin = $request->name_mandarin;
        $slug = $request->slug; // Ambil nilai slug dari input form

        $data_kategori = Category::where('id', $id)->first();

        $rules = [];

        if ($request->slug != $data_kategori->slug) {
            $rules['slug'] = 'required|unique:categories';
        } else {
            $rules['slug'] = 'required';
        }

        $rules['image'] = 'image';

        $validateData = $request->validate(
            [
                'image.image' => 'File harus berupa gambar.',
                'slug.unique' => 'Slug : ' . $slug . ' sudah terdaftar !',

            ],
        );

        if ($request->file('image')) {
            if ($data_kategori->image != NULL) {
                unlink(('./assets/kategori/') . $data_kategori->image);
            }
            $image = $request->file('image');
            $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move('./assets/kategori/', $nameImage);
        } else {
            $nameImage = $request->image_old;
        }

        Category::where('id', $id)
            ->update([
                'name' => $name,
                'name_en' => $name_en,
                'name_mandarin' => $name_mandarin,
                'slug' => Str::of($slug)->slug('-'), // Gunakan nilai slug dari input form
                'image' => $nameImage,
            ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Diubah</p>");
        return redirect()->to('/app-admin/data/kategori/ubah/' . $slug);
    }

    public function proses_hapus_kategori(Request $request)
    {
        $id = $request->id;
        $kategori = Category::where('id', $id)->first();


        if ($kategori) {
            Category::where('id', $id)->delete();
            session()->flash('msg_status', 'success');
            session()->flash('msg', "<h5>Berhasil</h5><p>Data kategori berhasil dihapus !</p>");
            return redirect()->to('/app-admin/data/kategori');
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data kategori tidak ditemukan !</p>");
            return redirect()->to('/app-admin/data/kategori');
        }

    }
}