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

Route::get('/wisata', [TourController::class, 'tours']);
Route::get('/detail-wisata/{slug}', [TourController::class, 'detail_tour']);
Route::get('/kuliner', [RestaurantController::class, 'restaurants']);
Route::get('/oleh-oleh', [ShopController::class, 'shops']);
Route::get('/about', [AboutController::class, 'about']);


Route::get("event", [EventController::class, "event"]);
Route::get("akomodasi", [AkomodasiController::class, "akomodasi"]);
Route::get("berita", [BeritaController::class, "berita"]);
Route::get("detail-berita/{slug}", [BeritaController::class, "detail_berita"]);
Route::get("detail-akomodasi/{Accomodation:slug}", [AkomodasiController::class, "detail_akomodasi"]);

Route::get("login", [AuthUserController::class, "masuk"])->name("login");
Route::post("proses-login", [AuthUserController::class, "proses_masuk"]);
Route::get("registrasi", [AuthUserController::class, "registrasi"]);
Route::post("proses-registrasi", [AuthUserController::class, "proses_registrasi"]);
Route::get("keluar", [AuthUserController::class, "keluar"]);

Route::get("layanan-produk", [ServiceController::class, "product_services"])->name("layanan-produk");
Route::get("layanan-produk/tourism-card", [ServiceController::class, "tourism_card"]);
Route::get("layanan-jasa", [ServiceController::class, "our_services"]);
Route::get("layanan-jasa/konsultan", [ServiceController::class, "service_consultant"]);
Route::get("layanan-jasa/konseptor", [ServiceController::class, "service_conceptor"]);
Route::get("layanan-jasa/pemasaran", [ServiceController::class, "service_marketing"]);

Route::get("paket-wisata/{slug}", [ServiceController::class, "detail_paket_wisata"]);

Route::middleware('auth')->group(function () {
    Route::get('/profil', [ProfileController::class, 'profile']);
    Route::post('/proses-ubah-foto-profil', [ProfileController::class, 'process_change_profile_photo']);
    Route::get('/ubah-biodata-profil', [ProfileController::class, 'change_profile_biodata']);
    Route::post('/proses-ubah-biodata-profil', [ProfileController::class, 'process_change_profile_biodata']);
    Route::get('/ubah-password-profil', [ProfileController::class, 'change_profile_password']);
    Route::post('/proses-ubah-password-profil', [ProfileController::class, 'process_change_profile_password']);

    Route::get("beli/tourism-card", [ServiceController::class, "beli_tourism_card"]);
    // Route::post("proses-beli/tourism-card", [ServiceController::class, "proses_beli_tourism_card"]);
    // Route::get("konfirmasi-beli/{id}/tourism-card", [ServiceController::class, "konfirmasi_beli_tourism_card"]);
    Route::get("beli-layanan-produk/{slug}", [ServiceController::class, "beli_layanan_produk"]);
    Route::post("proses-beli/layanan-produk", [ServiceController::class, "proses_beli_layanan_produk"]);
    Route::get("konfirmasi-beli/{id}/layanan-produk", [ServiceController::class, "konfirmasi_beli_layanan_produk"]);
    Route::get("discount-card/{code}/download", [TransactionAdminController::class, "discount_card_generate_image"]);
    // checkout
    Route::post('/checkout', [BuyTurismCardController::class, 'process'])->name("checkout-process");
    Route::get('/checkout/{transaction}', [BuyTurismCardController::class, 'checkout'])->name("checkout");
    Route::post("checkout/generatecard", [BuyTurismCardController::class, "generate_discount_card_user"]);

    Route::get('/checkout/success/{transaction}', [BuyTurismCardController::class, 'success'])->name("checkout-success");
});

Route::prefix("app-admin")->group(function () {
    Route::get('/', [AuthAdminController::class, 'login'])->middleware('GuestAdmin');
    Route::post('proses-login', [AuthAdminController::class, 'proses_masuk']);
    Route::get('keluar', [AuthAdminController::class, 'keluar'])->middleware('admin');

    Route::group(["middleware" => "admin"], function () {
        Route::get("dashboard", [DashboardAdminController::class, "dashboard"]);
        Route::get("logout", [AuthAdminController::class, "keluar"]);
        Route::get("data/event", [EventController::class, "admin_event"]);
        Route::get("data/tambah/event", [EventController::class, "tambah_event"]);
        Route::get("data/ubah/event/{Event:id}", [EventController::class, "ubah_event"]);
        Route::post("data/event/proses-tambah", [EventController::class, "proses_tambah_event"]);
        Route::post("data/event/proses-ubah", [EventController::class, "proses_ubah_event"]);
        Route::get('buatSlug', [EventController::class, "buat_slug"]);
        Route::get("data/hapus/event/{Event:id}", [EventController::class, "hapus_event"]);

        // akomodasi
        Route::get("data/akomodasi", [AkomodasiController::class, "admin_akomodasi"]);
        Route::get("data/tambah/akomodasi", [AkomodasiController::class, "tambah_akomodasi"]);
        Route::get("data/ubah/akomodasi/{Accomodation:slug}", [AkomodasiController::class, "ubah_akomodasi"]);
        Route::post("data/akomodasi/proses-tambah", [AkomodasiController::class, "proses_tambah_akomodasi"]);
        Route::post("data/akomodasi/proses-ubah", [AkomodasiController::class, "proses_ubah_akomodasi"]);
        Route::get("data/hapus/akomodasi/{Accomodation:slug}", [AkomodasiController::class, "hapus_akomodasi"]);

        // galeri akomodasi
        Route::get("data/galeri/akomodasi/{Accomodation:slug}/", [AkomodasiController::class, "galeri_akomodasi"]);
        Route::get("data/tambah/galeri/akomodasi/{Accomodation:slug}", [AkomodasiController::class, "tambah_galeri_akomodasi"]);
        Route::post("data/galeri/akomodasi/proses-tambah", [AkomodasiController::class, "proses_tambah_galeri_akomodasi"]);
        Route::get("data/ubah/galeri/akomodasi/{Accomodation:slug}/{AccomodationGallery}", [AkomodasiController::class, "ubah_galeri_akomodasi"]);
        Route::post("data/galeri/akomodasi/proses-ubah", [AkomodasiController::class, "proses_ubah_galeri_akomodasi"]);
        Route::get("data/hapus/galeri/akomodasi/{Accomodation:slug}/{AccomodationGallery}", [AkomodasiController::class, "hapus_galeri_akomodasi"]);

        // link akomodasi
        Route::get("data/link/akomodasi/{Accomodation:slug}/", [AkomodasiController::class, "link_akomodasi"]);
        Route::post("data/link/akomodasi/proses-tambah", [AkomodasiController::class, "proses_tambah_link_akomodasi"]);
        Route::post("data/link/akomodasi/proses-ubah", [AkomodasiController::class, "proses_ubah_link_akomodasi"]);
        Route::get("data/hapus/link/akomodasi/{Accomodation:slug}/{AccomodationLink}", [AkomodasiController::class, "hapus_link_akomodasi"]);

        // berita
        Route::get("data/berita", [BeritaController::class, "admin_berita"]);
        Route::get("data/tambah/berita", [BeritaController::class, "tambah_berita"]);
        Route::get("data/ubah/berita/{News:slug}", [BeritaController::class, "ubah_berita"]);
        Route::post("data/berita/proses-tambah", [BeritaController::class, "proses_tambah_berita"]);
        Route::post("data/berita/proses-ubah", [BeritaController::class, "proses_ubah_berita"]);
        Route::get("data/hapus/berita/{News:slug}", [BeritaController::class, "hapus_berita"]);

        // kategori Berita
        Route::get("data/berita/kategori", [BeritaController::class, "admin_berita_kategori"]);
        Route::post("data/berita/kategori/proses-tambah", [BeritaController::class, "proses_tambah_kategori_berita"]);
        Route::post("data/berita/kategori/proses-ubah", [BeritaController::class, "proses_ubah_kategori_berita"]);
        Route::get("data/berita/kategori/proses-hapus/{id}", [BeritaController::class, "proses_hapus_kategori_berita"]);

        // wisata
        Route::get("data/wisata", [TourController::class, "admin_wisata"]);
        Route::get("data/tambah/wisata", [TourController::class, "tambah_wisata"]);
        Route::post("data/wisata/proses-tambah", [TourController::class, "proses_tambah_wisata"]);
        Route::get("data/ubah/wisata/{slug}", [TourController::class, "ubah_wisata"]);
        Route::post("data/wisata/proses-ubah", [TourController::class, "proses_ubah_wisata"]);
        Route::get("data/wisata/proses-hapus/{slug}", [TourController::class, "proses_hapus_wisata"]);

        // paket-oleh-oleh
        Route::get("data/paket-oleh-oleh", [GiftController::class, "admin_paket_oleh_oleh"]);
        Route::get("data/tambah/paket-oleh-oleh", [GiftController::class, "tambah_paket_oleh_oleh"]);
        Route::post("data/paket-oleh-oleh/proses-tambah", [GiftController::class, "proses_tambah_paket_oleh_oleh"]);
        Route::get("data/ubah/paket-oleh-oleh/{slug}", [GiftController::class, "ubah_paket_oleh_oleh"]);
        Route::post("data/paket-oleh-oleh/proses-ubah", [GiftController::class, "proses_ubah_paket_oleh_oleh"]);
        Route::get("data/paket-oleh-oleh/proses-hapus/{slug}", [GiftController::class, "proses_hapus_paket_oleh_oleh"]);

        // iklan
        Route::get("data/iklan", [IklanController::class, "iklan"]);
        Route::get("data/iklan_atas", [IklanController::class, "iklanAtas"]);
        Route::get("data/iklan_bawah", [IklanController::class, "iklanBawah"]);
        Route::get("data/iklan_popup", [IklanController::class, "iklanPopup"]);
        Route::get("data/tambah/iklan", [IklanController::class, "tambah_iklan"]);
        Route::post("data/iklan/proses-tambah", [IklanController::class, "proses_tambah_iklan"]);
        Route::get("data/iklan/ubah/{slug}", [IklanController::class, "ubah_iklan"]);
        Route::post("data/iklan/proses-ubah", [IklanController::class, "proses_ubah_iklan"]);
        Route::get("data/iklan/hapus/{slug}", [IklanController::class, "proses_hapus_iklan"]);

        // kategori wisata
        Route::get("data/wisata/kategori", [TourController::class, "admin_wisata_kategori"]);
        Route::post("data/wisata/kategori/proses-tambah", [TourController::class, "proses_tambah_kategori_wisata"]);
        Route::post("data/wisata/kategori/proses-ubah", [TourController::class, "proses_ubah_kategori_wisata"]);
        Route::get("data/wisata/kategori/proses-hapus/{id}", [TourController::class, "proses_hapus_kategori_wisata"]);

        // kuliner
        Route::get("data/kuliner", [RestaurantController::class, "admin_kuliner"]);
        Route::get("data/tambah/kuliner", [RestaurantController::class, "tambah_kuliner"]);
        Route::post("data/kuliner/proses-tambah", [RestaurantController::class, "proses_tambah_kuliner"]);
        Route::get("data/ubah/kuliner/{slug}", [RestaurantController::class, "ubah_kuliner"]);
        Route::post("data/kuliner/proses-ubah", [RestaurantController::class, "proses_ubah_kuliner"]);
        Route::get("data/kuliner/proses-hapus/{slug}", [RestaurantController::class, "proses_hapus_kuliner"]);

        // oleholeh
        Route::get("data/oleholeh", [ShopController::class, "admin_oleholeh"]);
        Route::get("data/tambah/oleholeh", [ShopController::class, "tambah_oleholeh"]);
        Route::post("data/oleholeh/proses-tambah", [ShopController::class, "proses_tambah_oleholeh"]);
        Route::get("data/ubah/oleholeh/{slug}", [ShopController::class, "ubah_oleholeh"]);
        Route::post("data/oleholeh/proses-ubah", [ShopController::class, "proses_ubah_oleholeh"]);
        Route::get("data/oleholeh/proses-hapus/{slug}", [ShopController::class, "proses_hapus_oleholeh"]);

        // akun admin
        Route::get("akun/admin", [AccountController::class, "akun_admin"]);
        Route::get("tambah/akun/admin", [AccountController::class, "tambah_akun_admin"]);
        Route::post("akun/admin/proses-tambah", [AccountController::class, "proses_tambah_akun_admin"]);
        Route::get("kelola/akun/admin/{id}", [AccountController::class, "kelola_akun_admin"]);
        Route::post("akun/admin/proses-ubah", [AccountController::class, "proses_ubah_akun_admin"]);
        Route::post("akun/admin/proses-reset-password", [AccountController::class, "proses_reset_password_akun_admin"]);

        // akun mitra
        Route::get("akun/mitra", [AccountController::class, "akun_mitra"]);
        Route::get("tambah/akun/mitra", [AccountController::class, "tambah_akun_mitra"]);
        Route::post("akun/mitra/proses-tambah", [AccountController::class, "proses_tambah_akun_mitra"]);
        Route::get("akun/mitra/pilih-tipe", [AccountController::class, "pilih_tipe_akun_mitra"]);
        Route::get("kelola/akun/mitra/{id}", [AccountController::class, "kelola_akun_mitra"]);
        Route::post("akun/mitra/proses-ubah", [AccountController::class, "proses_ubah_akun_mitra"]);
        Route::post("akun/mitra/proses-reset-password", [AccountController::class, "proses_reset_password_akun_mitra"]);

        // profile
        Route::get("profil", [AccountController::class, "profil"]);
        Route::post("profil/proses-ubah", [AccountController::class, "proses_ubah_profil"]);
        Route::post("profil/proses-reset-password", [AccountController::class, "proses_reset_password_profil"]);

        // akun pengguna
        Route::get("akun/pengguna", [AccountController::class, "akun_pengguna"]);
        Route::get("kelola/akun/pengguna/{id}", [AccountController::class, "kelola_akun_pengguna"]);
        Route::post("akun/pengguna/proses-ubah", [AccountController::class, "proses_ubah_akun_pengguna"]);
        Route::post("akun/pengguna/proses-reset-password", [AccountController::class, "proses_reset_password_akun_pengguna"]);

        // akun affiliators
        Route::get("akun/affiliators", [AccountController::class, "akun_affiliators"]);
        Route::get("tambah/akun/affiliators", [AccountController::class, "tambah_akun_affiliators"]);
        Route::post("akun/affiliators/proses-tambah", [AccountController::class, "proses_tambah_akun_affiliators"]);
        Route::get("kelola/akun/affiliators/{id}", [AccountController::class, "kelola_akun_affiliators"]);
        Route::post("akun/affiliators/proses-ubah", [AccountController::class, "proses_ubah_akun_affiliators"]);
        Route::post("akun/affiliators/proses-reset-password", [AccountController::class, "proses_reset_password_akun_affiliators"]);

        // Pengelolaan Transaksi
        Route::get("transaksi/paket-oleholeh", [TransactionAdminController::class, "paket_oleholeh"]);
        Route::post("transaksi/paket-oleholeh/tandai", [TransactionAdminController::class, "tandai_paket_oleholeh"]);
        Route::get("transaksi/tourism-card", [TransactionAdminController::class, "tourism_card"]);
        Route::get("transaksi/tourism-card/{id}/discount-card", [TransactionAdminController::class, "discount_card"]);
        Route::post("transaksi/tourism-card/discount-card/generate", [TransactionAdminController::class, "generate_discount_card"]);
        Route::get("discount-card/{code}/download", [TransactionAdminController::class, "discount_card_generate_image"]);

        // Laporan
        Route::get("laporan/transaksi/tourism-card", [ReportAdminController::class, "transaksi_tourism_card"]);
        Route::get("laporan/transaksi/tourism-card/cetak", [ReportAdminController::class, "cetak_transaksi_tourism_card"]);
        Route::get("laporan/transaksi/paket-oleholeh", [ReportAdminController::class, "transaksi_paket_oleholeh"]);
        Route::get("laporan/transaksi/paket-oleholeh/cetak", [ReportAdminController::class, "cetak_transaksi_paket_oleholeh"]);
        Route::get("laporan/penggunaan-kartu", [ReportAdminController::class, "penggunaan_kartu"]);
        Route::get("laporan/penggunaan-kartu/cetak", [ReportAdminController::class, "penggunaan_kartu_cetak"]);
    });
});

Route::prefix("app-mitra")->group(function () {
    Route::get('/', [AuthPartnerController::class, 'masuk'])->middleware('GuestPartner');
    Route::post('proses-masuk', [AuthPartnerController::class, 'proses_masuk']);
    Route::get('keluar', [AuthPartnerController::class, 'keluar'])->middleware('partner');

    Route::group(["middleware" => "partner"], function () {
        Route::get("dashboard", [DashboardPartnerController::class, "dashboard"]);

        Route::get("penggunaan-kartu", [CardUsedPartnerController::class, "penggunaan_kartu"]);
        Route::post("gunakan-kartu", [CardUsedPartnerController::class, "gunakan_kartu"]);

        Route::get("laporan/penggunaan-kartu", [ReportPartnerController::class, "penggunaan_kartu"]);
        Route::get("laporan/penggunaan-kartu/cetak", [ReportPartnerController::class, "penggunaan_kartu_cetak"]);

        Route::get("data-profil", [ProfilePartnerController::class, "profil"]);

        // profile
        Route::get("profil", [AccountPartnerController::class, "profil"]);
        Route::post("profil/proses-ubah", [AccountPartnerController::class, "proses_ubah_profil"]);
        Route::post("profil/proses-reset-password", [AccountPartnerController::class, "proses_reset_password_profil"]);
    });
});

// affiliate
Route::prefix("app-affiliate")->group(function () {
    Route::get('/', [AuthAffiliateController::class, 'masuk'])->middleware('GuestAffiliators');
    Route::post('proses-masuk', [AuthAffiliateController::class, 'proses_masuk']);
    Route::get('keluar', [AuthAffiliateController::class, 'keluar'])->middleware('affiliators');

    Route::group(["middleware" => "affiliators"], function () {
        Route::get("dashboard", [DashboardAffiliateController::class, "dashboard"]);
        Route::get("data/affiliate", [AffiliateController::class, "myAffiliate"]);
        Route::get("data/affiliate/anggota", [AffiliateController::class, "anggotaAffiliate"]);
        Route::get("data/affiliate/anggota/{id}", [AffiliateController::class, "detailAnggota"]);

        Route::get("transaksi/beli-tourism-card", [TransactionAffiliate::class, "beli_tourism"]);
        Route::post('transaksi/beli-tourism-card', [TransactionAffiliate::class, 'konfirmasi'])->name("konfirmasi-process");
        Route::get('transaksi/beli-tourism-card/{transaction}', [TransactionAffiliate::class, 'konfirmasi_tourism'])->name("pembayaran");
        Route::post("transaksi/beli-tourism-card/generatecard", [TransactionAffiliate::class, "generate_discount_card_user"]);
        Route::get('transaksi/beli-tourism-card/success/{transaction}', [TransactionAffiliate::class, 'success'])->name("payment-success");

        Route::get("transaksi/daftar-dan-beli-tourism-card", [TransactionAffiliate::class, "daftar_beli_tourism"]);
        Route::post('transaksi/daftar-dan-beli-tourism-card', [TransactionAffiliate::class, 'konfirmasi_daftar'])->name("konfirmasi-daftar-process");
        Route::get('transaksi/beli-tourism-card/{transaction}', [TransactionAffiliate::class, 'konfirmasi_tourism'])->name("pembayaran-daftar");
        Route::post("transaksi/beli-tourism-card/generatecard", [TransactionAffiliate::class, "generate_discount_card_user"]);


        // Route::get('/checkout/{transaction}', [BuyTurismCardController::class, 'checkout'])->name("checkout");
        // Route::post("checkout/generatecard", [BuyTurismCardController::class, "generate_discount_card_user"]);
        // profile
        Route::get("profil", [AccountPartnerController::class, "profil"]);
        Route::post("profil/proses-ubah", [AccountPartnerController::class, "proses_ubah_profil"]);
        Route::post("profil/proses-reset-password", [AccountPartnerController::class, "proses_reset_password_profil"]);

        Route::get("laporan/transaksi/affiliate", [ReportAffiliateController::class, "transaksi_tourism_card"]);
        Route::get("laporan/transaksi/affiliate/cetak", [ReportAffiliateController::class, "cetak_transaksi_tourism_card"]);


    });
});
