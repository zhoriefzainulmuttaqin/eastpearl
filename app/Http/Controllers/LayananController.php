<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Fasilitas;
use App\Models\Layanan;
use App\Models\LayananDestinasi;
use App\Models\LayananFasilitas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class LayananController extends Controller
{
    //admin
    public function admin_layanan(Request $request)
    {
        $services = Layanan::get();
        return view('admin.services', compact('services'));
    }

    public function tambah_layanan(Request $request)
    {
        $services = Layanan::get();
        $categories = Category::get();
        $destination = Destination::get();
        $facility = Fasilitas::get();
        return view('admin.tambahServices', compact('services', 'categories', 'facility', 'destination'));
    }

    public function proses_tambah_layanan(Request $request)
    {

        // file
        $image = $request->file('image');
        $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move('./assets/services/', $nameImage);

        $facilities_ids = $request->input('facilities_id');
        $destination_ids = $request->input('destination_id');

        $bulan_sekarang = date('n');
        $tahun_sekarang = date('Y');

        $bulan_terbaik = [];

        for ($bulan = $bulan_sekarang; $bulan <= 12; $bulan++) {
            $bulan_terbaik[] = date('F', strtotime("$tahun_sekarang-$bulan-01"));
        }

        $bulan_pertama = $bulan_terbaik[0];
        $bulan_terakhir = end($bulan_terbaik);

        $bulan_terbaik_string = "$bulan_pertama-$bulan_terakhir";

        $layanan = Layanan::create([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'name_mandarin' => $request->name_mandarin,
            'slug' => $request->slug,
            'short_desc' => $request->short_desc,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_mandarin' => $request->short_desc_mandarin,
            'long_desc' => $request->long_desc,
            'long_desc_en' => $request->long_desc_en,
            'long_desc_mandarin' => $request->long_desc_mandarin,
            'price' => $request->price,
            'categories_id' => $request->categories_id,
            'meeting_point' => $request->meeting_point,
            'aktivitas_fisik' => $request->aktivitas_fisik,
            'durasi' => $request->durasi,
            'minimal_peserta' => $request->minimal_peserta,
            'bulan_terbaik' => $bulan_terbaik_string,
            'image' => $nameImage,
        ]);


        // Simpan ke dalam pivot table
        $layanan->facilities()->attach($facilities_ids);
        $layanan->destinations()->attach($destination_ids);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/layanan');
    }

    public function ubah_layanan(Request $request)
    {
        $slug = $request->slug;

        $services = Layanan::where('slug', $slug)->first();
        $categories = Category::get();
        $allFas = Fasilitas::get();
        $allDest = Destination::get();
        $destination = $services->destinations;
        $facility = $services->facilities;
        return view('admin.ubahservices', compact('services', 'categories', 'destination', 'facility','allFas','allDest'));
    }

    public function proses_ubah_layanan(Request $request)
    {
        $layanan = Layanan::findOrFail($request->services_id);

        // Jika ada file gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Hapus file gambar lama
            if (File::exists(public_path("assets/services/{$layanan->image}"))) {
                File::delete(public_path("assets/services/{$layanan->image}"));
            }

            // Upload file gambar baru
            $image = $request->file('image');
            $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path("assets/services/"), $nameImage);

            $layanan->image = $nameImage;
        }

        $layanan->name = $request->name;
        $layanan->name_en = $request->name_en;
        $layanan->name_mandarin = $request->name_mandarin;
        $layanan->slug = $request->slug;
        $layanan->short_desc = $request->short_desc;
        $layanan->short_desc_en = $request->short_desc_en;
        $layanan->short_desc_mandarin = $request->short_desc_mandarin;
        $layanan->long_desc = $request->long_desc;
        $layanan->long_desc_en = $request->long_desc_en;
        $layanan->long_desc_mandarin = $request->long_desc_mandarin;
        $layanan->price = $request->price;
        $layanan->categories_id = $request->categories_id;
        $layanan->meeting_point = $request->meeting_point;
        $layanan->aktivitas_fisik = $request->aktivitas_fisik;
        $layanan->durasi = $request->durasi;
        $layanan->minimal_peserta = $request->minimal_peserta;

        // Simpan perubahan
        $layanan->save();

        // Synchronize fasilitas dan destinasi baru
        $layanan->facilities()->sync($request->facilities_id);
        $layanan->destinations()->sync($request->destination_id);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Diubah</p>");
        return redirect()->to('/app-admin/data/layanan');
    }



    public function proses_hapus_layanan(Request $request)
    {
        $id = $request->id;
        $services = Layanan::where('id', $id)->first();

        if ($services) {
            unlink(('./assets/services/') . $services->image);
            Layanan::where('id', $id)->delete();
            session()->flash('msg_status', 'success');
            session()->flash('msg', "<h5>Berhasil</h5><p>Data services berhasil dihapus !</p>");
            return redirect()->to('/app-admin/data/layanan');
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data services tidak ditemukan !</p>");
            return redirect()->to('/app-admin/data/layanan');
        }
    }


    // Layanan per kategori
    public function layananKategori($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $about = About::first();
        $services = Layanan::where('categories_id', $category->id)->get();

        return view('admin.category_services', compact('services', 'category', 'about'));
    }

    // user


    public function layanan($slug)
    {
        if (Cookie::get('user-language') != NULL) {
            $locale = Cookie::get('user-language');
            App::setLocale($locale);
        } else {
            $locale = "id";
            App::setLocale("id");
        }

        $category = Category::where('slug', $slug)->firstOrFail();
        $about = About::first();
        $services = Layanan::where('categories_id', $category->id)->get();

        return view('user.layanan', compact('services', 'category', 'about'));
    }
    public function detail_layanan($slug)
    {
        if (Cookie::get('user-language') != NULL) {
            $locale = Cookie::get('user-language');
            App::setLocale($locale);
        } else {
            $locale = "id";
            App::setLocale("id");
        }

        $services = Layanan::where('slug', $slug)->first();
        $other_services = Layanan::where('slug', '!=', $slug)->get();
        $destination = $services->destinations;

        $facilities = $services->facilities;


        $allDest = Destination::get();
        $allFasc = Destination::get();
        return view('user.detail_layanan', compact('services', 'other_services', 'destination', 'facilities', 'allDest', 'allFasc'));
    }
}