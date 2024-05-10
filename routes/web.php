<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AccountPartnerController;
use App\Http\Controllers\AffiliateController;
use App\Http\Controllers\AkomodasiController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\AuthAffiliateController;
use App\Http\Controllers\AuthPartnerController;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\BuyTurismCardController;
use App\Http\Controllers\CardUsedPartnerController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardAffiliateController;
use App\Http\Controllers\DashboardPartnerController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GiftController;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\LocaleController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfilePartnerController;
use App\Http\Controllers\ReportAdminController;
use App\Http\Controllers\ReportAffiliateController;
use App\Http\Controllers\ReportPartnerController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TransactionAdminController;
use App\Http\Controllers\TransactionAffiliate;
use App\Http\Controllers\UserHomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DestinationController;
use App\Http\Controllers\FasilitasController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\GaleriLayananController;
use App\Http\Controllers\LayananController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
 */

Route::get('/', [UserHomeController::class, "home"]);

Route::get("atur-bahasa/{locale}", [LocaleController::class, "atur_bahasa"]);
Route::get("set-bahasa/{locale}", [LocaleController::class, "set_bahasa"]);
Route::get("set-bahasa/{locale}", [LocaleController::class, "set_bahasa"]);
// Route::get("get-cookie", [LocaleController::class, "getCookie"]);

Route::get('/about', [AboutController::class, 'about']);
Route::get('/galeri', [GaleriController::class, 'user_galeri']);
Route::get('/layanan/{slug}', [LayananController::class, 'layanan'])->name('layanan.kategori');
Route::get('/layanan/detail/{slug}', [LayananController::class, 'detail_layanan'])->name('detail.layanan.kategori');


Route::get("login", [AuthUserController::class, "masuk"])->name("login");
Route::post("proses-login", [AuthUserController::class, "proses_masuk"]);
Route::get("registrasi", [AuthUserController::class, "registrasi"]);
Route::post("proses-registrasi", [AuthUserController::class, "proses_registrasi"]);
Route::get("keluar", [AuthUserController::class, "keluar"]);


Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'profile']);
    Route::post('/proses-ubah-foto-profil', [ProfileController::class, 'process_change_profile_photo']);
    Route::get('/ubah-biodata-profil', [ProfileController::class, 'change_profile_biodata']);
    Route::post('/proses-ubah-biodata-profil', [ProfileController::class, 'process_change_profile_biodata']);
    Route::get('/ubah-password-profil', [ProfileController::class, 'change_profile_password']);
    Route::post('/proses-ubah-password-profil', [ProfileController::class, 'process_change_profile_password']);


});

Route::prefix("app-admin")->group(function () {
    Route::get('/', [AuthAdminController::class, 'login'])->middleware('GuestAdmin');
    Route::post('proses-login', [AuthAdminController::class, 'proses_masuk']);
    Route::get('keluar', [AuthAdminController::class, 'keluar'])->middleware('admin');

    Route::group(["middleware" => "admin"], function () {
        Route::get("dashboard", [DashboardAdminController::class, "dashboard"]);
        Route::get("logout", [AuthAdminController::class, "keluar"]);

        // galeri
        Route::get("data/galeri", [GaleriController::class, "galeri"]);
        Route::get("data/tambah/galeri", [GaleriController::class, "tambah_galeri"]);
        Route::post("data/galeri/proses-tambah", [GaleriController::class, "proses_tambah_galeri"]);
        Route::get("data/galeri/ubah/{slug}/{id}", [GaleriController::class, "ubah_galeri"]);
        Route::post("data/galeri/proses-ubah", [GaleriController::class, "proses_ubah_galeri"]);
        Route::get("data/galeri/hapus/{slug}/{id}", [GaleriController::class, "proses_hapus_galeri"]);

        // tentang
        Route::get("data/tentang", [AboutController::class, "admin_tentang"]);
        Route::get("data/tambah/tentang", [AboutController::class, "tambah_tentang"]);
        Route::post("data/tentang/proses-tambah", [AboutController::class, "proses_tambah_tentang"]);
        Route::get("data/tentang/ubah/{id}", [AboutController::class, "ubah_tentang"]);
        Route::post("data/tentang/proses-ubah", [AboutController::class, "proses_ubah_tentang"]);
        Route::get("data/tentang/hapus/{id}", [AboutController::class, "proses_hapus_tentang"]);

        //  kategori
        Route::get("data/kategori", [CategoryController::class, "admin_kategori"]);
        Route::get("data/tambah/kategori", [CategoryController::class, "tambah_kategori"]);
        Route::post("data/kategori/proses-tambah", [CategoryController::class, "proses_tambah_kategori"]);
        Route::get("data/kategori/ubah/{slug}", [CategoryController::class, "ubah_kategori"]);
        Route::post("data/kategori/proses-ubah", [CategoryController::class, "proses_ubah_kategori"]);
        Route::get("data/kategori/hapus/{id}", [CategoryController::class, "proses_hapus_kategori"]);

        //  fasilitas
        Route::get("data/fasilitas", [FasilitasController::class, "admin_fasilitas"]);
        Route::get("data/tambah/fasilitas", [FasilitasController::class, "tambah_fasilitas"]);
        Route::post("data/fasilitas/proses-tambah", [FasilitasController::class, "proses_tambah_fasilitas"]);
        Route::get("data/fasilitas/ubah/{id}", [FasilitasController::class, "ubah_fasilitas"]);
        Route::post("data/fasilitas/proses-ubah", [FasilitasController::class, "proses_ubah_fasilitas"]);
        Route::get("data/fasilitas/hapus/{id}", [FasilitasController::class, "proses_hapus_fasilitas"]);

        //  destination
        Route::get("data/destination", [DestinationController::class, "admin_destination"]);
        Route::get("data/tambah/destination", [DestinationController::class, "tambah_destination"]);
        Route::post("data/destination/proses-tambah", [DestinationController::class, "proses_tambah_destination"]);
        Route::get("data/destination/ubah/{id}", [DestinationController::class, "ubah_destination"]);
        Route::post("data/destination/proses-ubah", [DestinationController::class, "proses_ubah_destination"]);
        Route::get("data/destination/hapus/{id}", [DestinationController::class, "proses_hapus_destination"]);

        //  layanan
        Route::get("data/layanan", [LayananController::class, "admin_layanan"]);
        Route::get("data/tambah/layanan", [LayananController::class, "tambah_layanan"]);
        Route::post("data/layanan/proses-tambah", [LayananController::class, "proses_tambah_layanan"]);
        Route::get("data/layanan/ubah/{slug}", [LayananController::class, "ubah_layanan"]);
        Route::post("data/layanan/proses-ubah", [LayananController::class, "proses_ubah_layanan"]);
        Route::get("data/layanan/hapus/{id}", [LayananController::class, "proses_hapus_layanan"]);

        //  galeri layanan
        Route::get("data/galeri/layanan/{slug}", [GaleriLayananController::class, "admin_galeri_layanan"]);
        Route::get("data/tambah/galeri/layanan/{slug}", [GaleriLayananController::class, "tambah_galeri_layanan"]);
        Route::post("data/galeri/layanan/proses-tambah", [GaleriLayananController::class, "proses_tambah_galeri_layanan"]);
        Route::get("data/galeri/layanan/ubah/{slug}/{id}", [GaleriLayananController::class, "ubah_galeri_layanan"]);
        Route::post("data/galeri/layanan/proses-ubah", [GaleriLayananController::class, "proses_ubah_galeri_layanan"]);
        Route::get("data/galeri/layanan/hapus/{slug}/{id}", [GaleriLayananController::class, "proses_hapus_galeri_layanan"]);

        //  data per layanan
        Route::get('data/layanan/{slug}', [LayananController::class, 'layananKategori'])->name('data.layanan.kategori');
        Route::get('data/detail/laynanan/{slug}', [LayananController::class, 'detailLayananKategori'])->name('layanan.detail');
        Route::get("data/tambah/layanan", [LayananController::class, "tambah_layanan"]);
        Route::post("data/layanan/proses-tambah", [LayananController::class, "proses_tambah_layanan"]);
        Route::get("data/layanan/ubah/{slug}", [LayananController::class, "ubah_layanan"]);
        Route::post("data/layanan/proses-ubah", [LayananController::class, "proses_ubah_layanan"]);
        Route::get("data/layanan/hapus/{id}", [LayananController::class, "proses_hapus_layanan"]);

        // akun admin
        Route::get("akun/admin", [AccountController::class, "akun_admin"]);
        Route::get("tambah/akun/admin", [AccountController::class, "tambah_akun_admin"]);
        Route::post("akun/admin/proses-tambah", [AccountController::class, "proses_tambah_akun_admin"]);
        Route::get("kelola/akun/admin/{id}", [AccountController::class, "kelola_akun_admin"]);
        Route::post("akun/admin/proses-ubah", [AccountController::class, "proses_ubah_akun_admin"]);
        Route::post("akun/admin/proses-reset-password", [AccountController::class, "proses_reset_password_akun_admin"]);

        // profile
        Route::get("profil", [AccountController::class, "profil"]);
        Route::post("profil/proses-ubah", [AccountController::class, "proses_ubah_profil"]);
        Route::post("profil/proses-reset-password", [AccountController::class, "proses_reset_password_profil"]);

        // akun pengguna
        Route::get("akun/pengguna", [AccountController::class, "akun_pengguna"]);
        Route::get("kelola/akun/pengguna/{id}", [AccountController::class, "kelola_akun_pengguna"]);
        Route::post("akun/pengguna/proses-ubah", [AccountController::class, "proses_ubah_akun_pengguna"]);
        Route::post("akun/pengguna/proses-reset-password", [AccountController::class, "proses_reset_password_akun_pengguna"]);


        // buat slug
        Route::get('buatSlug', [DashboardAdminController::class, "buat_slug"]);

        // Laporan
    });
});