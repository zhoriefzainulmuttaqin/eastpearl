<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\CategoryNews;
use App\Models\News;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class NewsController extends Controller
{
    public function berita(Request $request)
    {
        if (Cookie::get('user-language') != NULL) {
            $locale = Cookie::get('user-language');
            App::setLocale($locale);
        } else {
            App::setLocale("id");
        }
        if ($request->keyword) {
            $keyword = $request->keyword;
        } else {
            $keyword = '';
        }

        $news = News::join('category_news', 'news.category_id', '=', 'category_news.id')
            ->join('administrators', 'news.admin_id', '=', 'administrators.id')
            ->select(['news.*', 'category_news.name as category_name', 'category_news.name_en as category_name_en', 'category_news.name_mandarin as category_name_mandarin', 'administrators.name as admin_name'])
            ->orderBy('news.published_date', 'desc')
            ->paginate(10)
            ->appends(request()->query());

        $batas = (int) (count($news) / 2);

        $data = [
            'news' => $news,
            'batas' => $batas,
        ];
        return view('user.news', $data);
    }

    public function detail_berita(Request $request)
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

        $new = News::join('category_news', 'news.category_id', '=', 'category_news.id')
            ->join('administrators', 'news.admin_id', '=', 'administrators.id')
            ->where('news.slug', $request->slug)
            ->select(['news.*', 'category_news.name as category_name', 'administrators.name as admin_name'])
            ->orderBy('news.published_date', 'desc')
            ->first();

        $news = News::join('category_news', 'news.category_id', '=', 'category_news.id')
            ->join('administrators', 'news.admin_id', '=', 'administrators.id')
            ->when(!$keyword, function (Builder $query, $keyword) {
                $query->limit(5);
            })
            ->when($locale, function (Builder $query, $locale) use ($keyword) {
                if ($locale == 'en') {
                    $query->where('news.name_en', 'like', '%' . $keyword . '%');
                } elseif ($locale == 'mandarin') {
                    $query->where('news.name_mandarin', 'like', '%' . $keyword . '%');
                } else {
                    $query->where('news.name', 'like', '%' . $keyword . '%');
                }
            })
            ->select(['news.*', 'category_news.name as category_name', 'category_news.name_en as category_name_en', 'category_news.name_mandarin as category_name_mandarin', 'administrators.name as admin_name'])
            ->orderBy('news.published_date', 'desc')
            ->get();
        $batas = (int) (count($news) / 2);

        $data = [
            'new' => $new,
            'news' => $news,
            'keyword' => $keyword,
            'batas' => $batas,
        ];
        return view('user.detail_berita', $data);
    }

    public function admin_berita()
    {
        $news = News::join('administrators', 'news.admin_id', '=', 'administrators.id')
            ->join('category_news', 'news.category_id', '=', 'category_news.id')
            ->orderBy('news.published_date', 'desc')
            ->where('news.admin_id', Auth::guard('admin')->user()->id)
            ->select(['news.*', 'category_news.name as category_name'])
            ->get();
        $data = [
            'news' => $news,
        ];
        return view('admin.berita', $data);
    }

    public function tambah_berita()
    {
        $category_news = CategoryNews::orderBy('name', 'asc')->get();

        $data = [
            'category_news' => $category_news,
        ];
        return view('admin.tambah_berita', $data);
    }
    public function ubah_berita(News $News)
    {
        $category_news = CategoryNews::orderBy('name', 'asc')->get();

        $data = [
            'category_news' => $category_news,
            'new' => $News,
        ];
        return view('admin.ubah_berita', $data);
    }
    public function proses_tambah_berita(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => 'max:255',
                'name_en' => 'max:255',
                'name_mandarin' => 'max:255',
                'slug' => 'unique:news',
                'image' => 'image',
                'content' => '',
                'content_en' => '',
                'content_mandarin' => '',
                'category_id' => '',
            ],
            [
                'name.max' => 'Nama maksimal 255 karakter',
                'name_en.max' => 'Nama maksimal 255 karakter',
                'name_mandarin.max' => 'Nama maksimal 255 karakter',
                'slug.unique' => 'Slug sudah ada',
                'image.image' => 'File harus berupa gambar',
            ]
        );

        $validatedData['admin_id'] = Auth::guard('admin')->user()->id;
        $validatedData['published_date'] = date('Y-m-d H:i:s');
        $validatedData['slug'] = Str::of($request->slug)->slug('-');

        $image = $request->file('image');
        $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move('./assets/berita/', $nameImage);
        $validatedData['image'] = $nameImage;

        News::create($validatedData);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Berita Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/traveltopia');
    }
    public function proses_ubah_berita(Request $request)
    {
        $checkEvent = News::where('slug', $request->input('slug'))->where('id', '!=', $request->input('new_id'))->first();
        if ($checkEvent) {
            $rules = [
                'name' => 'max:255',
                'name_en' => 'max:255',
                'name_mandarin' => 'max:255',
                'slug' => 'unique:news',
                'image' => 'image',
                'content' => '',
                'content_en' => '',
                'content_mandarin' => '',
                'category_id' => '',
            ];
        } else {
            $rules = [
                'name' => 'max:255',
                'name_en' => 'max:255',
                'name_mandarin' => 'max:255',
                'slug' => '',
                'image' => 'image',
                'content' => '',
                'content_en' => '',
                'content_mandarin' => '',
                'category_id' => '',
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


        $validatedData['admin_id'] = Auth::guard('admin')->user()->id;
        $validatedData['slug'] = Str::of($request->slug)->slug('-');

        if ($request->file('image')) {
            $new = News::where('id', $request->input('new_id'))->first();
            if ($new->image != NULL) {
                unlink(('./assets/berita/') . $new->image);
            }
            $image = $request->file('image');
            $nameImage = Str::random(40) . '.' . $image->getClientOriginalExtension();
            $image->move('./assets/berita/', $nameImage);
            $validatedData['image'] = $nameImage;
        }
        News::where('id', $request->input('new_id'))->update($validatedData);
        $berita = News::where('id', $request->input('new_id'))->first();

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Berita Berhasil Diubah</p>");
        return redirect()->to("/app-admin/data/ubah/traveltopia/$berita->slug");
    }
    public function hapus_berita(News $News)
    {
        unlink(('./assets/berita/') . $News->image);
        News::where('id', $News->id)->delete();
        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Berita Berhasil Dihapus</p>");
        return redirect()->to("/app-admin/data/traveltopia");
    }
    public function admin_berita_kategori()
    {
        $category_news = CategoryNews::orderBy('name', 'asc')->get();

        $data = [
            'category_news' => $category_news,
        ];
        return view('admin.kategori_berita', $data);
    }

    public function proses_tambah_kategori_berita(Request $request)
    {
        $validatedData = $request->validate(
            [
                'name' => Rule::unique('category_news'),
                'name_en' => Rule::unique('category_news'),
                'name_mandarin' => Rule::unique('category_news'),
            ],
            [
                'name.unique' => 'Nama Kategori (Indonesia) sudah ada !',
                'name_en.unique' => 'Nama Kategori (Inggris) sudah ada !',
                'name_mandarin.unique' => 'Nama Kategori (Mandarin) sudah ada !',
            ]
        );

        CategoryNews::insert([
            'name' => $request->name,
            'name_en' => $request->name_en,
            'name_mandarin' => $request->name_mandarin,
        ]);

        session()->flash('msg_status', 'success');
        session()->flash('msg', "<h5>Berhasil</h5><p>Kategori Berhasil Ditambahkan</p>");
        return redirect()->to('/app-admin/data/traveltopia/kategori');
    }

    public function proses_ubah_kategori_berita(Request $request)
    {
        $id = $request->id;
        $name = $request->name;
        $name_en = $request->name_en;
        $name_mandarin = $request->name_mandarin;

        $category_name = CategoryNews::where("name", $name)->first();
        $category_name_en = CategoryNews::where("name_en", $name_en)->first();
        $category_name_mandarin = CategoryNews::where("name_mandarin", $name_mandarin)->first();

        $data_category = CategoryNews::where("id", $id)->first();

        if ($category_name != null && $data_category->name != $name) {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Kategori : $name (Indonesia) sudah terdaftar !</p>");
            return redirect()->to('/app-admin/data/traveltopia/kategori');
        } else if ($category_name_en != null && $data_category->name_en != $name_en) {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Kategori : $name_en (Inggris) sudah terdaftar !</p>");
            return redirect()->to('/app-admin/data/traveltopia/kategori');
        } else if ($category_name_mandarin != null && $data_category->name_mandarin != $name_mandarin) {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Kategori : $name_mandarin (Mandarin) sudah terdaftar !</p>");
            return redirect()->to('/app-admin/data/traveltopia/kategori');
        } else {
            CategoryNews::where('id', $id)
                ->update([
                    'name' => $name,
                    'name_en' => $name_en,
                    'name_mandarin' => $name_mandarin,
                ]);

            session()->flash('msg_status', 'success');
            session()->flash('msg', "<h5>Berhasil</h5><p>Kategori Berhasil Diubah</p>");
            return redirect()->to('/app-admin/data/traveltopia/kategori');
        }
    }

    public function proses_hapus_kategori_berita(Request $request)
    {
        $category_news = CategoryNews::where('id', $request->id)->first();

        if ($category_news) {
            $New = News::where('category_id', $category_news->id)->first();
            if ($New) {
                session()->flash('msg_status', 'warning');
                session()->flash('msg', "<h5>Gagal</h5><p>Data Kategori Sudah Digunakan !</p>");
                return redirect()->to('/app-admin/data/traveltopia/kategori');
            } else {
                CategoryNews::where('id', $request->id)->delete();
                session()->flash('msg_status', 'success');
                session()->flash('msg', "<h5>Berhasil</h5><p>Kategori Berhasil Dihapus</p>");
                return redirect()->to('/app-admin/data/traveltopia/kategori');
            }
        } else {
            session()->flash('msg_status', 'warning');
            session()->flash('msg', "<h5>Gagal</h5><p>Data Kategori Tidak Ditemukan !</p>");
            return redirect()->to('/app-admin/data/traveltopia/kategori');
        }
    }
}