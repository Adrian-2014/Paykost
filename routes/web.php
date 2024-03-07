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
Route::get('/', [loginController::class, 'index']);

// LOGIN



// USER

// Menu
Route::get('/user/kamarku', [userPageController::class, 'kamarku']);
Route::get('/user/riwayat', [userPageController::class, 'riwayat']);
Route::get('/user/profil', [userPageController::class, 'profil']);
Route::get('/user/index', [loginController::class, 'user']);
// Menu

// kategori
Route::get('/pindah', [userPageController::class, 'pindah']);
Route::get('/laporanKerusakan', [userPageController::class, 'laporanKerusakan']);
Route::get('/kebersihan', [userPageController::class, 'kebersihan']);
Route::get('/kehilangan', [userPageController::class, 'kehilangan']);
Route::get('/cuci', [userPageController::class, 'cuciBaju']);
// kategori

// jasa cuci baju
Route::get('/basah', [userPageController::class, 'cuciBasah']);
Route::get('/kering', [userPageController::class, 'cuciKering']);
Route::get('/cuciSetrika', [userPageController::class, 'cuciSetrika']);

Route::get('/konfirmasiPay', [userPageController::class, 'konfirmasi']);
// jasa cuci baju

// USER


// A D M I N

Route::get('/admin/index', [adminControll::class, 'index'])->name('admin.index');

// createUser
Route::get('/admin/create', [adminControll::class, 'create']);
// Route::post('storeCreate', [adminControll::class, 'createStore']);
// createUser
// create cuci item
Route::get('/admin/cuciProduct', [adminControll::class, 'cuciProduct']);
Route::post('cuciProduct', [adminControll::class, 'storeCuciItem'])->name('cuciProduct.storeCuciItem');
Route::get('/admin/addCuciKering', [adminControll::class, 'addCuciKering']);
Route::post('cuciKering', [adminControll::class, 'storeCuciKering'])->name('storeCuciKering');
// create cuci item


// A D M I N


// Route::post('/kerusakan', [ userPageController::class, 'store']); // kirim laporan kerusakan

// EXTRA
Route::get('/pengajuan', [loginController::class, 'pengajuan']);
Route::get('/pdf', [userPageController::class, 'pdf']);