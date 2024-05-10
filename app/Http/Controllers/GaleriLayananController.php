<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Layanan;
use App\Models\ServicesGallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GaleriLayananController extends Controller
{
    public function admin_galeri_layanan(Request $request)
    {

        $slug = $request->slug;
        $services = Layanan::where('slug', $slug)->first();

        $servicesGalleries = ServicesGallery::where('services_id', $services->id)->orderBy('image_name', 'desc')->get();

        return view('admin.galeri_layanan', compact('services', 'servicesGalleries'));
    }
    public function tambah_galeri_layanan(Request $request)
    {

        $slug = $request->slug;
        $services = Layanan::where('slug', $slug)->first();

        return view('admin.tambah_galeri_layanan', compact('services'));
    }
    public function ubah_galeri_layanan(Request $request)
    {

        $slug = $request->slug;
        $id = $request->id;
        $services = Layanan::where('slug', $slug)->first();
        $servicesGalleries = ServicesGallery::where('id', $id)->first();

        return view('admin.ubah_galeri_layanan', compact('services', 'servicesGalleries'));
    }
    public function proses_tambah_galeri_layanan(Request $request)
    {
        $services = Layanan::find($request->services_id);
        $validatedData = $request->validate(
            [
                'image_name' => 'max:255',
                'desc' => 'max:255',
                'desc_en' => 'max:255',
                'desc_mandarin' => 'max:255',
                'image' => 'image',
            ],
            [
                'image_name.max' => 'Nama maksimal 255 karakter',
                'desc.max' => 'Nama maksimal 255 karakter',
                'desc_en.max' => 'Nama maksimal 255 karakter',
                'desc_mandarin.max' => 'Nama maksimal 255 karakter',
                'image.image' => 'File harus berupa gambar',
            ]
        );

        $image = $request->file('image');
        $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move('./assets/galeri_layanan/', $nameImage);
        $validatedData['image'] = $nameImage;
        $validatedData['services_id'] = $services->id;
        ServicesGallery::create($validatedData);
        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Galeri Galeri Berhasil Ditambahkan</p>");
        return redirect()->to("/app-admin/data/galeri/layanan/$services->slug");
    }
    public function proses_ubah_galeri_layanan(Request $request)
    {

        $servicesGalleries = ServicesGallery::find($request->id);
        $services = Layanan::find($servicesGalleries->services_id);

        $validatedData = $request->validate([
            'image_name' => 'max:255',
            'desc' => 'max:255',
            'desc_en' => 'max:255',
            'desc_mandarin' => 'max:255',
            'image' => 'image',
        ], [
            'image_name.max' => 'Nama maksimal 255 karakter',
            'desc.max' => 'Deskripsi maksimal 255 karakter',
            'desc_en.max' => 'Deskripsi (Bahasa Inggris) maksimal 255 karakter',
            'desc_mandarin.max' => 'Deskripsi (Bahasa Mandarin) maksimal 255 karakter',
            'image.image' => 'File harus berupa gambar',
        ]);

        // Hapus gambar lama jika ada gambar baru yang diupload
        if ($request->hasFile('image')) {
            Storage::delete('assets/galeri_layanan/' . $servicesGalleries->image);
        }

        $servicesGalleries->image_name = $validatedData['image_name'];
        $servicesGalleries->desc = $validatedData['desc'];
        $servicesGalleries->desc_en = $validatedData['desc_en'];
        $servicesGalleries->desc_mandarin = $validatedData['desc_mandarin'];

        // Ubah gambar jika ada gambar baru yang diupload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move('./assets/galeri_layanan/', $nameImage);
            $servicesGalleries->image = $nameImage;
        }

        $servicesGalleries->save();

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Data Galeri Layanan Berhasil Diubah</p>");

        return redirect()->to("/app-admin/data/galeri/layanan/{$services->slug}");
    }
    public function proses_hapus_galeri_layanan(Request $request)
    {
        $id = $request->id;
        $servicesGalleries = ServicesGallery::find($request->id);
        $services = Layanan::find($servicesGalleries->services_id);

        if ($servicesGalleries) {
            unlink(('./assets/galeri_layanan/') . $servicesGalleries->image);
            ServicesGallery::where('id', $id)->delete();
            session()->flash('msg_status', 'success');
            session()->flash('msg', "<h5>Berhasil</h5><p>Data Galeri berhasil dihapus !</p>");
            return redirect()->to("/app-admin/data/galeri/layanan/{$services->slug}");
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data Galeri tidak ditemukan !</p>");
            return redirect()->to("/app-admin/data/galeri/layanan/{$services->slug}");
        }
    }
}