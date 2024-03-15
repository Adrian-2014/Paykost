<?php

namespace App\Http\Controllers;

use App\Models\Cuci;
use App\Models\cuciBasah;
use App\Models\CuciItem;
use App\Models\cuciKering;
use App\Models\cuciLipat;
use App\Models\CuciProduct;
use App\Models\cuciSetrika;
use App\Models\jasaSetrika;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Mpdf\Mpdf;

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
        session()->remove('detail');
        return view('user.kategori.cuci');
    }
    public function kehilangan() {
        return view('user.kategori.kehilangan');
    }

    public function cuciBajuDetail($detail, $cuci) {
        session()->put('detail', $detail);
        session()->put('cuci', $cuci);
        return redirect('/basah');
    }

    // For Layanan Laundry

    public function cuciBasah() {
        $detail = session()->get('detail');
        $cuci = session()->get('cuci');
        if ($detail == 'cuci-basah') {
            $cuciBasahItems = Cuci::where('cuci','basah')->get();
        } elseif ($detail == 'cuci-kering') {
            $cuciBasahItems = Cuci::where('cuci','kering')->get();
        }
        return view('user.kategori.pemesanan.cuci-basah', compact(['cuciBasahItems',['detail']]));
    }
    public function cuciKering() {
        $cuciKeringItems = cuciKering::all();
        return view('user.kategori.pemesanan.cuci-kering', compact('cuciKeringItems'));
    }
    public function cuciSetrika() {
        $cuciSetrikaItems = cuciSetrika::all();
        return view('user.kategori.pemesanan.cuci-setrika',compact('cuciSetrikaItems'));
    }
    public function cuciLipat() {
        $cuciLipatItems = cuciLipat::all();
        return view('user.kategori.pemesanan.cuci-lipat',compact('cuciLipatItems'));
    }
    public function jasaSetrika() {
        $jasaSetrikaItems = jasaSetrika::all();
        return view('user.kategori.pemesanan.jasa-setrika',compact('jasaSetrikaItems'));
    }

    public function konfirmasi() {
        return view('user.kategori.pemesanan.kofirmasi-pesan');
    }

}
