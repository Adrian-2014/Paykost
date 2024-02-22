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

    // public function store(request $request) {
    //     return Redirect('user.index');
    // }

    public function cuciBasah() {
        $CuciItems = CuciItem::all();
        return view('user.kategori.pemesanan.cuci-basah', ['items' => $CuciItems]);
    }

}
