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

Route::post('/', [loginController::class, 'login']);
Route::get('/logout', [loginController::class, 'logout']);
Route::get('/', [loginController::class, 'index'])->name('login');

// LOGIN



// USER

// Profil
Route::post('updateProfil', [userPageController::class, 'updateProfil'])->name('profil.update');
// Profil

// Menu
Route::get('/user/kamarku', [userPageController::class, 'kamarku']);
Route::get('/user/riwayat', [userPageController::class, 'riwayat']);
Route::get('/user/profil', [userPageController::class, 'profil']);
Route::get('/user/index', [userPageController::class, 'index'])->name('userku');

// Menu

// kategori
Route::get('/pindah', [userPageController::class, 'pindah']);
Route::get('/laporanKerusakan', [userPageController::class, 'laporanKerusakan']);
Route::get('/kebersihan', [userPageController::class, 'kebersihan']);
Route::get('/kehilangan', [userPageController::class, 'kehilangan']);
Route::get('/cuci', [userPageController::class, 'cuciBaju'])->name('layanancuci');
// kategori

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

// USER


// A D M I N

Route::get('/admin/index', [adminControll::class, 'index'])->name('admin.index');

// Kamar Kost
Route::get('/admin/kost', [adminControll::class, 'kamarKost']);
Route::post('storeKamar', [adminControll::class, 'storeKamar'])->name('storeKamar');
Route::post('editKamar', [adminControll::class, 'editKamar'])->name('editKamar');
Route::get('/toggleKamar/{id}', [adminControll::class, 'toggleKamar'])->name('toggleKamar');
Route::delete('/hapusKamar/{id}', [adminControll::class, 'hapusKamar'])->name('kamar.destroy');
// Kamar Kost

// User
Route::get('/admin/user', [adminControll::class, 'user'])->name('admin.user');
Route::post('/admin/add/user', [adminControll::class, 'storeUser'])->name('storeUser');
// User

// Banner
Route::get('/admin/banner', [adminControll::class, 'banner']);
Route::post('storeBanner', [adminControll::class, 'storeBanner'])->name('storeBanner');
Route::delete('/bannerDelete/{id}', [adminControll::class, 'bannerHapus'])->name('banner.destroy');
Route::get('toggleBanner/{id}', [adminControll::class, 'toggleBanner'])->name('toggleBanner');
Route::post('/editBanner', [adminControll::class, 'editBanner'])->name('editBanner');
// Banner

// Jasa Cuci

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


Route::get('/admin/prosesCuci', [adminControll::class, 'prosesPencucian']);
Route::post('edits', [adminControll::class, 'editTanggal'])->name('editTanggal');

// Jasa Cuci


// A D M I N


// Route::post('/kerusakan', [ userPageController::class, 'store']); // kirim laporan kerusakan

// EXTRA
Route::get('/pengajuan', [loginController::class, 'pengajuan']);
Route::get('/pdf', [userPageController::class, 'pdf']);
Route::get('proposal', function() {
    return view('proposal-rafi');
});