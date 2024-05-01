<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DestinationController extends Controller
{
    // ADMIN
    public function admin_destination()
    {
        $destination = Destination::get();

        return view('admin.destination', compact('destination'));
    }

    public function tambah_destination()
    {
        $destination = Destination::get();

        return view('admin.tambahDestination', compact('destination'));
    }

    public function proses_tambah_destination(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'unique:destination',
                'name_en' => 'unique:destination',
                'name_mandarin' => 'unique:destination',
                'description' => 'unique:destination',
                'description_en' => 'unique:destination',
                'description_mandarin' => 'unique:destination',
                'image' => 'image',
            ],
            [
                'name.unique' => 'Nama sudah ada !',
                'name_en.unique' => 'Nama sudah ada !',
                'name_mandarin.unique' => 'Nama sudah ada !',
                'description.unique' => 'Nama sudah ada !',
                'description_en.unique' => 'Nama sudah ada !',
                'description_mandarin.unique' => 'Nama sudah ada !',
                'image.image' => 'File harus berupa gambar',
            ]
        );
        // file
        $image = $request->file('image');
        $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move('./assets/destination/', $nameImage);


        Destination::insert([

            'name' => $request->name,
            'name_en' => $request->name_en,
            'name_mandarin' => $request->name_mandarin,
            'description' => $request->description,
            'description_en' => $request->description_en,
            'description_mandarin' => $request->description_mandarin,
            'image' => $nameImage,
        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/destination');
    }

    public function ubah_destination(Request $request)
    {
        $id = $request->id;
        $destination = Destination::where('id', $id)->first();

        return view('admin.ubahDestination', compact('destination'));
    }
    public function proses_ubah_destination(Request $request)
    {
        // wajib
        $id = $request->id;


        $data_destination = Destination::where('id', $id)->first();

        $rules = [];

        if ($request->name != $data_destination->name) {
            $rules['name'] = 'required|unique:destination';
        } else {
            $rules['name'] = 'required';
        }


        $rules['image'] = 'image';

        $validateData = $request->validate(
            [
                'name' => $rules['name'],
                'image' => $rules['image'],
            ],
            [
                'name.required' => 'Nama harus diisi.',
                'name.unique' => 'Nama sudah terdaftar.',
                'image.image' => 'File harus berupa gambar.',
            ]
        );

        if ($request->file('image')) {
            if ($data_destination->image != NULL) {
                unlink(('./assets/destination/') . $data_destination->image);
            }
            $image = $request->file('image');
            $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move('./assets/destination/', $nameImage);
        } else {
            $nameImage = $request->image_old;
        }

        Destination::where('id', $id)
            ->update([

                'name' => $request->name,
                'name_en' => $request->name_en,
                'name_mandarin' => $request->name_mandarin,
                'description' => $request->description,
                'description_en' => $request->description_en,
                'description_mandarin' => $request->description_mandarin,
                'image' => $nameImage,

            ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Gambar Berhasil Diubah</p>");
        return redirect()->to('app-admin/data/destination');
    }

    public function proses_hapus_destination(Request $request)
    {
        $id = $request->id;
        $destination = Destination::where('id', $id)->first();

        if ($destination) {
            unlink(('./assets/destination/') . $destination->image);
            destination::where('id', $id)->delete();
            session()->flash('msg_status', 'success');
            session()->flash('msg', "<h5>Berhasil</h5><p>Data destination berhasil dihapus !</p>");
            return redirect()->to('/app-admin/data/destination');
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data destination tidak ditemukan !</p>");
            return redirect()->to('/app-admin/data/destination');
        }
    }

}
