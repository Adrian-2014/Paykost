<?php

namespace App\Http\Controllers;

use App\Models\CuciItem;
use Mpdf\Mpdf;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class userPageController extends Controller
{
    public function kamarku() {
        return view('user.kamarku');
    }
    public function riwayat() {
        return view('user.riwayat');
    }
    public function profil() {
        return view('user.profil');
    }
    public function pdf() {
        return view('user.pdf');
    }
    public function pindah() {
        return view('user.kategori.pindah');
    }
    public function laporanKerusakan() {
        return view('user.kategori.kerusakan');
    }
    public function kebersihan() {
        return view('user.kategori.kebersihan');
    }
    public function cuciBaju() {
        return view('user.kategori.cuci');
    }
    public function kehilangan() {
        return view('user.kategori.kehilangan');
    }

    // For Layanan Laundry

    public function cuciBasah() {
        return view('user.kategori.pemesanan.cuci-basah');
    }
    public function cuciKering() {
        return view('user.kategori.pemesanan.cuci-kering');
    }

    public function konfirmasi() {
        return view('user.kategori.pemesanan.kofirmasi-pesan');
    }

}
