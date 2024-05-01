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

            'name' => $request->name,
            'name_en' => $request->name_en,
            'name_mandarin' => $request->name_mandarin,

        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/fasilitas');
    }

    public function ubah_fasilitas(Request $request)
    {
        $id = $request->id;

        $fasilitas = Fasilitas::where('id', $id)->first();
        return view('admin.ubahfasilitas', compact('fasilitas'));
    }
    public function proses_ubah_fasilitas(Request $request)
    {
        // wajib
        $id = $request->id;

        $data_fasilitas = Fasilitas::where('id', $id)->first();

        $rules = [];

        if ($request->name != $data_fasilitas->name) {
            $rules['name'] = 'required|unique:facilities';
        } else {
            $rules['name'] = 'required';
        }

        $validateData = $request->validate(
            [
                'name' => $rules['name'],
            ],
            [
                'name.required' => 'Nama harus diisi.',
                'name.unique' => 'Nama sudah terdaftar.',
            ]
        );

        fasilitas::where('id', $id)
            ->update([

                'name' => $request->name,
                'name_en' => $request->name_en,
                'name_mandarin' => $request->name_mandarin,

            ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Gambar Berhasil Diubah</p>");
        return redirect()->to('app-admin/data/fasilitas/ubah/' . $id);
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