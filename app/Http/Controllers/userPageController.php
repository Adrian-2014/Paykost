<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Cuci;
use App\Models\cuciBasah;
use App\Models\CuciItem;
use App\Models\cuciKering;
use App\Models\cuciLipat;
use App\Models\CuciProduct;
use App\Models\cuciSetrika;
use App\Models\jasaSetrika;
use App\Models\pemesanan;
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

    // For Layanan Laundry

    public function cuciBasah() {
        $cuciItems = Cuci::where('jenis_layanan','Cuci Basah')->where('status', 'Publish')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.cuci-basah', compact(['cuciItems','banks']));
    }
    public function cuciKering() {
        $cuciItems = Cuci::where('jenis_layanan','Cuci Kering')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.cuci-kering', compact('cuciItems','banks'));
    }
    public function cuciSetrika() {
        $cuciItems = Cuci::where('jenis_layanan', 'Cuci Setrika')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.cuci-setrika', compact('cuciItems','banks'));
    }
    public function cuciLipat() {
        $cuciItems = Cuci::where('jenis_layanan', 'Cuci Lipat')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.cuci-lipat', compact('cuciItems','banks'));
    }
    public function jasaSetrika() {
        $cuciItems= Cuci::where('jenis_layanan', 'Jasa Setrika')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.jasa-setrika', compact('cuciItems','banks'));
    }
    public function cuciExpress() {
        $cuciItems= Cuci::where('jenis_layanan', 'Cuci Express')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.cuci-express', compact('cuciItems','banks'));
    }
    public function dryCleaning() {
        $cuciItems= Cuci::where('jenis_layanan', 'Dry Cleaning')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.dry-cleaning', compact('cuciItems','banks'));
    }
    public function gorden() {
        return view('user.kategori.pemesanan.cuci-gorden');
    }
    public function karpet() {
        $banks = Bank::get();
        return view('user.kategori.pemesanan.cuci-karpet', compact('banks'));
    }
    public function bedCover() {
        return view('user.kategori.pemesanan.bed-cover');
    }
    public function selimut() {
        return view('user.kategori.pemesanan.cuci-selimut');
    }
    public function sprei() {
        return view('user.kategori.pemesanan.cuci-sprei');
    }

    public function konfirmasi(Request $request) {

        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'jumlah'=> 'required',
            'layanan'=> 'required',
            'total_biaya'=> 'required',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'bank_name'=>'required',
            'mulai'=>'required',
            'selesai'=>'required',
        ]);

        $bank = Bank::where('nama',$request->bank_name)->first();

        // $gambarBank = $request->file('gambar');
        // $namaFile = time().'.'.$gambarBank->getClientOriginalExtension();
        // $gambarBank->move(public_path('uploads'), $namaFile);

        $pesanan = new pemesanan();
        $pesanan->id_pembelian = $request->id;
        $pesanan->nama_user = $request->nama;
        $pesanan->jumlah = $request->jumlah;
        $pesanan->jenis_layanan = $request->layanan;
        $pesanan->total_biaya = $request->total_biaya;
        // $pesanan->img_payment = $request->gambar;
        $pesanan->bank_id = $bank->id;
        $pesanan->tgl_start = $request->mulai;
        $pesanan->tgl_done = $request->selesai;
        $pesanan->save();
        // return redirect()->route('admin.index')->with('success', 'Barang berhasil ditambahkan.');
        // return back()->with('success', 'Barang berhasil ditambahkan.');
        session()->put('pemesanan_id', $pesanan->id);
        // $pemesanan = pemesanan::find(session()->put('pemesanan_id', $pesanan->id));
        return redirect('/checkKonfirmasi');
    }

    public function checkKonfirmasi() {
        $pemesanan = pemesanan::find(session()->get('pemesanan_id'));
        $bank = Bank::find($pemesanan->bank_id);
        return view('user.kategori.pemesanan.kofirmasi-pesan',compact(['pemesanan','bank']));
    }
}
