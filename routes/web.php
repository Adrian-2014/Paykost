<?php

use App\Http\Controllers\adminControll;
use App\Http\Controllers\AuthenticatedController;
use App\Http\Controllers\dropzoneController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\userPageController;
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

// LOGIN

Route::post('/masuk', [loginController::class, 'login']);
Route::get('/logout', [loginController::class, 'logout']);
Route::get('/', [loginController::class, 'index'])->name('login');

// LOGIN


// U S E R  S T A R T
// Route::get('/transaction/getModal/{id}', [userPageController::class , 'getModal']);

Route::group(['middleware' => ['auth', 'cek:2']], function () {
    // Core
    Route::get('/pembayaran', [userPageController::class, 'pembayaran']);
    Route::post('bayar', [userPageController::class, 'bayarKost'])->name('bayarKost');
    // Core

    // Menu
    Route::get('/user/index', [userPageController::class, 'index'])->name('userku');
    Route::match(['get', 'post'], '/updateStatUser', [userPageController::class, 'updateStatUser'])->name('updateStatUser');
    Route::get('/user/kamarku', [userPageController::class, 'kamarku']);
    Route::get('/user/profil', [userPageController::class, 'profil']);

    Route::get('/user/riwayat', [userPageController::class, 'riwayatAll']);
    Route::get('/user/riwayat/pembayaran', [userPageController::class, 'riwayatPembayaran']);
    Route::get('/user/riwayat/pindah', [userPageController::class, 'riwayatPindah']);
    Route::get('/user/riwayat/kehilangan', [userPageController::class, 'riwayatKehilangan']);
    Route::get('/user/riwayat/kerusakan', [userPageController::class, 'riwayatKerusakan']);
    // Menu

    // kategori
    Route::get('/pindah', [userPageController::class, 'pindah']);
    Route::get('/laporanKerusakan', [userPageController::class, 'laporanKerusakan']);
    Route::get('/kebersihan', [userPageController::class, 'kebersihan']);
    Route::get('/kehilangan', [userPageController::class, 'kehilangan']);
    Route::get('/cuci', [userPageController::class, 'cuciBaju'])->name('layanancuci');
    // kategori

    // Profil
    Route::post('updateProfil', [userPageController::class, 'updateProfil'])->name('profil.update');
    Route::post('kelaminUpdate', [userPageController::class, 'kelaminUpdate'])->name('kelamin.update');
    Route::post('updateNoTelpon', [userPageController::class, 'updateNoTelpon'])->name('noTelp.update');
    Route::post('updatePekerjaan', [userPageController::class, 'updatePekerjaan'])->name('pekerjaan.update');
    Route::post('update/account', [userPageController::class, 'updateAkun'])->name('akun.update');
    // Profil

    // jasa cuci baju
    Route::get('/basah', [userPageController::class, 'cuciBasah']);
    Route::get('/kering', [userPageController::class, 'cuciKering']);
    Route::get('/lipat', [userPageController::class, 'cuciLipat']);
    Route::get('/cuciSetrika', [userPageController::class, 'cuciSetrika']);
    Route::get('/jasaSetrika', [userPageController::class, 'jasaSetrika']);
    Route::get('/cuciExpress', [userPageController::class, 'cuciExpress']);
    Route::get('/dryCleaning', [userPageController::class, 'dryCleaning']);
    Route::get('/sepatu', [userPageController::class, 'sepatu']);

    Route::get('/gorden', [userPageController::class, 'gorden']);
    Route::get('/karpet', [userPageController::class, 'karpet']);
    Route::get('/bedCover', [userPageController::class, 'bedCover']);
    Route::get('/sprei', [userPageController::class, 'sprei']);
    Route::get('/selimut', [userPageController::class, 'selimut']);

    Route::post('/konfirmasiPay', [userPageController::class, 'konfirmasi'])->name('storeJasa');
    Route::get('/checkKonfirmasi', [userPageController::class, 'checkKonfirmasi'])->name('checkKonfirmasi');
    Route::post('/prosesCuci', [userPageController::class, 'prosesCuci'])->name('proses');
    Route::get('/proses', [userPageController::class, 'proses']);
    Route::get('/check/proses', [userPageController::class, 'checkPro'])->name('chek.proses');
    Route::get('/riwayatCuci', [userPageController::class, 'riwayatCuci']);
    Route::post('updateStatus', [userPageController::class, 'updateStatus'])->name('updateStatus');
    // jasa cuci baju

    // Kamarku
    Route::post('/upload/kamar', [userPageController::class, 'uploadKamar'])->name('kamarUpload');
    Route::post('/edit/kamar', [userPageController::class, 'editPic'])->name('edit.pic');
    Route::post('/delete/kamar', [userPageController::class, 'deletePic'])->name('delete.pic');
    // Kamarku

    // Rekomendasi
    Route::get('/rekomendasi/{id}', [userPageController::class, 'rekomendasi']);
    Route::post('pindah/ke', [userPageController::class, 'pindahKe'])->name('kePindah');
    // Rekomendasi

    // Pindah Kamar
    Route::post('/pindahKamar', [userPageController::class, 'pindahKamar'])->name('ajukan.pindah');
    // Route::post('/updatePindah', [userPageController::class, 'updatePindah'])->name('updatePindah');
    Route::match(['get', 'post'], '/updatePindah', [userPageController::class, 'updatePindah'])->name('updatePindah');
    // Pindah Kamar

    Route::post('/lapor/hilang', [userPageController::class, 'laporKehilangan'])->name('laporKehilangan');
    Route::post('/lapor/rusak', [userPageController::class, 'laporKerusakan'])->name('laporan.kerusakan');
});
// U S E R  E N D


// A D M I N  S T A R T

Route::group(['middleware' => ['auth', 'cek:1']], function() {

    // INDEX
    Route::get('/admin/index', [adminControll::class, 'index'])->name('admin.index');
    // INDEX

    // PEMBAYARAN KOST
    Route::get('/admin/requestPembayaran', [adminControll::class, 'pembayaranPage'])->name('pembayaranPage');
    Route::post('/terima', [adminControll::class, 'paySetuju'])->name('SETUJU');
    Route::post('/tolak/pay', [adminControll::class, 'payTolak'])->name('tolak.pay');
    // PEMBAYARAN KOST

    // USER
    Route::get('/admin/user', [adminControll::class, 'user'])->name('admin.user');
    Route::post('/admin/add/user', [adminControll::class, 'storeUser'])->name('storeUser');
    Route::post('/admin/updateUser', [adminControll::class, 'updateUser'])->name('update.user');
    Route::get('/toggleUser/{id}', [adminControll::class, 'toggleUser'])->name('togles.user');
    // USER

    // FASILITAS
    Route::get('/admin/fasilitas', [adminControll::class, 'fasilitas'])->name('fasilitas');
    Route::post('tambahkeun/fasilitas', [adminControll::class, 'storeFasilitas'])->name('storeFasilitas');
    Route::post('editfasilitas', [adminControll::class, 'editFasilitas'])->name('editFasilitas');
    Route::delete('fasilitas/destroy/{id}', [adminControll::class, 'hapusFasilitas'])->name('fasilitas.destroy');
    // FASILITAS

    // KAMAR KOST
    Route::get('/admin/kost', [adminControll::class, 'kamarKost']);
    Route::post('storeKamar', [adminControll::class, 'storeKamar'])->name('storeKamar');
    Route::post('editKamar', [adminControll::class, 'editKamar'])->name('editKamar');
    Route::get('/toggleKamar/{id}', [adminControll::class, 'toggleKamar'])->name('toggleKamar');
    Route::delete('/hapusKamar/{id}', [adminControll::class, 'hapusKamar'])->name('kamar.destroy');
    // KAMAR KOST

    // BANNER
    Route::get('/admin/banner', [adminControll::class, 'banner']);
    Route::post('storeBanner', [adminControll::class, 'storeBanner'])->name('storeBanner');
    Route::delete('/bannerDelete/{id}', [adminControll::class, 'bannerHapus'])->name('banner.destroy');
    Route::get('toggleBanner/{id}', [adminControll::class, 'toggleBanner'])->name('toggleBanner');
    Route::post('/editBanner', [adminControll::class, 'editBanner'])->name('editBanner');
    // BANNER

    // JASA CUCI
    //  umum
    Route::get('/admin/jasaCuciUmum', [adminControll::class, 'jasaCuciUmum'])->name('pageCuci');
    Route::post('cuciUmum', [adminControll::class, 'storeCuciUmum'])->name('storeCuciUmum');
    Route::post('cuciUmumEdit', [adminControll::class, 'cuciUmumEdit'])->name('cuciUmumEdit');
    Route::get('toggleStatus/{id}', [adminControll::class, 'toggleStatus'])->name('toggleStatus');
    Route::delete('/item/{id}', [adminControll::class, 'hapus'])->name('item.destroy');
    // Khusus
    Route::get('/admin/jasaCuciKhusus', [adminControll::class, 'jasaCuciKhusus'])->name('pageKhusus');
    Route::post('cuciKhusus', [adminControll::class, 'storeCuciKhusus'])->name('storeCuciKhusus');
    Route::post('cuciKhususEdit', [adminControll::class, 'cuciKhususEdit'])->name('cuciKhususEdit');
    Route::get('toggleKhusus/{id}', [adminControll::class, 'toggleKhusus'])->name('toggleKhusus');
    Route::delete('/khusus/{id}', [adminControll::class, 'khususHapus'])->name('khusus.destroy');
    // sepatu
    Route::get('/admin/jasaCuciSepatu', [adminControll::class, 'jasaCuciSepatu'])->name('pageSepatu');
    Route::post('cuciSepatu', [adminControll::class, 'storeCuciSepatu'])->name('storeCuciSepatu');
    Route::post('cuciSepatuEdit', [adminControll::class, 'cuciSepatuEdit'])->name('cuciSepatuEdit');
    Route::get('toggleSepatu/{id}', [adminControll::class, 'toggleSepatu'])->name('toggleSepatu');
    Route::delete('/sepatu/{id}', [adminControll::class, 'sepatuHapus'])->name('sepatu.destroy');

    // Proses
    Route::get('/admin/prosesCuci', [adminControll::class, 'prosesPencucian']);
    Route::post('edits', [adminControll::class, 'editTanggal'])->name('editTanggal');
    Route::post('updateStat', [adminControll::class, 'updateStat'])->name('updateStat');

    // JASA CUCI

    // Pindah Kamar
    Route::get('/admin/pindah', [adminControll::class, 'pagePindah']);
    Route::post('/tolak/pindah', [adminControll::class, 'tolakPindah'])->name('tolakPindah');
    Route::post('/setujui/pindah', [adminControll::class, 'setujuiPindah'])->name('setujuiPindah');
    // Pindah Kamar

    // Akun
    Route::post('/tolak/account', [adminControll::class, 'tolakAccount'])->name('tolak.account');
    Route::post('/setuju/account', [adminControll::class, 'setujuAccount'])->name('setuju.account');
    // Akun

    // Laporan Kehilangan
    Route::get('/admin/kehilangan', [adminControll::class, 'laporanKehilangan'])->name('admin.kehilangan');
    Route::post('/admin/respon/kehilangan', [adminControll::class, 'responKehilangan'])->name('respon.kehilangan');
    // Laporan Kehilangan

    // Laporan Kerusakan
    Route::get('/admin/kerusakan', [adminControll::class, 'laporanKerusakan']);
    Route::post('/admin/respon/kerusakan', [adminControll::class, 'responKerusakan'])->name('respon.kerusakan');
    // Laporan Kerusakan

    Route::match(['get', 'post'], '/updatesPindah', [adminControll::class, 'updatesPindah'])->name('updatesPindah');
});

// A D M I N  E N D


// EXTRA
Route::get('/pengajuan', [loginController::class, 'pengajuan']);
Route::get('/pdf/{id}', [userPageController::class, 'pdf']);
Route::get('proposal', function() {
    return view('proposal-rafi');
});