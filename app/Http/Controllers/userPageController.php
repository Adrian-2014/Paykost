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
use App\Models\gambarKerusakan;
use App\Models\gantiAkun;
use App\Models\filterRiwayat;
use App\Models\fotoKamarku;
use App\Models\jasaSetrika;
use App\Models\kamarKost;
use App\Models\laporanKehilangan;
use App\Models\laporanKerusakan;
use App\Models\pembayaranKost;
use App\Models\pemesanan;
use App\Models\pindahKamar;
use App\Models\ProsesCuci;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
// require_once __DIR__ . '/vendor/autoload.php';
use Mpdf\Mpdf;


class userPageController extends Controller
{

    // M A I N  M E N U

    // Pembayaran Kost
    public function pembayaran() {
        $no_kamar = auth()->user()->no_kamar;
        $kamarKost = kamarKost::where('nomor_kamar', $no_kamar)->with('gambarKamar')->get();
        $pembayaran = pembayaranKost::where('name', auth()->user()->name)->where('status', 'Diterima')->latest()->first();
        $banks = Bank::get();

        // DATE REAL TIME
        $tanggal_masuk = auth()->user()->tanggal_masuk;
        $tanggalMasuk = Carbon::parse($tanggal_masuk);
        $forPay = Carbon::parse($tanggal_masuk);
        $sementara = $forPay->addDays(30);
        //durasi
        $hariIni = Carbon::now();
        // $hariIni = Carbon::parse('2024-05-17');
        $selisihTanggal = $tanggalMasuk->diffInDays($hariIni);
        $bulan = floor($selisihTanggal / 30);
        $hari = $selisihTanggal % 30;
        $hasil = "{$bulan} Bulan {$hari} Hari";

        if($pembayaran) {
            $payHave = $pembayaran->tagihan_selanjutnya;
            $setCarbon = Carbon::parse($payHave);
            $few = Carbon::parse($payHave);
            $next = $few->addDays(30);

            return view('user.pembayaran', compact('kamarKost', 'banks', 'pembayaran', 'tanggalMasuk', 'sementara', 'hasil', 'setCarbon', 'next'));
        }else    {
            return view('user.pembayaran', compact('kamarKost', 'banks', 'pembayaran', 'tanggalMasuk', 'sementara', 'hasil'));
        }

    }

    public function bayarKost(Request $request) {
        // dd($request->all());
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
        $bayar->user_id = auth()->user()->id;
        $bayar->no_kamar = $request->no_kamar;
        $bayar->bulan_tagihan = $request->bulan_tagihan;
        $bayar->total_tagihan = $request->total_tagihan;
        $bayar->tagihan_selanjutnya = $request->tagihan_selanjutnya;
        $bayar->tanggal_masuk = $request->tanggal_masuk;
        $bayar->durasi_ngekost	 = $request->durasi_ngekost;
        $bayar->bukti =  $namaFile;
        $bayar->bank_id = $bank->id;
        $bayar->status = 'Proses Validasi';
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

        $kamar = kamarKost::where('nomor_kamar', auth()->user()->no_kamar)->with('gambarKamar')->get();
        $bannerPro = Banner::where('lokasi_banner', 'Home user')->where('status', 'Publish')->get();
        $kamarKosong = kamarKost::where('status', 'Publish')->where('kondisi', 'Kosong')->get();
        $banerKamars = gambarKamar::inRandomOrder()->take(4)->get();
        $pembayaran = pembayaranKost::where('user_id', auth()->user()->id)->whereIn('status', ['Diterima', 'Ditolak'])->latest()->first();
        // $allPay = pembayaranKost::where('user_id', auth()->user()->id)->latest()->first();

        // DATE REAL TIME
        $tglMasukSementara = auth()->user()->tanggal_masuk;
        $tanggalMasuk = Carbon::parse($tglMasukSementara);

        $hariIni = Carbon::now();
        // $hariIni = Carbon::parse('2024-05-17');
        //durasi

        $pindahKamar = pindahKamar::where('user_id', auth()->user()->id)->where('status', 'Diterima')->latest()->first();
        if($pindahKamar) {
            $waktu_pindah = $pindahKamar->waktu_pindah;
            $waktu = Carbon::parse($waktu_pindah);
            if($hariIni >= $waktu) {
                return redirect()->route('updatePindah')->withMethod('post');
            }
        }

        $selisihTanggal = $tanggalMasuk->diffInDays($hariIni);
        $bulan = floor($selisihTanggal / 30);
        $hari = $selisihTanggal % 30;
        // dd($hariIni);
        $durasi = "{$bulan} Bulan {$hari} Hari";

        // DATE REAL TIME
        $pindah_kamar = pindahKamar::where('user_id', auth()->user()->id)->latest()->first();

        if($pembayaran) {
            $bulan_tagihan = $pembayaran->bulan_tagihan;
            $tagihan_selanjutnya = $pembayaran->tagihan_selanjutnya;
            $tags = Carbon::parse($tagihan_selanjutnya);
            $bank_id = $pembayaran->bank_id;
            $bank = Bank::where('id', $bank_id)->latest()->first();

            $x = $pembayaran->bulan_tagihan;
            $y = Carbon::parse($x);
            $riwayatBulan = $y;

            $waktu_bayar = $pembayaran->created_at;
            $waktuBayar = Carbon::parse($waktu_bayar);
            // $tags = Carbon::parse('2024-05-17');
            // dd($tags);
            // dd($tagihan_selanjutnya);


            // $bulanTagihan = Carbon::parse($bulan_tagihan);
            // $tagihanSelanjutnya = Carbon::parse($bulan_tagihan);
            // dd($payHave);
            if ($tags > $hariIni) {
                $tagihan_bulans = Carbon::parse($bulan_tagihan);
                $tagihanBulan = $tagihan_bulans;
                $pembayaranSelanjutnya = Carbon::parse($tagihan_selanjutnya);
            }else {
                if(auth()->user()->status_bayar === 'Sudah Lunas') {
                    return redirect()->route('updateStatUser')->withMethod('post');
                }
                $tagihan_bulans = Carbon::parse($tagihan_selanjutnya);
                $tagihanBulan = $tagihan_bulans;
                $pembayaranSelanjutnya = Carbon::parse($tagihan_selanjutnya)->addDays(30);

            }
            return view('user.index', compact('kamar', 'bannerPro',  'banerKamars', 'kamarKosong', 'pindah_kamar' , 'pembayaran', 'tanggalMasuk', 'durasi', 'kamar', 'tagihanBulan', 'waktuBayar', 'bank', 'riwayatBulan', 'pembayaranSelanjutnya','hariIni', 'tags'));
        }else {
            // $tagihan_bulan = $tanggalMasuk;
            $tagihanBulan = Carbon::parse($tglMasukSementara);
            $pembayaranSelanjutnya = Carbon::parse($tglMasukSementara)->addDays(30);
            return view('user.index', compact('kamar', 'bannerPro',  'banerKamars', 'kamarKosong', 'pindah_kamar' , 'pembayaran', 'tanggalMasuk', 'durasi', 'kamar', 'tagihanBulan',  'pembayaranSelanjutnya','hariIni'));
        }



        //untuk pindah kamar

        // dd($tagihanBulan);
    }

    // updatePindah
    public function updateStatUser() {
        $user = auth()->user();
        $user->status_bayar = 'Belum Bayar';
        $user->save();

        return redirect()->route('userku');
    }
    public function updatePindah() {
        $pindahKamar = pindahKamar::where('user_id', auth()->user()->id)->where('status', 'Diterima')->latest()->first();
        $user = auth()->user();
        $kamarNow = kamarKost::where('user_id',  auth()->user()->id)->first();

        $user->no_kamar = $pindahKamar->kamar_baru;
        $user->save();
        if ($kamarNow) {
            $kamarNow->user_id = null;
            $kamarNow->kondisi = 'Kosong';
            $kamarNow->save();
        }

        $new_kamar = KamarKost::where('nomor_kamar', $pindahKamar->kamar_baru)->first();
        $new_kamar->user_id = $user->id;
        $new_kamar->kondisi = 'Dihuni';
        $new_kamar->save();

        $pindahKamar->status = 'Dipindahkan';
        $pindahKamar->save();

        $filter = new filterRiwayat();
        $filter->pindah_kamar_id = $pindahKamar->id;
        $filter->user_id = $pindahKamar->user_id;
        $filter->save();

        return redirect()->route('userku');
    }
    // rekomendasi
    public function rekomendasi($id) {
        $pindah = pindahKamar::where('user_id', auth()->user()->id)->where('status', 'Dalam Proses')->latest()->first();
        $data = kamarKost::find($id);
        $fasKamar = fasilitas::where('tipe', 'Fasilitas Kamar')->get();
        $fasUmum = fasilitas::where('tipe', 'Fasilitas Umum ')->get();
        return view('user.rekomendasi', compact('data', 'fasKamar', 'fasUmum', 'pindah'));
    }

    public function pindahKe(Request $request) {
        $user = auth()->user()->id;
        $kamar = kamarKost::where('user_id', $user)->first();
        $pindahKamar = kamarKost::where('kondisi','kosong')->get();
        // $no_kamar = $request->input('no_kamar');
        $kamarNew = kamarKost::where('nomor_kamar', $request->no_kamar)->first();

        return view('user.kategori.pindah', compact('kamarNew', 'kamar', 'pindahKamar'));
    }
    // pdf
    public function pdf($id) {
        $data = pembayaranKost::find($id);
        return view('user.pdf', compact('data'));
    }

    // kategori
    public function pindah() {

        $hariIni = Carbon::now();
        $tanggalMasuk = auth()->user()->tanggal_masuk;
        $selisihTanggal = $tanggalMasuk->diffInDays($hariIni);
        $bulan = floor($selisihTanggal / 30);
        $hari = $selisihTanggal % 30;
        // dd($hariIni);
        $durasi = "{$bulan} bulan {$hari} hari";

        $user = auth()->user()->id;
        $kamar = kamarKost::where('user_id', $user)->first();
        $pindahKamar = kamarKost::where('kondisi','kosong')->get();
        return view('user.kategori.pindah', compact('kamar','pindahKamar', 'tanggalMasuk', 'durasi'));
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
        $fotoku = fotoKamarku::where('user_id', auth()->user()->id)->where('no_kamar', auth()->user()->no_kamar)->orderBy('id', 'desc')->get();
        return view('user.kamarku', compact('kamar_kost', 'fasKamar', 'fasUmum', 'fotoku'));
    }

    public function uploadKamar(Request $request) {
        // dd($request->all());

        $file = $request->file('gambar');
        $namaFile = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $namaFile);

        $kamarku = new fotoKamarku();
        $kamarku->nama_user = auth()->user()->name;
        $kamarku->user_id = auth()->user()->id;
        $kamarku->no_kamar = auth()->user()->no_kamar;
        $kamarku->gambar = $namaFile;
        $kamarku->save();

        return redirect()->back()->with('success', 'Gambar berhasil di unggah');
    }
    public function editPic(Request $request) {
        // dd($request->all());

        $file = $request->file('gambar');
        $namaFile = time().'.'.$file->getClientOriginalExtension();
        $file->move(public_path('uploads'), $namaFile);

        $kamarku = fotoKamarku::where('id', $request->id)->first();
        $kamarku->gambar = $namaFile;
        $kamarku->save();

        return redirect()->back()->with('success', 'Gambar berhasil di Ubah');
    }

    public function deletePic(Request $request) {
        // dd($request->all());

        $kamarku = fotoKamarku::where('id', $request->id)->first();
            if(file_exists(public_path('uploads/'.$kamarku->gambar))) {
                unlink(public_path('uploads/'.$kamarku->gambar));
            }

        $kamarku->delete();

        return redirect()->back()->with('success', 'Gambar berhasil di Hapus');
    }

    public function riwayatAll() {
        $all = filterRiwayat::orderBy('id', 'desc')->where('user_id', auth()->user()->id)->get();

        return view('user.all-riwayat', compact('all'));
    }

    public function riwayatPembayaran() {
        $pembayaran = pembayaranKost::orderBy('updated_at', 'desc')->where('user_id', auth()->user()->id)->whereIn('status', ['Diterima', 'Ditolak'])->get();
        return view('user.riwayat-pembayaran', compact('pembayaran'));
    }
    public function riwayatPindah() {
        $pindah = pindahKamar::orderBy('updated_at', 'desc')->where('user_id', auth()->user()->id)->whereIn('status', ['Dipindahkan', 'Ditolak'])->get();
        return view('user.riwayat-pindah', compact('pindah'));
    }
    public function riwayatKehilangan() {
        $kehilangan = laporanKehilangan::orderBy('updated_at', 'desc')->where('user_id', auth()->user()->id)->where('status', 'Direspon')->get();
        return view('user.riwayat-kehilangan', compact('kehilangan'));
    }
    public function riwayatKerusakan() {
        $kerusakan = laporanKerusakan::orderBy('updated_at', 'desc')->where('user_id', auth()->user()->id)->where('status', 'Direspon')->get();
        return view('user.riwayat-kerusakan', compact('kerusakan'));
    }

    // PROFIL
    public function profil() {
        $tanggal_masuk = auth()->user()->tanggal_masuk;
        $tanggalMasuk = Carbon::parse($tanggal_masuk);

        //durasi
        $hariIni = Carbon::now();
        $selisihTanggal = $tanggalMasuk->diffInDays($hariIni);
        $bulan = floor($selisihTanggal / 30);
        $hari = $selisihTanggal % 30;
        $hasil = "{$bulan} Bulan {$hari} Hari";
        return view('user.profil', compact('tanggalMasuk', 'hasil'));
    }
    public function updateProfil(Request $request)  {

        //  dd($request);
         $request->validate([
            'username' => 'required',
            'photo' => 'nullable',
            // 'no_telpon' => 'nullable',
        ]);

        $user_id = auth()->id();
        $user = User::find($user_id);

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $namaFile = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path('uploads'), $namaFile);
            $user->profil = $namaFile;
        }

        $user->name = $request->username;
        // $user->no_telpon = $request->no_telpon;
        $user->save();

        return back()->with('success', 'Profil berhasil diperbarui.');
    }
    public function updateNoTelpon(Request $request)  {

        //  dd($request);
         $request->validate([
            'no_telpon' => 'required',
        ]);

        $user_id = auth()->id();
        $user = User::find($user_id);
        $user->no_telpon = $request->no_telpon;
        $user->save();

        return back()->with('success', 'Nomor Telepon berhasil diperbarui.');
    }
    public function updatePekerjaan(Request $request)  {

        //  dd($request);
         $request->validate([
            'pekerjaan' => 'required',
        ]);

        $user_id = auth()->id();
        $user = User::find($user_id);
        $user->pekerjaan = $request->pekerjaan;
        $user->save();

        return back()->with('success', 'Status berhasil diperbarui.');
    }
    public function kelaminUpdate(Request $request)  {

        //  dd($request);
         $request->validate([
            'jenis_kelamin' => 'required',
        ]);

        $user_id = auth()->id();
        $user = User::find($user_id);
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->save();

        return back()->with('success', 'Jenis Kelamin berhasil diperbarui.');
    }
    public function updateAkun(Request $request) {
        // dd($request);
        $request->validate([
            'old_email' => 'required',
            'password_old' => 'required',
            'new_email',
            'new_password'
        ]);

        $permintaan = new gantiAkun();
        $permintaan->nama = auth()->user()->name;
        $permintaan->user_id = auth()->user()->id;
        $permintaan->email_old = $request->old_email;
        $permintaan->password_old = $request->password_old;
        $permintaan->email_new = $request->new_email;
        $permintaan->password_new = $request->new_password;
        $permintaan->status = 'Dalam Proses';
        $permintaan->save();

        return back()->with('success', 'Permintaan Berhasil Dikirim.');
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
        $pesanan->user_id = auth()->user()->id;
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
        return redirect()->route('checkKonfirmasi');
    }
    public function checkKonfirmasi() {
        $bannerPro = Banner::where('lokasi_banner', 'Pembayaran Jasa Cuci')->where('status', 'Publish')->get();
        $sipatu = cuciSepatu::get();
        $pemesanan = pemesanan::find(session()->get('pemesanan_id'));
        $bank = Bank::find($pemesanan->bank_id);
        return view('user.kategori.pemesanan.kofirmasi-pesan',compact('pemesanan','bank', 'bannerPro', 'sipatu'));
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
        $proses->user_id = auth()->user()->id;
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
        $pemesanans = ProsesCuci::where('user_id', auth()->user()->id)->whereIn('status', ['Proses Cuci', 'Proses Pengambilan'])->orderBy('id', 'desc')->get();
        foreach ($pemesanans as $pemesanan) {
            $tgl_start = $pemesanan->tgl_start;

            $parts = explode(', ', $tgl_start);
            $tanggal = $parts[0];
            $jam = $parts[1];
            $tanggal_converted = implode('-', array_reverse(explode('/', $tanggal)));
            $datetime = $tanggal_converted . ' ' . $jam;
            $timestamp_pemesanan = strtotime($datetime);
            $timestamp_sekarang = time();
            $pemesanan->status = ($timestamp_sekarang < $timestamp_pemesanan) ? 'Proses Pengambilan' : 'Proses Cuci';
            $pemesanan->save();
        }
        return view('user.kategori.pemesanan.proses' ,compact('pemesanans'));
    }
    public function riwayatCuci() {

        $pemesanan = pemesanan::find(session()->get('pemesanan_id'));
        $bank = $pemesanan ? Bank::find($pemesanan->bank_id) : null;

        $done = ProsesCuci::where('user_id', auth()->user()->id)->where('status', 'Selesai')->orderBy('id', 'desc')->get();

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
    public function pindahKamar(Request $request) {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'no_kamar' => 'required',
            'harga_kamar' => 'required',
            'user_id' => 'required',

            'harga_kamar_baru' => 'required',
            'ukuran_kamar_baru' => 'required',
            'kamar_baru' => 'required',
            'jam_pindah' => 'required',
            'tanggal_pindah'=>'required',
            'alasan'
         ]);

        $waktu_pindah = $request->tanggal_pindah . ' ' . $request->jam_pindah;

        $data = new pindahKamar();
        $data->nama = $request->name;
        $data->kamar_lama = $request->no_kamar;
        $data->tanggal_masuk = $request->tanggal_masuk;
        $data->durasi_ngekost = $request->durasi;
        $data->harga_lama = $request->harga_kamar;
        $data->user_id = $request->user_id;
        $data->kamar_baru = $request->kamar_baru;
        $data->harga_baru = $request->harga_kamar_baru;
        $data->ukuran_baru = $request->ukuran_kamar_baru;
        $data->waktu_pindah = $waktu_pindah;
        $data->alasan = $request->alasan;
        $data->status = 'Dalam Proses';
        $data->save();

        //  $user_id = auth()->user()->id;
        //  $old_kamar = KamarKost::where('user_id', $user_id)->first();
        //  if ($old_kamar) {
        //      $old_kamar->user_id = null;
        //      $old_kamar->kondisi = 'Kosong';
        //      $old_kamar->save();
        //  }

        //  $new_kamar = KamarKost::findOrFail($request->kamar_baru);
        //  $new_kamar->user_id = $user_id;
        //  $new_kamar->kondisi = 'Dihuni';
        //  $new_kamar->save();

        return redirect()->route('userku')->with('success', 'Permintaan Anda Berhasil Di Kirim');
    }
    public function laporKehilangan(Request $request) {

        // dd($request);
        $request->validate([
            'nama' => 'required',
            'user_id' => 'required',
            'no_kamar' => 'required',
            'barang' => 'required',
            'tanggal' => 'required',
            'jam' => 'required',
            'keterangan'
         ]);

        $waktu = $request->tanggal . ' ' . $request->jam;

        $lapor = new laporanKehilangan();
        $lapor->nama = $request->nama;
        $lapor->user_id = $request->user_id;
        $lapor->no_kamar = $request->no_kamar;
        $lapor->barang_hilang = $request->barang;
        $lapor->waktu_kehilangan = $waktu;
        $lapor->keterangan = $request->keterangan;
        $lapor->status = 'Dalam Proses';
        $lapor->save();

        return redirect()->route('userku')->with('success', 'Permintaan Anda Berhasil Di Kirim');
    }
    public function laporKerusakan(Request $request) {

        // dd($request->input);
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'no_kamar' => 'required',
            'bagian_rusak' => 'required',
            'tanggal' => 'required',
        ]);

        $laporan = new laporanKerusakan();
        $laporan->nama = $request->nama;
        $laporan->user_id = auth()->user()->id;
        $laporan->no_kamar = $request->no_kamar;
        $laporan->bagian_rusak = $request->bagian_rusak;
        $laporan->tanggal_rusak = $request->tanggal;
        $laporan->keterangan = $request->keterangan;
        $laporan->status = 'Dalam Proses';
        $laporan->save();


        $gambarLaporan = new gambarKerusakan();

        if ($request->hasFile('input1')) {
            $gambarBarang = $request->file('input1');
            $namaFile1 = time().'.'.$gambarBarang->getClientOriginalName();
            $gambarBarang->move(public_path('uploads'), $namaFile1);

            $gambarLaporan->gambar1 = $namaFile1;
        }
        if ($request->hasFile('input2')) {
            $gambarBarang = $request->file('input2');
            $namaFile2 = time().'.'.$gambarBarang->getClientOriginalName();
            $gambarBarang->move(public_path('uploads'), $namaFile2);

            $gambarLaporan->gambar2 = $namaFile2;
        }
        if ($request->hasFile('input3')) {
            $gambarBarang = $request->file('input3');
            $namaFile3 = time().'.'.$gambarBarang->getClientOriginalName();
            $gambarBarang->move(public_path('uploads'), $namaFile3);

            $gambarLaporan->gambar3 = $namaFile3;
        }
        if ($request->hasFile('input4')) {
            $gambarBarang = $request->file('input4');
            $namaFile4 = time().'.'.$gambarBarang->getClientOriginalName();
            $gambarBarang->move(public_path('uploads'), $namaFile4);

            $gambarLaporan->gambar4 = $namaFile4;
        }
        if ($request->hasFile('input5')) {
            $gambarBarang = $request->file('input5');
            $namaFile5 = time().'.'.$gambarBarang->getClientOriginalName();
            $gambarBarang->move(public_path('uploads'), $namaFile5);

            $gambarLaporan->gambar5 = $namaFile5;
        }

        $gambarLaporan->laporan_id = $laporan->id;
        $gambarLaporan->save();

        return redirect()->route('userku')->with('success', 'Laporan berhasil dikirim');
    }
}
