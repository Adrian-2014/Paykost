<?php

use App\Http\Controllers\adminControll;
use App\Http\Controllers\AuthenticatedController;
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

Route::post('/', [loginController::class, 'login']);

Route::post('/admin/create', [adminControll::class, 'create']);

Route::get('/logout', [loginController::class, 'logout']);

Route::get('/', [loginController::class, 'index']);
Route::get('/user/kamarku', [userPageController::class, 'kamarku']);
Route::get('/user/riwayat', [userPageController::class, 'riwayat']);
Route::get('/user/profil', [userPageController::class, 'profil']);
Route::get('/user/index', [loginController::class, 'user']);

Route::get('/pindah', [userPageController::class, 'pindah']);
Route::get('/laporanKerusakan', [userPageController::class, 'laporanKerusakan']);
Route::get('/kebersihan', [userPageController::class, 'kebersihan']);
Route::get('/cuci', [userPageController::class, 'cuciBaju']);
Route::get('/kehilangan', [userPageController::class, 'kehilangan']);


Route::get('/admin/index', [loginController::class, 'admin']);
Route::get('/admin/create', [adminControll::class, 'index']);

Route::get('/pengajuan', [loginController::class, 'pengajuan']);
// Route::post('/kerusakan', [ userPageController::class, 'store']); // kirim laporan kerusakan

Route::get('/pdf', [userPageController::class, 'pdf']);  // download pdf