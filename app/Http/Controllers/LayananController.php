<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Destination;
use App\Models\Fasilitas;
use App\Models\Layanan;
use Illuminate\Http\Request;
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
        $validatedData = $request->validate(
            [
                'name' => 'required',
                'name_en' => 'required',
                'name_mandarin' => 'required',
                'slug' => 'required',
                'short_desc' => 'required',
                'short_desc_en' => 'required',
                'short_desc_mandarin' => 'required',
                'price' => 'required',
                'facilities_id' => 'required',
                'categories_id' => 'required',
                'destination_id' => 'required',
                'image' => 'image',
            ],
            [
                'name.required' => 'Data harus diisi!',
                'name_en.required' => 'Data harus diisi!',
                'name_mandarin.required' => 'Data harus diisi!',
                'slug.required' => 'Data harus diisi!',
                'short_desc.required' => 'Data harus diisi!',
                'short_desc_en.required' => 'Data harus diisi!',
                'short_desc_mandarin.required' => 'Data harus diisi!',
                'price.required' => 'Data harus diisi!',
                'facilities_id.required' => 'Data harus diisi!',
                'categories_id.required' => 'Data harus diisi!',
                'destination_id.required' => 'Data harus diisi!',

                'image.image' => 'File harus berupa gambar',
            ]
        );
        // file
        $image = $request->file('image');
        $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move('./assets/services/', $nameImage);

        $facilities_ids = $request->input('facilities_id');
        $destination_ids = $request->input('destination_id');

        $layanan = Layanan::create([

            'name' => $request->name,
            'name_en' => $request->name_en,
            'name_mandarin' => $request->name_mandarin,
            'slug' => $request->slug,
            'short_desc' => $request->short_desc,
            'short_desc_en' => $request->short_desc_en,
            'short_desc_mandarin' => $request->short_desc_mandarin,
            'price' => $request->price,
            'categoies_id' => $request->categories_id,
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

        return view('admin.ubahservices', compact('services'));
    }

    public function proses_ubah_services(Request $request)
    {
        $checkEvent = Layanan::where('name', $request->input('name'))->where('id', '!=', $request->input('services_id'))->first();
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

        Layanan::where('id', $request->input('services_id'))->update($validatedData);
        $services = Layanan::where('id', $request->input('services_id'))->first();

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Berhasil Diubah</p>");
        return redirect()->to("/app-admin/data/ubah/layanan/$services->name");
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
        $category = Category::where('slug', $slug)->firstOrFail();
        $about = About::first();
        $services = Layanan::where('categories_id', $category->id)->get();

        return view('user.layanan', compact('services', 'category', 'about'));
    }
    public function detail_layanan($slug)
    {
        $services = Layanan::where('slug', $slug)->first();

        return view('user.detail_layanan', compact('services'));
    }
}