<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Banner;
use App\Models\Cuci;
use App\Models\cuciBasah;
use App\Models\CuciItem;
use App\Models\cuciKering;
use App\Models\cuciLipat;
use App\Models\CuciProduct;
use App\Models\cuciSepatu;
use App\Models\cuciSetrika;
use App\Models\cucisize;
use App\Models\jasaSetrika;
use App\Models\pemesanan;
use App\Models\ProsesCuci;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Mpdf\Mpdf;
use Illuminate\Support\Str;

class userPageController extends Controller
{

    public function index() {
        $bannerKost = Banner::where('lokasi_banner', 'Home user')->where('status', 'Publish')->where('jenis_banner', 'Banner Utama')->get();
        $bannerPro = Banner::where('lokasi_banner', 'Home user')->where('status', 'Publish')->where('jenis_banner', 'Banner Promosi')->get();
        return view('user.index',compact('bannerKost', 'bannerPro'));
    }
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
        $bannerPro = Banner::where('lokasi_banner', 'Jasa Cuci User')->where('status', 'Publish')->where('jenis_banner', 'Banner Promosi')->get();
        return view('user.kategori.cuci', compact('bannerPro'));
    }
    public function kehilangan() {
        return view('user.kategori.kehilangan');
    }

    // For Layanan Laundry

    public function cuciBasah() {
        $cuciItems = Cuci::where('jenis_layanan','Cuci Basah')->where('status', 'Publish')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.cuci-basah', compact('cuciItems','banks'));
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
        $cuciItems= Cuci::where('jenis_layanan', 'Cuci Express')->where('status', 'Publish')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.cuci-express', compact('cuciItems','banks'));
    }
    public function dryCleaning() {
        $cuciItems= Cuci::where('jenis_layanan', 'Dry Cleaning')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.dry-cleaning', compact('cuciItems','banks'));
    }
    public function karpet() {
        $cuciItems = cucisize::where('jenis_layanan', 'Cuci Karpet')->where('status', 'Publish')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.cuci-karpet', compact('cuciItems','banks'));
    }
    public function bedCover() {
        $cuciItems = cucisize::where('jenis_layanan', 'Cuci Bed Cover')->where('status', 'Publish')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.bed-cover', compact('cuciItems','banks'));
    }
    public function selimut() {
        $cuciItems = cucisize::where('jenis_layanan', 'Cuci Selimut')->where('status', 'Publish')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.cuci-selimut',compact( 'cuciItems','banks'));
    }
    public function sepatu() {
        $cuciItems = cuciSepatu::where('status', 'Publish')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.cuci-sepatu', compact( 'cuciItems','banks'));
    }
    public function sprei() {
        $cuciItems = cucisize::where('jenis_layanan', 'Cuci Sprei')->where('status', 'Publish')->get();
        $banks = Bank::get();
        return view('user.kategori.pemesanan.cuci-sprei', compact( 'cuciItems','banks'));
    }

    public function konfirmasi(Request $request) {

        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'no_kamar' => 'required',
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
        $pesanan->no_kamar = $request->no_kamar;
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
        $bannerPro = Banner::where('lokasi_banner', 'Pembayaran Jasa Cuci')->where('status', 'Publish')->where('jenis_banner', 'Banner Promosi')->get();
        $pemesanan = pemesanan::find(session()->get('pemesanan_id'));
        $bank = Bank::find($pemesanan->bank_id);
        return view('user.kategori.pemesanan.kofirmasi-pesan',compact('pemesanan','bank', 'bannerPro'));
    }

    public function prosesCuci(Request $request) {
        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'no_kamar' => 'required',
            'jumlah'=> 'required',
            'status'=> 'required',
            'layanan'=> 'required',
            'total_biaya'=> 'required',
            'tgl_start'=>'required',
            'tgl_done'=>'required',
        ]);

        $pemesanan = pemesanan::find(session()->get('pemesanan_id'));
        $date_start = date('m/d/Y', strtotime($pemesanan->tgl_start));
        // dd($date_start);
        $tgl_start = Str::replace(', ','',Str::replace($date_start,'',$pemesanan->tgl_start));

        $date = $date_start . ' '.$tgl_start;

        $date_now = date('Y-m-d H:i:s');
        $date_start = date('Y-d-m', strtotime($date));

        $proses = new ProsesCuci();
        $proses->id_pembelian = $request->id;
        $proses->nama_user = $request->nama;
        $proses->jumlah = $request->jumlah;
        $proses->status = $date_now <= $date_start. ' '.$tgl_start ? 'Dalam Antrean' : 'Dalam Proses';
        $proses->no_kamar = $request->no_kamar;
        $proses->jenis_layanan = $request->layanan;
        $proses->total_biaya = $request->total_biaya;
        $proses->tgl_start = $request->tgl_start;
        $proses->tgl_done = $request->tgl_done;
        $proses->bank_id = $pemesanan->bank_id;
        $proses->save();

        return redirect()->back()->with('success', 'Barang cucian Kamu akan Segera di Proses');
    }

    public function proses() {
        $username = auth()->user()->name; // Ganti 'username' dengan nama kolom yang sesuai dalam model pengguna Anda
        $pemesanans = ProsesCuci::where('nama_user', $username)->whereIn('status', ['Dalam Proses', 'Dalam Antrean'])->orderBy('id', 'desc')->get();
        foreach ($pemesanans as $pemesanan) {
            $date_start = date('m/d/Y', strtotime($pemesanan->tgl_start));
            // dd($date_start);
            $tgl_start = Str::replace(', ','',Str::replace($date_start,'',$pemesanan->tgl_start));

            $date = $date_start . ' '.$tgl_start;
            // dd($date);
            $date_now = date('Y-m-d H:i:s');
            $date_start = date('Y-d-m', strtotime($date));
            $pemesanan->status = $date_now <= $date_start. ' '.$tgl_start ? 'Dalam Antrean' : 'Dalam Proses';
            $pemesanan->save();
        }
        return view('user.kategori.pemesanan.proses' ,compact('pemesanans'));
    }
    public function riwayatCuci() {
        $username = auth()->user()->name;
        $pemesanan = pemesanan::find(session()->get('pemesanan_id'));
        $bank = Bank::find($pemesanan->bank_id);
        $done = ProsesCuci::where('nama_user', $username)->where('status', ['Selesai'])->orderBy('id', 'desc')->get();
        return view('user.kategori.pemesanan.riwayat' ,compact('done', 'bank'));
    }

    public function updateStatus(Request $request)
    {

        $request->validate([
           'id' => 'required',
           'status'=>'required',
        ]);

        $dataId =$request->input('id');
        $data = ProsesCuci::find($dataId);
        $data->status = $request->status;
        $data->save();
        return redirect()->back();
    }

}
