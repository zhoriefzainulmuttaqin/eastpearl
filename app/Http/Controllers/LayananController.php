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

    public function ubah_layanan()
    {
        $services = Layanan::first();
        $categories = Category::get();
        $destination = Destination::get();
        $facility = Fasilitas::get();
        return view('admin.ubahservices', compact('services', 'categories', 'destination', 'facility'));
    }

    public function proses_ubah_layanan(Request $request)
    {
        dd($request->all());

        $bulan_sekarang = date('n');
        $tahun_sekarang = date('Y');
        $bulan_terbaik = [];

        for ($bulan = $bulan_sekarang; $bulan <= 12; $bulan++) {
            $bulan_terbaik[] = date('F', strtotime("$tahun_sekarang-$bulan-01"));
        }

        $bulan_pertama = $bulan_terbaik[0];
        $bulan_terakhir = end($bulan_terbaik);

        $bulan_terbaik_string = "$bulan_pertama-$bulan_terakhir";
        $checkEvent = Layanan::where('name', $request->input('name'))->where('id', '!=', $request->input('services_id'))->first();
        if ($checkEvent) {
            $rules = [
                'name' => 'max:255',
                'name_en' => 'max:255',
                'name_mandarin' => 'max:255',
                'slug' => 'unique:services',
                'image' => 'image',
                'short_desc' => 'required',
                'short_desc_en' => 'required',
                'short_desc_mandarin' => 'required',
                'long_desc' => 'required',
                'long_desc_en' => 'required',
                'long_desc_mandarin' => 'required',
                'price' => 'required',
                'meeting_point' => 'required',
                'aktivitas_fisik' => 'required',
                'durasi' => 'required',
                'minimal_peserta' => 'required',
                'category_id' => 'required',
            ];
        } else {
            $rules = [
                'name' => 'max:255',
                'name_en' => 'max:255',
                'name_mandarin' => 'max:255',
                'slug' => '',
                'image' => 'image',
                'short_desc' => 'required',
                'short_desc_en' => 'required',
                'short_desc_mandarin' => 'required',
                'long_desc' => 'required',
                'long_desc_en' => 'required',
                'long_desc_mandarin' => 'required',
                'price' => 'required',
                'meeting_point' => 'required',
                'aktivitas_fisik' => 'required',
                'durasi' => 'required',
                'minimal_peserta' => 'required',
                'category_id' => 'required',
            ];
        }

        $validatedData = $request->validate(
            $rules,
            [
                'name.max' => 'Nama maksimal 255 karakter',
                'name_en.max' => 'Nama maksimal 255 karakter',
                'name_mandarin.max' => 'Nama maksimal 255 karakter',
                'slug.unique' => 'Slug sudah ada',
                'image.image' => 'File harus berupa gambar',
            ]
        );
        $validatedData['slug'] = Str::of($request->slug)->slug('-');

        if ($request->file('image')) {
            $services = Layanan::where('id', $request->input('services_id'))->first();
            if ($services->image != NULL) {
                unlink(('./assets/services/') . $services->image);
            }
            $image = $request->file('image');
            $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move('./assets/services/', $nameImage);
            $validatedData['image'] = $nameImage;
        }
        $validatedData['bulan_terbaik'] = $bulan_terbaik_string;

        Layanan::where('id', $request->input('services_id'))->update($validatedData);
        $services = Layanan::where('id', $request->input('services_id'))->first();


        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Diubah</p>");
        return redirect()->to("/app-admin/data/ubah/layanan/$services->slug");
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
        $other_services = Layanan::get();
        $destination = LayananDestinasi::whereHas('services', function ($query) use ($services) {
            $query->where('id', $services->id);
        })->get();
        $facilities = LayananFasilitas::whereHas('services', function ($query) use ($services) {
            $query->where('id', $services->id);
        })->get();

        $allDest = Destination::get();
        $allFasc = Destination::get();
        return view('user.detail_layanan', compact('services', 'other_services', 'destination', 'facilities', 'allDest', 'allFasc'));
    }
}
