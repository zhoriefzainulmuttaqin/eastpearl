<?php

namespace App\Http\Controllers;

use App\Models\Fasilitas;
use Illuminate\Http\Request;

class FasilitasController extends Controller
{
     public function admin_fasilitas(Request $request)
    {
        $fasilitas = Fasilitas::get();
        return view('admin.fasilitas', compact('fasilitas'));
    }

    public function tambah_fasilitas(Request $request)
    {
        $fasilitas = Fasilitas::get();
        return view('admin.tambahfasilitas', compact('fasilitas'));
    }

    public function proses_tambah_fasilitas(Request $request)
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


        Fasilitas::insert([

            'name' =>  $request->name,
            'name_en' =>  $request->name_en,
            'name_mandarin' =>  $request->name_mandarin,

        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/fasilitas');
    }

      public function ubah_fasilitas(Request $request)
    {
        $fasilitas = Fasilitas::first();
        return view('admin.ubahfasilitas', compact('fasilitas'));
    }
 public function proses_ubah_fasilitas(Request $request)
   {
        $checkEvent = Fasilitas::where('name', $request->input('name'))->where('id', '!=', $request->input('fasilitas_id'))->first();
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

        Fasilitas::where('id', $request->input('fasilitas_id'))->update($validatedData);
        $fasilitas = Fasilitas::where('id', $request->input('fasilitas_id'))->first();

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Diubah</p>");
        return redirect()->to("/app-admin/data/fasilitas/ubah/$fasilitas->name");
    }
     public function proses_hapus_fasilitas(Request $request)
    {
        $id = $request->id;
        $fasilitas = Fasilitas::where('id', $id)->first();


            if ($fasilitas) {
            Fasilitas::where('id', $id)->delete();
            session()->flash('msg_status', 'success');
            session()->flash('msg', "<h5>Berhasil</h5><p>Data fasilitas berhasil dihapus !</p>");
            return redirect()->to('/app-admin/data/fasilitas');
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data fasilitas tidak ditemukan !</p>");
            return redirect()->to('/app-admin/data/fasilitas');
        }

    }
}