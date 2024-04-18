<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

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
            ],
            [
                'name.required' => 'Data harus diisi!',
                'name_en.required' => 'Data harus diisi!',
                'name_mandarin.required' => 'Data harus diisi!',

            ]
        );


        Category::insert([

            'name' =>  $request->name,
            'name_en' =>  $request->name_en,
            'name_mandarin' =>  $request->name_mandarin,

        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/kategori');
    }

      public function ubah_kategori(Request $request)
    {
        $kategori = Category::get();
        return view('admin.ubahkategori', compact('kategori'));
    }
 public function proses_ubah_kategori(Request $request)
    {
        // wajib
        $id = $request->id;
        $name = $request->name;
        $name_en = $request->name_en;
        $name_mandarin = $request->name_mandarin;



        $kategori = Category::where('id', $id)->first();

        $rules = [];

        if ($request->name != $kategori->name) {
            $rules['name'] = 'required|unique:categories';
        } else {
            $rules['name'] = 'required';
        }

        if ($request->name_en != $kategori->name_en) {
            $rules['name_en'] = 'required|unique:categories';
        } else {
            $rules['name_en'] = 'required';
        }

        if ($request->name_mandarin != $kategori->name_mandarin) {
            $rules['name_mandarin'] = 'required|unique:categories';
        } else {
            $rules['name_mandarin'] = 'required';
        }

        $validateData = $request->validate($rules, [
            'name.unique' => 'Kategori : ' . $name . ' sudah terdaftar !',
            'name_en.unique' => 'Kategori : ' . $name_en . ' sudah terdaftar !',
            'name_mandarin.unique' => 'Kategori : ' . $name_mandarin . ' sudah terdaftar !',

        ]);

        Category::where('id', $id)
            ->update([
                'name' => $name,
                'name_en' => $name_en,
                'name_mandarin' => $name_mandarin,
            ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p> Kategori Berhasil Diubah</p>");
        return redirect()->to('app-admin/kelola/akun/kategori/' . $id);
    }
     public function proses_hapus_kategori(Request $request)
    {
        $id = $request->id;
        $kategori = Category::where('id', $id)->first();


            session()->flash('msg_status', 'success');
            session()->flash('msg', "<h5>Berhasil</h5><p>Data kategori berhasil dihapus !</p>");
            return redirect()->to('/app-admin/data/kategori');

    }
}