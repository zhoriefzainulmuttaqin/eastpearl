<?php

namespace App\Http\Controllers;
use App\Models\Galeri;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class GaleriController extends Controller
{
    // ADMIN
    public function galeri()
    {
        $galeri = Galeri::get();

        return view('admin.galeri', compact('galeri'));
    }

    public function tambah_galeri()
    {
        $galeri = Galeri::get();

        return view('admin.tambahGaleri', compact('galeri'));
    }

    public function proses_tambah_galeri(Request $request)
    {
        $validatedData = $request->validate(
            [
                'image_name' => 'unique:galleries',
                'picture' => 'image',
            ],
            [
                'image_name.unique' => 'Nama sudah ada !',
                'picture.image' => 'File harus berupa gambar',
            ]
        );
        // file
        $image = $request->file('image');
        $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move('./assets/galeri/', $nameImage);


        Galeri::insert([

            'image_name' =>  $request->image_name,
            'image' =>  $nameImage,
            'status' =>  $request->status ?? 0,
        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Gambar Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/galeri');
    }

    public function ubah_galeri_akomodasi(Accomodation $Accomodation, AccomodationGallery $AccomodationGallery)
    {
        $data = [
            'accomodation' => $Accomodation,
            'gallery' => $AccomodationGallery,
        ];
        return view('admin.ubah_galeri_akomodasi', $data);
    }
    public function proses_ubah_galeri_akomodasi(Request $request)
    {
        $accomodation = Accomodation::find($request->accomodation_id);
        $validatedData = $request->validate(
            [
                'name' => 'max:255',
                'name_en' => 'max:255',
                'image' => 'image',
            ],
            [
                'name.max' => 'Nama maksimal 255 karakter',
                'name_en.max' => 'Nama maksimal 255 karakter',
                'picture.image' => 'File harus berupa gambar',
            ]
        );

        $gallery = AccomodationGallery::where('id', $request->input('gallery_id'))->first();
        if ($request->file('picture')) {
            if ($gallery->picture != NULL) {
                unlink(('./assets/akomodasi/') . $gallery->picture);
            }
            $image = $request->file('picture');
            $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move('./assets/akomodasi/', $nameImage);
            $validatedData['picture'] = $nameImage;
        }
        $validatedData['data_id'] = $accomodation->id;

        AccomodationGallery::where('id', $request->input('gallery_id'))->update($validatedData);
        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Galeri Akomodasi Berhasil Diubah</p>");
        return redirect()->to("/app-admin/data/ubah/galeri/akomodasi/$accomodation->slug/$gallery->id");
    }
    public function hapus_galeri_akomodasi(Accomodation $Accomodation, AccomodationGallery $AccomodationGallery)
    {
        unlink(('./assets/akomodasi/') . $AccomodationGallery->picture);
        AccomodationGallery::where('id', $AccomodationGallery->id)->delete();
        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Galeri Akomodasi Berhasil Dihapus</p>");
        return redirect()->to("/app-admin/data/galeri/akomodasi/$Accomodation->slug");
    }
    public function link_akomodasi(Accomodation $Accomodation)
    {
        $accomodationLinks = AccomodationLink::where('data_id', $Accomodation->id)->orderBy('source_name', 'asc')->get();
        $data = [
            'accomodation' => $Accomodation,
            'accomodationLinks' => $accomodationLinks,
        ];
        return view('admin.link_akomodasi', $data);
    }


    // USER
    public function user_galeri()
    {
        $galeri = Galeri::get();

        return view('user.galeri');
    }
}
