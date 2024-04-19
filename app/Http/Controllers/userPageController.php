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
use App\Models\fasilitas;
use App\Models\gambarKamar;
use App\Models\jasaSetrika;
use App\Models\kamarKost;
use App\Models\pembayaranKost;
use App\Models\pemesanan;
use App\Models\ProsesCuci;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mpdf\Mpdf;

class userPageController extends Controller
{

    // M A I N  M E N U

    // Pembayaran Kost
    public function pembayaran() {
        $no_kamar = auth()->user()->no_kamar;
        $kamarKost = kamarKost::where('nomor_kamar', $no_kamar)->with('gambarKamar')->get();
        $pembayaran = pembayaranKost::where('name', auth()->user()->name)->where('status', 'Diterima')->get();
        $banks = Bank::get();
        return view('user.pembayaran', compact('kamarKost', 'banks', 'pembayaran'));
    }

    public function bayarKost(Request $request) {
        // dd($request);
        $request->validate([
            'id_pembayaran' => 'required',
            'nama_user' => 'required',
            'no_kamar' => 'required',
            'bulan_tagihan' => 'required',
            'tanggal_masuk' => 'required',
            'durasi_ngekost'=> 'required',
            'total_tagihan'=> 'required',
            'bukti'=> 'required|image|mimes:jpeg,png,jpg,gif',
            'bank_name'=> 'required',
            'tagihan_selanjutnya'=>'required',
        ]);

        $fotoBukti = $request->file('bukti');
        $namaFile = time().'.'.$fotoBukti->getClientOriginalExtension();
        $fotoBukti->move(public_path('uploads'), $namaFile);

        $bank = Bank::where('nama',$request->bank_name)->first();

        // dd($bank);
        $bayar = new pembayaranKost();
        $bayar->id_pembayaran = $request->id_pembayaran;
        $bayar->name = $request->nama_user;
        $bayar->no_kamar = $request->no_kamar;
        $bayar->bulan_tagihan = $request->bulan_tagihan;
        $bayar->total_tagihan = $request->total_tagihan;
        $bayar->tagihan_selanjutnya = $request->tagihan_selanjutnya;
        $bayar->tanggal_masuk = $request->tanggal_masuk;
        $bayar->durasi_ngekost	 = $request->durasi_ngekost;
        $bayar->bukti =  $namaFile;
        $bayar->bank_id = $bank->id;
        $bayar->status = 'Proses';
        $bayar->save();

        // dd($bayar->all());
        // $user = User::where('name', $request->nama_user);
        $user = User::where('name', $request->nama_user)->first();

        if ($user) {
            $user->status_bayar = 'Proses Validasi';
            $user->save();
        }

        return redirect()->route('userku')->with('success', 'Permintaan Kamu akan Segera di Proses');
    }
    // Pembayaran Kost

    // HOME
    public function index() {
        $no_kamar = auth()->user()->no_kamar;
        $hamas = kamarKost::where('nomor_kamar', $no_kamar)->with('gambarKamar')->get();
        $pembayaran = pembayaranKost::where('name', auth()->user()->name)->where('status', 'Diterima')->get();
        $bannerPro = Banner::where('lokasi_banner', 'Home user')->where('status', 'Publish')->get();
        $kamarKost = kamarKost::where('status', 'Publish')->where('kondisi', 'Kosong')->get();
        $gambarsKamars = gambarKamar::inRandomOrder()->take(4)->get();
        return view('user.index',compact('bannerPro', 'kamarKost', 'gambarsKamars', 'pembayaran', 'hamas'));
    }
    // rekomendasi
    public function rekomendasi($id) {
        $data = kamarKost::find($id);
        $fasKamar = fasilitas::where('tipe', 'Fasilitas Kamar')->get();
        $fasUmum = fasilitas::where('tipe', 'Fasilitas Umum ')->get();
        return view('user.rekomendasi', compact('data', 'fasKamar', 'fasUmum'));
    }
    // pdf
    public function pdf() {
        return view('user.pdf');
    }

    // kategori
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
        $bannerPro = Banner::where('lokasi_banner', 'Jasa Cuci User')->where('status', 'Publish')->get();
        return view('user.kategori.cuci', compact('bannerPro'));
    }
    public function kehilangan() {
        return view('user.kategori.kehilangan');
    }

    // HOME


    public function kamarku() {

        $no_kamar = auth()->user()->no_kamar;
        $kamar_kost = kamarKost::where('nomor_kamar', $no_kamar)->with('gambarKamar')->get();
        $fasKamar = fasilitas::where('tipe', 'Fasilitas Kamar')->get();
        $fasUmum = fasilitas::where('tipe', 'Fasilitas Umum ')->get();
        return view('user.kamarku', compact('kamar_kost', 'fasKamar', 'fasUmum'));
    }
    public function riwayat() {
        return view('user.riwayat');
    }

    // PROFIL
    public function profil() {
        return view('user.profil');
    }
    public function updateProfil(Request $request)  {

        //  dd($request);
        $request->validate([
            'username' => 'required',
            'photo' => 'nullable',
            'no_telpon' => 'nullable',
        ]);

        $user_id = auth()->id();

        if($request->photo) {
            $photo = $request->file('photo');
            $namaFile = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('uploads'), $namaFile);
        } else {
            $namaFile = User::find($user_id)->photo;
        }

        $user = User::find($user_id);
        $user->name = $request->username;
        $user->no_telpon = $request->no_telpon;
        $user->profil = $namaFile;
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
    // PROFIL

    // M A I N  M E N U

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
        $bannerPro = Banner::where('lokasi_banner', 'Pembayaran Jasa Cuci')->where('status', 'Publish')->get();
        $pemesanan = pemesanan::find(session()->get('pemesanan_id'));
        $bank = Bank::find($pemesanan->bank_id);
        return view('user.kategori.pemesanan.kofirmasi-pesan',compact('pemesanan','bank', 'bannerPro'));
    }

    public function prosesCuci(Request $request) {
        // dd($request->all());

        $request->validate([
            'id' => 'required',
            'bukti_bayar' => 'required|image|mimes:jpeg,png,jpg,gif',
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
        // $date_start = date('m/d/Y', strtotime($pemesanan->tgl_start));
        // // dd($date_start);
        // $tgl_start = Str::replace(', ','',Str::replace($date_start,'',$pemesanan->tgl_start));

        // $date = $date_start . ' '.$tgl_start;

        //$date_now <= $date_start. ' '.$tgl_start ? 'Proses Pengambilan' : 'Proses Cuci'

        // $date_now = date('Y-m-d H:i:s');
        // $date_start = date('Y-d-m', strtotime($date));

        $gambarBarang = $request->file('bukti_bayar');
        $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
        $gambarBarang->move(public_path('uploads'), $namaFile);

        $proses = new ProsesCuci();
        $proses->id_pembelian = $request->id;
        $proses->nama_user = $request->nama;
        $proses->jumlah = $request->jumlah;
        $proses->status = $request->status;
        $proses->no_kamar = $request->no_kamar;
        $proses->jenis_layanan = $request->layanan;
        $proses->total_biaya = $request->total_biaya;
        $proses->tgl_start = $request->tgl_start;
        $proses->tgl_done = $request->tgl_done;
        $proses->bukti =  $namaFile;
        $proses->bank_id = $pemesanan->bank_id;
        $proses->save();

        return redirect()->route('layanancuci')->with('success', 'Barang cucian Kamu akan Segera di Proses');
    }

    public function proses() {
        $username = auth()->user()->name; // Ganti 'username' dengan nama kolom yang sesuai dalam model pengguna Anda
        $pemesanans = ProsesCuci::where('nama_user', $username)->whereIn('status', ['Proses Cuci', 'Proses Pengambilan'])->orderBy('id', 'desc')->get();
        foreach ($pemesanans as $pemesanan) {
            // Ambil tanggal dan jam pemesanan
            $tgl_start = $pemesanan->tgl_start;

            // Pisahkan tanggal dan jam
            $parts = explode(', ', $tgl_start);
            $tanggal = $parts[0];
            $jam = $parts[1];

            // Konversi format tanggal ke format yang dapat dikenali oleh strtotime()
            $tanggal_converted = implode('-', array_reverse(explode('/', $tanggal)));

            // Gabungkan tanggal dan jam
            $datetime = $tanggal_converted . ' ' . $jam;

            // Ubah menjadi timestamp
            $timestamp_pemesanan = strtotime($datetime);

            // Ambil timestamp waktu saat ini
            $timestamp_sekarang = time();

            // Perbarui status pemesanan berdasarkan tanggal dan jam
            $pemesanan->status = ($timestamp_sekarang < $timestamp_pemesanan) ? 'Proses Pengambilan' : 'Proses Cuci';

            // Simpan perubahan status ke database
            $pemesanan->save();
        }
        return view('user.kategori.pemesanan.proses' ,compact('pemesanans'));
    }
    public function riwayatCuci() {
        $username = auth()->user()->name;

        $pemesanan = pemesanan::find(session()->get('pemesanan_id'));
        $bank = $pemesanan ? Bank::find($pemesanan->bank_id) : null;

        $done = ProsesCuci::where('nama_user', $username)->where('status', 'Selesai')->orderBy('id', 'desc')->get();

        return view('user.kategori.pemesanan.riwayat', compact('done', 'bank'));
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
