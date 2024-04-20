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
        $kategori = Category::first();
        return view('admin.ubahkategori', compact('kategori'));
    }
 public function proses_ubah_kategori(Request $request)
   {
        $checkEvent = Category::where('name', $request->input('name'))->where('id', '!=', $request->input('kategori_id'))->first();
        if ($checkEvent) {
            $rules = [
                'name' => 'max:255',
                'name_en' => 'max:255',
                'name_mandarin' => 'max:255',
            ];
        } else {
            $rules = [
                'name' => 'max:255',
                'name_en' => 'max:255',
                'name_mandarin' => 'max:255',
            ];
        }

        $validatedData = $request->validate(
            $rules,
            [
                'name.max' => 'Nama maksimal 255 karakter',
                'name_en.max' => 'Nama maksimal 255 karakter',
                'name_mandarin.max' => 'Nama maksimal 255 karakter',
            ]
        );

        Category::where('id', $request->input('kategori_id'))->update($validatedData);
        $kategori = Category::where('id', $request->input('kategori_id'))->first();

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Diubah</p>");
        return redirect()->to("/app-admin/data/kategori/ubah/$kategori->name");
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