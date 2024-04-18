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
use App\Http\Controllers\GaleriController;
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
// Route::get("get-cookie", [LocaleController::class, "getCookie"]);

Route::get('/about', [AboutController::class, 'about']);
Route::get('/galeri', [GaleriController::class, 'user_galeri']);
Route::get('/open-trip', [AboutController::class, 'openTrip']);




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

Route::group(["middleware" => ["admin", "redirect.on.null"]], function () {
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
         Route::get("data/tentang/ubah/{slug}", [AboutController::class, "ubah_tentang"]);
         Route::post("data/tentang/proses-ubah", [AboutController::class, "proses_ubah_tentang"]);
         Route::get("data/tentang/hapus/{slug}", [AboutController::class, "proses_hapus_tentang"]);

        //  kategori
 Route::get("data/kategori", [CategoryController::class, "admin_kategori"]);
         Route::get("data/tambah/kategori", [CategoryController::class, "tambah_kategori"]);
         Route::post("data/kategori/proses-tambah", [CategoryController::class, "proses_tambah_kategori"]);
         Route::get("data/kategori/ubah/{slug}", [CategoryController::class, "ubah_kategori"]);
         Route::post("data/kategori/proses-ubah", [CategoryController::class, "proses_ubah_kategori"]);
         Route::get("data/kategori/hapus/{slug}", [CategoryController::class, "proses_hapus_kategori"]);

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

        // Laporan
    });
});