<?php

namespace App\Http\Controllers;

use App\Models\CategorySouvenir;
use App\Models\Souvenir;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class SouvenirController extends Controller
{
    public function souvenir(Request $request)
    {
        if (Cookie::get('user-language') != NULL) {
            $locale = Cookie::get('user-language');
            App::setLocale($locale);
        } else {
            $locale = "id";
            App::setLocale("id");
        }
        if ($request->keyword) {
            $keyword = $request->keyword;
        } else {
            $keyword = '';
        }

        $cat_list = [];
        $cat_list_data = [];

        if ($request->cat_list) {
            $cat_list = $request->cat_list;
            $cat_list_data = array_fill_keys($request->cat_list, 'category');
        }
        ;

        $souvenir = Souvenir::join('category_souvenir', 'souvenir.souvenir_category_id', '=', 'category_souvenir.id')
            ->when($locale, function (Builder $query, $locale) use ($keyword) {
                if ($locale == 'en') {
                    $query->where('souvenir.name_en', 'like', '%' . $keyword . '%');
                } elseif ($locale == 'mandarin') {
                    $query->where('souvenir.name_mandarin', 'like', '%' . $keyword . '%');
                } else {
                    $query->where('souvenir.name', 'like', '%' . $keyword . '%');
                }
            })
            // ->where('tours.name', 'like',  '%' . $keyword . '%')
            // ->Orwhere('tours.name_en', 'like',  '%' . $keyword . '%')
            // ->where(function (Builder $query) use ($cat_list, $request) {
            //     if ($request->cat_list) {
            //         if ($request->cat_list[0] != "0") {
            //             $query->where(
            //                 function (Builder $q) use ($cat_list) {
            //                     foreach ($cat_list as $key => $value) {
            //                         $q->orWhere('tours.category_id', $value);
            //                     }
            //                 }
            //             );
            //         }
            //     }
            // })
            ->where(function (Builder $query) use ($cat_list) {
                $query->where(
                    function (Builder $q) use ($cat_list) {
                        foreach ($cat_list as $key => $value) {
                            $q->orWhere('souvenir.souvenir_category_id', $value);
                        }
                    }
                );
            })
            ->select(['souvenir.*', 'category_souvenir.name as category_name', 'category_souvenir.name_en as category_name_en', 'category_souvenir.name_mandarin as category_name_mandarin'])
            ->orderBy('souvenir.created_at', 'desc')
            ->paginate(15);
        if ($request->keyword) {
            $souvenir->appends(array('keyword' => $keyword));
        }
        if ($request->cat_list) {
            $souvenir->appends($cat_list);
        }

        $categories = CategorySouvenir::orderBy('name', 'asc')->get();
        $data = [
            'souvenir' => $souvenir,
            'categories' => $categories,
            "cat_list" => $cat_list_data,
        ];
        return view('user.souvenir', $data);
    }

    // admin souvenir
    public function admin_souvenir()
    {
        $souvenir = Souvenir::join('category_souvenir', 'souvenir.souvenir_category_id', '=', 'category_souvenir.id')
            ->orderBy('souvenir.created_at', 'desc')
            ->select(['souvenir.*', 'category_souvenir.name as category_name'])
            ->get();

        $categories = CategorySouvenir::orderBy('created_at', 'asc')->get();

        $data = [
            'souvenir' => $souvenir,
            'categories' => $categories,
        ];
        return view('admin.souvenir', $data);
    }

    public function tambah_souvenir()
    {
        $categories = CategorySouvenir::orderBy('name', 'asc')->get();

        $data = [
            'categories' => $categories,
        ];
        return view('admin.tambahSouvenir', $data);
    }

    public function proses_tambah_souvenir(Request $request)
    {
        $validatedData = $request->validate(
            [
                'slug' => 'unique:souvenir',
                // 'phone' => 'unique:souvenir',
                'image' => 'image',
            ],
            [
                'slug.unique' => 'Slug sudah ada !',
                // 'phone.unique' => 'No. Handphone sudah ada !',
                'image.image' => 'File harus berupa gambar',
            ]
        );

        // file
        $image = $request->file('image');
        $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move('./assets/souvenir/', $nameImage);

        // wajib
        $name = $request->name;
        $name_en = $request->name_en;
        $name_mandarin = $request->name_mandarin;
        $price = $request->price;
        $disc_price = $request->disc_price;
        $souvenir_category_id = $request->souvenir_category_id;
        $desc = $request->desc;
        $desc_en = $request->desc_en;
        $desc_mandarin = $request->desc_mandarin;
        $link_shopee = $request->link_shopee;

        // optional (Boleh kosong)
        $link_amazon = $request->link_amazon == "" ? NULL : $request->link_amazon;
        $link_alibaba = $request->link_alibaba == "" ? NULL : $request->link_alibaba;
        $link_tokopedia = $request->link_tokopedia == "" ? NULL : $request->link_tokopedia;
        $link_blibli = $request->link_blibli == "" ? NULL : $request->link_blibli;

        Souvenir::insert([
            'name' => $name,
            'name_en' => $name_en,
            'name_mandarin' => $name_mandarin,
            'price' => $price,
            'disc_price' => $disc_price,
            'souvenir_category_id' => $souvenir_category_id,
            'desc' => $desc,
            'desc_en' => $desc_en,
            'desc_mandarin' => $desc_mandarin,
            'link_shopee' => $link_shopee,
            'link_amazon' => $link_amazon,
            'link_alibaba' => $link_alibaba,
            'link_blibli' => $link_blibli,
            'link_tokopedia' => $link_tokopedia,
            'slug' => Str::of($request->slug)->slug('-'),
            'image' => $nameImage,

        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Souvenir Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/souvenir');
    }

    public function ubah_souvenir(Request $request)
    {
        $slug = $request->slug;

        $souvenir = Souvenir::where('slug', $slug)->first();

        if ($souvenir) {
            $categories = CategorySouvenir::orderBy('name', 'asc')->get();

            $data = [
                'categories' => $categories,
                'souvenir' => $souvenir,
            ];
            return view('admin.ubahSouvenir', $data);
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data souvenir tidak ditemukan !</p>");
            return redirect()->to('/app-admin/data/souvenir');
        }
    }

    public function proses_ubah_souvenir(Request $request)
    {
        // wajib
        $id = $request->id;
        $slug = $request->slug;
        $name = $request->name;
        $name_en = $request->name_en;
        $name_mandarin = $request->name_mandarin;
        $price = $request->price;
        $disc_price = $request->disc_price;
        $souvenir_category_id = $request->souvenir_category_id;
        $desc = $request->desc;
        $desc_en = $request->desc_en;
        $desc_mandarin = $request->desc_mandarin;
        $link_shopee = $request->link_shopee;

        // optional (Boleh kosong)
        $link_amazon = $request->link_amazon == "" ? NULL : $request->link_amazon;
        $link_alibaba = $request->link_alibaba == "" ? NULL : $request->link_alibaba;
        $link_tokopedia = $request->link_tokopedia == "" ? NULL : $request->link_tokopedia;
        $link_blibli = $request->link_blibli == "" ? NULL : $request->link_blibli;

        $data_souvenir = Souvenir::findOrFail($request->services_id);



        $validateData = $request->validate([
            'slug.unique' => 'Slug : ' . $slug . ' sudah terdaftar !',
            'image.image' => 'File harus berupa gambar !',
        ]);

        // Jika ada file gambar baru yang diunggah
        if ($request->hasFile('image')) {
            // Hapus file gambar lama
            if (File::exists("./assets/souvenir/{$data_souvenir->image}")) {
                File::delete("./assets/souvenir/{$data_souvenir->image}");
            }

            // Upload file gambar baru
            $image = $request->file('image');
            $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move("./assets/souvenir/", $nameImage);

        }

        Souvenir::where('id', $id)
            ->update([
                'name' => $name,
                'name_en' => $name_en,
                'name_mandarin' => $name_mandarin,
                'price' => $price,
                'disc_price' => $disc_price,
                'souvenir_category_id' => $souvenir_category_id,
                'desc' => $desc,
                'desc_en' => $desc_en,
                'desc_mandarin' => $desc_mandarin,
                'link_shopee' => $link_shopee,
                'link_amazon' => $link_amazon,
                'link_alibaba' => $link_alibaba,
                'link_blibli' => $link_blibli,
                'link_tokopedia' => $link_tokopedia,
                'slug' => Str::of($request->slug)->slug('-'),
                'image' => $nameImage,
            ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Souvenir Berhasil Diubah</p>");
        return redirect()->to('app-admin/data/souvenir/ubah/' . $slug);
    }

    public function proses_hapus_souvenir(Request $request)
    {
        $slug = $request->slug;
        $souvenir = Souvenir::where('slug', $slug)->first();

        if ($souvenir) {
            unlink(('./assets/souvenir/') . $souvenir->image);
            Souvenir::where('slug', $slug)->delete();
            session()->flash('msg_status', 'success');
            session()->flash('msg', "<h5>Berhasil</h5><p>Data souvenir berhasil dihapus !</p>");
            return redirect()->to('/app-admin/data/souvenir');
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data souvenir tidak ditemukan !</p>");
            return redirect()->to('/app-admin/data/souvenir');
        }
    }


    // end admin souvenir

    // admin kategori souvenir
    public function admin_souvenir_kategori()
    {
        $category_souvenir = CategorySouvenir::orderBy('name', 'asc')->get();

        $data = [
            'category_souvenir' => $category_souvenir,
        ];
        return view('admin.kategori_souvenir', $data);
    }

    public function proses_tambah_kategori_souvenir(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => Rule::unique('category_souvenir'),
                'name_en' => Rule::unique('category_souvenir'),
                'name_mandarin' => Rule::unique('category_souvenir'),
                'slug' => Rule::unique('category_souvenir'),
            ],
            [
                'name.unique' => 'Nama Kategori (Indonesia) sudah ada !',
                'name_en.unique' => 'Nama Kategori (Inggris) sudah ada !',
                'name_mandarin.unique' => 'Nama Kategori (Mandarin) sudah ada !',
                'slug.unique' => 'Slug sudah ada !',
            ]
        );

        CategorySouvenir::insert([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'name_mandarin' => $request->name_mandarin,
            'slug' => $request->slug,
        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Kategori Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/souvenir/kategori');
    }

    public function proses_ubah_kategori_souvenir(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $name_en = $request->name_en;
        $name_mandarin = $request->name_mandarin;
        $slug = $request->slug;

        $category_name = CategorySouvenir::where("name", $name)->first();
        $category_name_en = CategorySouvenir::where("name_en", $name_en)->first();
        $category_name_mandarin = CategorySouvenir::where("name_mandarin", $name_mandarin)->first();
        $category_slug = CategorySouvenir::where("slug", $slug)->first();

        $data_category = CategorySouvenir::where("id", $id)->first();

        if ($category_name != null && $data_category->name != $name) {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Kategori : $name (Indonesia) sudah terdaftar !</p>");
            return redirect()->to('/app-admin/data/souvenir/kategori');
        } else if ($category_name_en != null && $data_category->name_en != $name_en) {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Kategori : $name_en (Inggris) sudah terdaftar !</p>");
            return redirect()->to('/app-admin/data/souvenir/kategori');
        } else if ($category_name_mandarin != null && $data_category->name_mandarin != $name_mandarin) {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Kategori : $name_mandarin (Mandarin) sudah terdaftar !</p>");
            return redirect()->to('/app-admin/data/souvenir/kategori');
        } else if ($category_slug != null && $data_category->slug != $slug) {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Slug : $slug  sudah terdaftar !</p>");
            return redirect()->to('/app-admin/data/souvenir/kategori');
        } else {
            CategorySouvenir::where('id', $id)
                ->update([
                    'name' => $name,
                    'name_en' => $name_en,
                    'name_mandarin' => $name_mandarin,
                    'slug' => $slug,
                ]);

            session()->flash('msg_status', 'success');
            session()->flash('msg', "<h5>Berhasil</h5><p>Kategori Berhasil Diubah</p>");
            return redirect()->to('/app-admin/data/souvenir/kategori');
        }
    }

    public function proses_hapus_kategori_souvenir(Request $request)
    {
        $category_souvenir = CategorySouvenir::where('id', $request->id)->first();

        if ($category_souvenir) {
            $Souvenir = Souvenir::where('category_id', $category_souvenir->id)->first();
            if ($Souvenir) {
                session()->flash('msg_status', 'warning');
                session()->flash('msg', "<h5>Gagal</h5><p>Data Kategori Sudah Digunakan !</p>");
                return redirect()->to('/app-admin/data/souvenir/kategori');
            } else {
                CategorySouvenir::where('id', $request->id)->delete();
                session()->flash('msg_status', 'success');
                session()->flash('msg', "<h5>Berhasil</h5><p>Kategori Berhasil Dihapus</p>");
                return redirect()->to('/app-admin/data/souvenir/kategori');
            }
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data Kategori Tidak Ditemukan !</p>");
            return redirect()->to('/app-admin/data/souvenir/kategori');
        }
    }
    // end admin kategori souvenir
}
