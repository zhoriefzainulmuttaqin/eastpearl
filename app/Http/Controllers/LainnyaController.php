<?php

namespace App\Http\Controllers;

use App\Models\Lainnya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LainnyaController extends Controller
{
    public function admin_other_services(Request $request)
    {
        $other = Lainnya::get();
        return view('admin.other_services', compact('other'));
    }
    public function tambah_other_services(Request $request)
    {
        $other = Lainnya::get();

        return view('admin.tambah_other_services', compact('other'));
    }

    public function proses_tambah_other_services(Request $request)
    {

        // file
        $image = $request->file('image');
        $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move('./assets/lainnya/', $nameImage);

        Lainnya::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'name_mandarin' => $request->name_mandarin,
            'slug' => $request->slug,
            'image' => $nameImage,
        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/other_services');
    }

    public function ubah_other_services(Request $request)
    {
        $slug = $request->slug;

        $other = Lainnya::where('slug', $slug)->first();

        return view('admin.ubah_other_services', compact('other'));
    }


    public function proses_ubah_other_services(Request $request)
    {
        $other = Lainnya::findOrFail($request->lainnya_id);

        // Jika ada file gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Hapus file gambar lama
            if (File::exists("./assets/lainnya/{$other->image}")) {
                File::delete("./assets/lainnya/{$other->image}");
            }

            // Upload file gambar baru
            $image = $request->file('image');
            $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move("./assets/lainnya/", $nameImage);

            $other->image = $nameImage;
        }

        $other->name = $request->name;
        $other->name_en = $request->name_en;
        $other->name_mandarin = $request->name_mandarin;
        $other->slug = $request->slug;

        // Simpan perubahan
        $other->save();

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Diubah</p>");
        return redirect()->to('/app-admin/data/other_services');
    }

    public function proses_hapus_other_services(Request $request)
    {
        $id = $request->id;
        $other = Lainnya::where('id', $id)->first();

        if ($other) {
            unlink(('./assets/lainnya/') . $other->image);
            Lainnya::where('id', $id)->delete();
            session()->flash('msg_status', 'success');
            session()->flash('msg', "<h5>Berhasil</h5><p>Data data berhasil dihapus !</p>");
            return redirect()->to('/app-admin/data/layanan');
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data data tidak ditemukan !</p>");
            return redirect()->to('/app-admin/data/layanan');
        }
    }
}