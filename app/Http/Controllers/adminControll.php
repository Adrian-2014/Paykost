<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Cuci;
use App\Models\cuciBasah;
use App\Models\cuciKering;

use App\Models\cuciLipat;
use App\Models\cuciSepatu;
use App\Models\cuciSetrika;
use App\Models\cucisize;
use App\Models\fasilitas;
use App\Models\filterRiwayat;
use App\Models\gambarKamar;
use App\Models\gantiAkun;
use App\Models\jasaSetrika;
use App\Models\kamarKost;
use App\Models\KamarKostFasilitas;
use App\Models\laporanKehilangan;
use App\Models\laporanKerusakan;
use App\Models\pembayaranKost;
use App\Models\pindahKamar;
use App\Models\ProsesCuci;
use App\Models\User;
use Carbon\Carbon;
use Database\Seeders\CuciKeringSeeder;
use FontLib\Table\Type\cmap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Termwind\Components\Raw;

class adminControll extends Controller
{
    public function index()
    {
        $jumlahUser = User::where('role_id', 2)->count();
        $jumlahTransaksi = pembayaranKost::count();
        $jumlahKamar = kamarKost::count();
        return view('admin.index', compact('jumlahUser', 'jumlahTransaksi', 'jumlahKamar'));
    }

    // Setuju
    public function pembayaranPage()
    {
        $pembayaran = pembayaranKost::orderBy('id', 'desc')->where('status', 'Proses Validasi')->get();
        $riwayat = pembayaranKost::orderBy('id', 'desc')->whereIn('status', ['Diterima', 'Ditolak'])->get();
        // $dataBulanFormat = [];
        // $dataPay = [];
        // $tanggalBayar =[];

        return view('admin.pembayaran', compact('pembayaran','riwayat'));
    }
    public function payTolak(Request $request) {
        // dd($request);
        $request->validate([
            'id'=>'required',
            'alasan' => 'required',
        ]);

        $pay = pembayaranKost::where('id', $request->id)->first();
        $pay->pesan = $request->alasan;
        $pay->status = 'Ditolak';
        $pay->save();

        $user = User::where('id', $pay->user_id)->first();
        $user->status_bayar = 'Ditolak';
        $user->save();
        $filter = new filterRiwayat();
        $filter->pembayaran_kost_id = $pay->id;
        $filter->user_id = $pay->user_id;
        $filter->save();
        return back()->with('success', 'Data Berhasil Dikirim.');

    }

    public function paySetuju(Request $request) {
        $request->validate([
            'id'=>'required',
        ]);
        $pay = pembayaranKost::find($request->id);
        $pay->status = 'Diterima';
        $pay->save();

        $user = User::where('name', $pay->name)->first();
        $tagihan_selanjutnya = $pay->tagihan_selanjutnya;

        if (strtotime($tagihan_selanjutnya) > time()) {
            $user->status_bayar = 'Sudah Lunas';
            // $user->save();
            // return back()->with('success', 'Data Berhasil Dikirim.');
        }else {
            $user->status_bayar = 'Belum Bayar';
        }
        $user->save();

        $filter = new filterRiwayat();
        $filter->pembayaran_kost_id = $pay->id;
        $filter->user_id = $pay->user_id;
        // dd($filter->pembayaran_kost_id);
        $filter->save();
        return back()->with('success', 'Data Berhasil Dikirim.');


    }
    // Setuju

    // For User
    public function user() {
        $user = User::where('role_id', '>', 1)->orderBy('id', 'desc')->get();
        $kamars = kamarKost::where('kondisi', 'Kosong')->where('status', 'Publish')->get();
        $request =  gantiAkun::orderBy('id', 'desc')->where('status', 'Dalam Proses')->get();
        $riwayat = gantiAkun::orderBy('id', 'desc')->whereIn('status', ['Ditolak', 'Diterima'])->get();

        foreach($user as $item) {
            $mk = $item->tanggal_masuk;
            $tanggalMasuk = Carbon::parse($mk);

            $hariIni = Carbon::now();
            $selisihTanggal = $tanggalMasuk->diffInDays($hariIni);
            $bulan = floor($selisihTanggal / 30);
            $hari = $selisihTanggal % 30;
            $hasil = "{$bulan} bulan {$hari} hari";

            $item->tanggalMasukFormatted = $tanggalMasuk->translatedFormat('j F Y');
            $item->durasiNgekostFormatted = $hasil;
            // return view('admin.user', compact('user', 'kamars', 'tanggalMasuk', 'hasil'));
        }

        $now = Carbon::now();
        $pindahkamar = pindahKamar::where('status', 'Diterima')->get();
        foreach($pindahkamar as $item) {

            $waktupindah = Carbon::parse($item->waktu_pindah);
            if($now >= $waktupindah) {
                return redirect()->route('updatesPindah');
            }
        }

        return view('admin.user', compact('user', 'kamars', 'request', 'riwayat'));
    }
    public function storeUser(Request $request) {

        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required|min:4',
            'tanggal_masuk' => 'required',
            'no_kamar' => 'required',
            'no_telpon' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'status' => 'required',
            'role_id' => 'required',
        ]);

        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->tanggal_masuk = $request->tanggal_masuk;
        $user->no_kamar = $request->no_kamar;
        $user->no_telpon = $request->no_telpon;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->pekerjaan = $request->pekerjaan;
        $user->status = $request->status;
        $user->role_id = $request->role_id;
        $user->status_bayar = 'Belum Bayar';
        $user->save();
        $kamar = KamarKost::where('nomor_kamar', $request->no_kamar)->first();
        $kamar->user_id = $user->id;
        $kamar->kondisi = 'Dihuni';
        $kamar->save();

        return back()->with('success', 'User berhasil ditambahkan.');
    }
    public function updateUser(Request $request) {

        $request->validate([
            'id' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'tanggal_masuk' => 'required',
            'no_kamar' => 'required',
            'no_telpon' => 'required',
            'jenis_kelamin' => 'required',
            'pekerjaan' => 'required',
            'status' => 'required',
            'role_id' => 'required',
        ]);

        $user = User::where('id',$request->id)->first();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->tanggal_masuk = $request->tanggal_masuk;
        $user->no_kamar = $request->no_kamar;
        $user->no_telpon = $request->no_telpon;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->pekerjaan = $request->pekerjaan;
        $user->status = $request->status;
        $user->role_id = $request->role_id;
        // $user->status_bayar = 'Belum Bayar';
        $user->save();


        $old_kamar = KamarKost::where('user_id', $user->id)->first();
        if ($old_kamar) {
            $old_kamar->user_id = null;
            $old_kamar->kondisi = 'Kosong';
            $old_kamar->save();
        }


        $new_kamar = KamarKost::where('nomor_kamar', $request->no_kamar)->first();
        $new_kamar->user_id = $user->id;
        $new_kamar->kondisi = 'Dihuni';
        $new_kamar->save();

        return redirect()->route('admin.user')->with('success', 'Data pengguna berhasil diperbarui.');
    }

    public function updatesPindah() {
        $now = Carbon::now();
        $pindahkamar = pindahKamar::where('status', 'Diterima')->get();
        foreach($pindahkamar as $item) {
            $waktupindah = Carbon::parse($item->waktu_pindah);
            if($now >= $waktupindah) {
                $user = User::where('id', $item->user_id)->first();
                $user->no_kamar = $item->kamar_baru;
                $user->save();

                $item->status = 'Dipindahkan';
                $item->save();

                $kamar = kamarKost::where('nomor_kamar', $item->kamar_baru)->first();
                $kamar->user_id = $user->id;
                $kamar->kondisi = 'Dihuni';
                $kamar->save();

                return redirect()->route('admin.index');
            }
        }
    }

    public function toggleUser($id) {
        $users = User::find($id);
        $users->status = $users->status == 'Aktif' ? 'Nonaktif' : 'Aktif';
        $users->save();
        return back()->with('success', 'Status Berhasil Dirubah');
    }

    // For Fasilitas Kamar
    public function fasilitas() {
        $fasilitas = fasilitas::orderBy('id', 'desc')->get();
        return view('admin.fasilitas-kost', compact('fasilitas'));
    }
    public function storeFasilitas(Request $request) {

        $request->validate([
            'nama_fasilitas' => 'required',
            'deskripsi_fasilitas' => 'required',
            'jenis_fasilitas' => 'required',
            'gambar_fasilitas' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        $gambarBarang = $request->file('gambar_fasilitas');
        $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
        $gambarBarang->move(public_path('uploads'), $namaFile);


        // Simpan data user ke tabel users
        $fasilitas = new fasilitas();
        $fasilitas->nama = $request->nama_fasilitas;
        $fasilitas->gambar = $namaFile;
        $fasilitas->tipe = $request->jenis_fasilitas;
        $fasilitas->deskripsi = $request->deskripsi_fasilitas;
        $fasilitas->save();

        return back()->with('success', 'Fasilitas berhasil ditambahkan.');
    }
    public function hapusFasilitas($id) {
       $fas = fasilitas::findOrFail($id);
       $relasi = KamarKostFasilitas::where('fasilitas_id', $fas);
       $fas->delete();
       $relasi->delete();
        return back()->with('success', 'Fasiitas Berhasil Dihapus.');
    }
    public function editFasilitas(Request $request) {
        // dd($request->all());

        $request->validate([
            'gambar_fasilitas' => 'nullable',
            'nama_fasilitas' => 'required',
            'jenis_fasilitas'=> 'required',
            'deskripsi_fasilitas'=> 'required',
        ]);

        if($request->hasFile('gambar_fasilitas')) {
            $gambar = $request->file('gambar_fasilitas');
            $namaFile = time().'.'.$gambar->getClientOriginalExtension();
            $gambar->move(public_path('uploads'), $namaFile);
        } else {
            $namaFile = fasilitas::find($request->id)->gambar;
        }



        $fasilitas = fasilitas::find($request->id);
        $fasilitas->nama = $request->nama_fasilitas;
        $fasilitas->tipe = $request->jenis_fasilitas;
        $fasilitas->deskripsi = $request->deskripsi_fasilitas;
        $fasilitas->gambar = $namaFile;
        $fasilitas->save();

        if($fasilitas->save()) {
            return back()->with('success', 'Data berhasil Di Ubah.');
        } else {
            return back()->with('fail', 'Mohon lengkapi Data sebelum Mengirim');
        }
    }
    // For Fasilitas Kamar

    // For Kamar Kost
    public function kamarKost() {
        $kost = kamarKost::orderBy('id', 'desc')->get();
        $fas_kamar = fasilitas::where('tipe', 'Fasilitas Kamar')->get();
        $fas_umum = fasilitas::where('tipe', 'Fasilitas Umum')->get();
        return view('admin.kamar-kost', [
            'kosts'=>$kost,
            'fas_kamar'=>$fas_kamar,
            'fas_umum' => $fas_umum,

        ]);

    }
    public function storeKamar(Request $request) {

        $request->validate([
            'nomor_kamar' => 'required',
            'ukuran_kamar' => 'required',
            'kondisi' => 'required',
            'gambar.*' => 'required|image|mimes:jpeg,png,jpg,gif',
            'harga_kamar'=>'required',
        ]);

        if (kamarKost::where('nomor_kamar', $request->nomor_kamar)->exists()) {
            return back()->with('fail', 'Kamar Kost No. ' .$request->nomor_kamar. '  sudah ada');
        }

        $kamar_kost = kamarKost::create([
            'nomor_kamar'=>$request->nomor_kamar,
            'ukuran_kamar'=>$request->ukuran_kamar,
            'harga_kamar'=>$request->harga_kamar,
            'status' =>'Publish',
            'kondisi'=>'Kosong'
        ]);

        if ($request->hasFile('gambar_kamar')) {
            foreach($request->file('gambar_kamar') as $image) {
                $namaFile = time().'.'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $namaFile);

                // Simpan nama file ke dalam tabel gambar_kamars
                $gambar = new gambarKamar();
                $gambar->gambar = $namaFile;
                $gambar->kamar_kost_id = $kamar_kost->id;
                $gambar->save();
            }
        }

        // Simpan fasilitas
        foreach($request->fasilitas as $fasilitas) {
            KamarKostFasilitas::create([
                'fasilitas_id'=>$fasilitas,
                'kamar_kost_id'=>$kamar_kost->id
            ]);
        }

        return back()->with('success', 'Kamar Kost berhasil ditambahkan.');

    }
    public function hapusKamar($id) {
        // Cari item berdasarkan ID
        $kamar = kamarKost::findOrFail($id);
        $kamar->gambarKamar()->delete();

        // Hapus semua entri terkait dari tabel fasilitas_kamars
        $kamar->kamarKostFasilitas()->delete();
        // Hapus item kamar itu sendiri
        $kamar->delete();
        return back()->with('success', 'Barang Telah Dihapus.');
    }
    public function editKamar(Request $request) {
        // KamarKostFasilitas::where('kamar_kost_id', $request->id)->delete();
        // $request->validate([
        //     'nomor_kamar' => 'required',
        //     'ukuran_kamar' => 'required',
        //     'gambar_kamar' => 'nullable',
        //     'harga_kamar'=>'required',
        // ]);

        // if ($request->gambar_kamar) {
        //     $gambarBarang = $request->file('gambar_kamar');
        //     $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
        //     $gambarBarang->move(public_path('uploads'), $namaFile);
        // } else {
        //     $namaFile = kamarKost::find($request->id)->gambar_kamar;
        // }

        // $kamar_kost = kamarKost::updateOrCreate([
        //     'id'=>$request->id
        // ],[
        //     'gambar_kamar'=>$namaFile,
        //     'nomor_kamar'=>$request->nomor_kamar,
        //     'ukuran_kamar'=>$request->ukuran_kamar,
        //     'harga_kamar'=>$request->harga_kamar,
        // ]);

        // foreach($request->fasilitas as $fasilitas) {
        //     KamarKostFasilitas::create([
        //         'fasilitas_id'=>$fasilitas,
        //         'kamar_kost_id'=>$kamar_kost->id
        //     ]);
        // }

        // return back()->with('success', 'Kamar Berhasil Di Edit.');
        $request->validate([
            'nomor_kamar' => 'required',
            'ukuran_kamar' => 'required',
            'harga_kamar'=>'required',
        ]);

        // Cek apakah kamar dengan ID yang diberikan ada
        $kamar_kost = kamarKost::find($request->id);
        if (!$kamar_kost) {
            return back()->with('fail', 'Kamar Kost tidak ditemukan.');
        }

        // Update data kamar
        $kamar_kost->nomor_kamar = $request->nomor_kamar;
        $kamar_kost->ukuran_kamar = $request->ukuran_kamar;
        $kamar_kost->harga_kamar = $request->harga_kamar;
        $kamar_kost->save();

        // Update gambar kamar jika ada perubahan
        if ($request->hasFile('gambar_kamar')) {
            // Hapus gambar-gambar sebelumnya
            foreach($kamar_kost->gambarKamar as $gambar) {
                Storage::delete(public_path('uploads/'.$gambar->gambar));
                $gambar->delete();
            }

            // Upload dan simpan gambar yang baru
            foreach($request->file('gambar_kamar') as $image) {
                $namaFile = time().'.'.$image->getClientOriginalName();
                $image->move(public_path('uploads'), $namaFile);

                // Simpan nama file ke dalam tabel gambar_kamars
                $gambar = new gambarKamar();
                $gambar->gambar = $namaFile;
                $gambar->kamar_kost_id = $kamar_kost->id;
                $gambar->save();
            }
        }
        // Update fasilitas kamar
        $kamar_kost->kamarKostFasilitas()->delete(); // Delete existing fasilitas
        foreach($request->fasilitas as $fasilitas) {
            KamarKostFasilitas::create([
                'fasilitas_id'=>$fasilitas,
                'kamar_kost_id'=>$kamar_kost->id
            ]);
        }


        return back()->with('success', 'Kamar Kost berhasil diperbarui.');
    }
    public function toggleKamar($id) {
        $kost = kamarKost::find($id);
        $kost->status = $kost->status == 'Publish' ? 'Unpublish' : 'Publish';
        $kost->save();
        return back()->with('success', 'Status Berhasil Dirubah');
    }

    // for Banner
    public function banner() {
        $banners = Banner::orderBy('id', 'desc')->get();
        return view('admin.banner', compact('banners'));
    }
    public function storeBanner(Request $request) {
        $request->validate([
            'gambar_banner' => 'required|image|mimes:jpeg,png,jpg,gif',
            'lokasi_banner' => 'required',
            'status'=>'required',
        ]);

        $gambarBarang = $request->file('gambar_banner');
        $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
        $gambarBarang->move(public_path('uploads'), $namaFile);

        $banner = new Banner();
        $banner->lokasi_banner = $request->lokasi_banner;
        $banner->status = $request->status;
        $banner->gambar_banner = $namaFile;
        $banner->save();
        return back()->with('success', 'Banner berhasil ditambahkan.');
    }
    public function editBanner(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'lokasi_banner' => 'required',
            'gambar_banner' => 'nullable',
            'status'=>'required',
        ]);

        if($request->gambar_banner) {
            $gambar_banner = $request->file('gambar_banner');
            $namaFile = time().'.'.$gambar_banner->getClientOriginalExtension();
            $gambar_banner->move(public_path('uploads'), $namaFile);
        } else {
            $namaFile = Banner::find($request->id)->gambar_banner;
        }

        $baner = Banner::find($request->id);
        $baner->lokasi_banner = $request->lokasi_banner;
        $baner->status = $request->status;
        $baner->gambar_banner = $namaFile;
        $baner->save();

        if($baner->save()) {
            return back()->with('success', 'Barang berhasil Di Ubah.');
        } else {
            return back()->with('fail', 'Mohon lengkapi Data sebelum Mengirim');
        }

    }
    public function bannerHapus($id) {
        // Cari item berdasarkan ID
        $item = Banner::findOrFail($id);
        // Hapus item
        $item->delete();
        return back()->with('success', 'Barang Telah Dihapus.');
    }
    public function toggleBanner($id) {
        $banner = Banner::find($id);
        $banner->status = $banner->status == 'Publish' ? 'Unpublish' : 'Publish';
        $banner->save();
        return back()->with('success', 'Status Berhasil Dirubah');
    }

    // Layanan Laundry

    // Umum
    public function jasaCuciUmum() {
        $cuciItems = Cuci::orderBy('id', 'desc')->get();
        return view('admin.kategori.cuci.jasa-cuci-umum', compact('cuciItems'));
    }
    public function storeCuciUmum(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'gambar_barang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'=>'required',
            'jenis'=>'required',
        ]);

        $gambarBarang = $request->file('gambar_barang');
        $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
        $gambarBarang->move(public_path('uploads'), $namaFile);

        $cuciItem = new Cuci();
        $cuciItem->nama_barang = $request->nama_barang;
        // $cuciItem->harga_barang = $request->harga_barang;
        $cuciItem->harga_barang = $request->harga_barang;
        $cuciItem->jenis_layanan = $request->jenis;
        $cuciItem->status = $request->status;
        // $cuciItem->layanan_barang = $request->layanan_barang;
        $cuciItem->gambar_barang = $namaFile;
        $cuciItem->save();
        // return redirect()->route('admin.index')->with('success', 'Barang berhasil ditambahkan.');
        if($cuciItem->save()) {
            return back()->with('success', 'Barang berhasil ditambahkan.');
        } else {
            return back()->with('fail', 'Mohon lengkapi Data sebelum Mengirim');
        }
    }
    public function cuciUmumEdit(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'gambar_barang' => 'nullable',
            'status'=>'required',
            'jenis'=>'required',
        ]);

        if($request->gambar_barang) {
            $gambarBarang = $request->file('gambar_barang');
            $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
            $gambarBarang->move(public_path('uploads'), $namaFile);
        } else {
            $namaFile = Cuci::find($request->id)->gambar_barang;
        }

        $CuciItems = Cuci::find($request->id);
        $CuciItems->nama_barang = $request->nama_barang;
        // $CuciItems->harga_barang = $request->harga_barang;
        $CuciItems->harga_barang = $request->harga_barang;
        $CuciItems->status = $request->status;
        $CuciItems->jenis_layanan = $request->jenis;
        // $CuciItems->layanan_barang = $request->layanan_barang;
        $CuciItems->gambar_barang = $namaFile;
        $CuciItems->save();

        if($CuciItems->save()) {
            return back()->with('success', 'Barang berhasil Di Ubah.');
        } else {
            return back()->with('fail', 'Mohon lengkapi Data sebelum Mengirim');
        }

    }
    public function toggleStatus($id) {
        $cuci = Cuci::find($id);
        $cuci->status = $cuci->status == 'Publish' ? 'Unpublish' : 'Publish';
        $cuci->save();
        return back()->with('success', 'Status Berhasil Dirubah');
    }
    public function hapus($id)
    {
        // Cari item berdasarkan ID
        $item = Cuci::findOrFail($id);
        // Hapus item
        $item->delete();

        return back()->with('success', 'Barang Telah Dihapus.');

    }

    // Khusus
    public function jasaCuciKhusus() {
        $cuciItems = cucisize::orderBy('id', 'desc')->get();
        return view('admin.kategori.cuci.jasa-cuci-khusus', compact('cuciItems'));
    }
    public function storeCuciKhusus(Request $request) {
        $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'jenis'=>'required',
            'status'=>'required',
            'gambar_barang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ukuran' => 'required',
        ]);

        $gambarBarang = $request->file('gambar_barang');
        $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
        $gambarBarang->move(public_path('uploads'), $namaFile);

        $cuciItem = new cucisize();
        $cuciItem->nama_barang = $request->nama_barang;
        // $cuciItem->harga_barang = $request->harga_barang;
        $cuciItem->harga_barang = number_format($request->harga_barang, 0, ',', '.');
        $cuciItem->jenis_layanan = $request->jenis;
        $cuciItem->status = $request->status;
        $cuciItem->ukuran_barang = $request->ukuran;
        $cuciItem->gambar_barang = $namaFile;
        $cuciItem->save();
        // return redirect()->route('admin.index')->with('success', 'Barang berhasil ditambahkan.');
        return back()->with('success', 'Barang berhasil ditambahkan.');
    }
    public function cuciKhususEdit(Request $request) {
        $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            'jenis'=>'required',
            'status'=>'required',
            'gambar_barang' => 'nullable',
            'ukuran' => 'required',
        ]);

        if($request->gambar_barang) {
            $gambarBarang = $request->file('gambar_barang');
            $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
            $gambarBarang->move(public_path('uploads'), $namaFile);
        } else {
            $namaFile = cucisize::find($request->id)->gambar_barang;
        }

        $cuciItem = cucisize::find($request->id);
        $cuciItem->nama_barang = $request->nama_barang;
        // $cuciItem->harga_barang = $request->harga_barang;
        $cuciItem->harga_barang = number_format($request->harga_barang, 0, ',', '.');
        $cuciItem->jenis_layanan = $request->jenis;
        $cuciItem->status = $request->status;
        $cuciItem->ukuran_barang = $request->ukuran;
        $cuciItem->gambar_barang = $namaFile;
        $cuciItem->save();
        // return redirect()->route('admin.index')->with('success', 'Barang berhasil ditambahkan.');
        return back()->with('success', 'Barang berhasil di Edit.');
    }
    public function toggleKhusus($id) {
        $cuci = cucisize::find($id);
        $cuci->status = $cuci->status == 'Publish' ? 'Unpublish' : 'Publish';
        $cuci->save();
        return back()->with('success', 'Status Berhasil Dirubah');
    }
    public function khususHapus($id) {
        // Cari item berdasarkan ID
        $item = cucisize::findOrFail($id);
        // Hapus item
        $item->delete();
        return back()->with('success', 'Barang Telah Dihapus.');
    }

    // Sepatu
    public function jasaCuciSepatu() {
        $cuciItems = cuciSepatu::orderBy('id', 'desc')->get();
        return view('admin.kategori.cuci.jasa-cuci-sepatu', compact('cuciItems'));
    }
    public function storeCuciSepatu(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga_barang' => 'required',
            'gambar_barang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'=>'required',
            'jenis'=>'required',
        ]);

        $gambarBarang = $request->file('gambar_barang');
        $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
        $gambarBarang->move(public_path('uploads'), $namaFile);

        $cuciItem = new cuciSepatu();
        $cuciItem->nama = $request->nama;
        // $cuciItem->harga_barang = $request->harga_barang;
        $cuciItem->harga_barang = number_format($request->harga_barang, 0, ',', '.');

        $cuciItem->jenis_layanan = $request->jenis;
        $cuciItem->status = $request->status;
        // $cuciItem->layanan_barang = $request->layanan_barang;
        $cuciItem->gambar_barang = $namaFile;
        $cuciItem->save();
        // return redirect()->route('admin.index')->with('success', 'Barang berhasil ditambahkan.');
        return back()->with('success', 'Barang berhasil ditambahkan.');
    }
    public function cuciSepatuEdit(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga_barang' => 'required',
            'gambar_barang' => 'nullable',
            'status'=>'required',
            'jenis'=>'required',
        ]);

        if($request->gambar_barang) {
            $gambarBarang = $request->file('gambar_barang');
            $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
            $gambarBarang->move(public_path('uploads'), $namaFile);
        } else {
            $namaFile = cuciSepatu::find($request->id)->gambar_barang;
        }

        $CuciItems = cuciSepatu::find($request->id);
        $CuciItems->nama = $request->nama;
        // $CuciItems->harga_barang = $request->harga_barang;
        $CuciItems->harga_barang = number_format($request->harga_barang, 0, ',', '.');
        $CuciItems->status = $request->status;
        $CuciItems->jenis_layanan = $request->jenis;
        // $CuciItems->layanan_barang = $request->layanan_barang;
        $CuciItems->gambar_barang = $namaFile;
        $CuciItems->save();

        if($CuciItems->save()) {
            return back()->with('success', 'Data Berhasil Dirubah');
        } else {
            return back()->with('fail', 'Data Gagal Di Ubah');
        }
    }
    public function toggleSepatu($id) {
        $cuci = cuciSepatu::find($id);
        $cuci->status = $cuci->status == 'Publish' ? 'Unpublish' : 'Publish';
        $cuci->save();
        return back()->with('success', 'Status Berhasil Dirubah');
    }
    public function sepatuHapus($id) {
        // Cari item berdasarkan ID
        $item = cuciSepatu::findOrFail($id);
        // Hapus item
        $item->delete();
        return back()->with('success', 'Barang Telah Dihapus.');
    }

    // Proses Cuci
    public function prosesPencucian() {
        $proses = ProsesCuci::whereIn('status', ['Proses Pengambilan', 'Proses Cuci'])->get();
        $now = Carbon::now();

        $pengambilan = ProsesCuci::where('status', 'Proses Pengambilan')->get();
        $processing = ProsesCuci::where('status', 'Proses Cuci')->get();

        if($processing) {
            foreach($processing as $item) {

                $dones = str_replace(',', '', $item->tgl_done);

                $td = Carbon::createFromFormat('d/m/Y H:i:s', $dones);
                // $tp = Carbon::parse($tgl_starts);
                // dd($now);
                if($now >= $td) {
                    $src = ProsesCuci::where('id', $item->id)->first();
                    $src->status = 'Selesai';
                    $src->save();
                    return view('admin.kategori.cuci.proses-cuci', compact('proses'));
                }else {
                    return view('admin.kategori.cuci.proses-cuci', compact('proses'));
                }
            }
        }

        if($pengambilan) {
            foreach($pengambilan as $item) {

                $tgl_starts = str_replace(',', '', $item->tgl_start);

                $tp = Carbon::createFromFormat('d/m/Y H:i:s', $tgl_starts);
                // $tp = Carbon::parse($tgl_starts);
                // dd($now);
                if($now > $tp) {
                    $src = ProsesCuci::where('id', $item->id)->first();
                    $src->status = 'Proses Cuci';
                    $src->save();
                    return view('admin.kategori.cuci.proses-cuci', compact('proses'));
                }
            }
        }else {
            return view('admin.kategori.cuci.proses-cuci', compact('proses'));
        }

        return view('admin.kategori.cuci.proses-cuci', compact('proses'));

    }

    public function editTanggal(Request $request) {
        $request->validate([
            "tanggal_selesai" =>'required'
        ]);

        $CuciItems = ProsesCuci::find($request->id);
        $CuciItems->tgl_done = $request->tanggal_selesai;
        $CuciItems->save();

        if($CuciItems->save()) {
            return back()->with('success', 'Data Berhasil Dirubah');
        } else {
            return back()->with('fail', 'Data Gagal Di Ubah');
        }
    }

    public function updateStat(Request $request)
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

    // Pindah Kamar
    public function pagePindah() {
        // $perpindahan = pindahKamar::where('status', 'Diterima')->get();
        // $now = Carbon::now();
        // foreach($perpindahan as $item) {
        //     $x = Carbon::parse($item->waktu_pindah);
        //     $waktuPindah = $x;
        //     if($now >=  $item->waktu_pindah) {
        //         return redirect()->route('updatesPindah')->withMethod('post');
        //     }
        // }
        $PengajuanPindah = pindahKamar::orderBy('id', 'desc')->where('status', 'Dalam Proses')->get();
        $riwayat =  pindahKamar::orderBy('id', 'desc')->whereIn('status', ['Ditolak', 'Diterima', 'Dipindahkan'])->get();
        return view('admin.kategori.pindah-kamar', compact('PengajuanPindah', 'riwayat'));
    }

    public function tolakPindah(Request $request) {
        $request->validate([
            'respon' => 'required',
        ]);

        $data = pindahKamar::find($request->id);
        $data->status = 'Ditolak';
        $data->respon = $request->respon;
        $data->save();

        $filter = new filterRiwayat();
        $filter->pindah_kamar_id = $data->id;
        $filter->user_id = $data->user_id;
        $filter->save();

        return redirect()->back()->with('success', 'Data Berhasil di Kirim');
    }

    public function setujuiPindah(Request $request) {

        $request->validate([
            'kamar_baru' => 'required',
        ]);

        $data = pindahKamar::find($request->id);
        $data->status = 'Diterima';
        $data->save();

        $kamar = kamarKost::where('nomor_kamar', $request->kamar_baru)->latest()->first();
        $kamar->kondisi = 'Dipesan';
        $kamar->save();

        return redirect()->back()->with('success', 'Data Berhasil di Kirim');
    }

    // public function updatesPindah() {
    //     $pindahKamar = pindahKamar::where('status', 'Diterima')->get();
    //     foreach($pindahKamar as $item) {
    //         $kamarNow = kamarKost::where('user_id',  $item->user_id)->first();
    //         $user = $item->user_id;
    //         $user->no_kamar = $item->kamar_baru;
    //         $user->save();
    //         if ($kamarNow) {
    //             $kamarNow->user_id = null;
    //             $kamarNow->kondisi = 'Kosong';
    //             $kamarNow->save();
    //         }
    //         $new_kamar = KamarKost::where('nomor_kamar', $item->kamar_baru)->first();
    //         $new_kamar->user_id = $user->id;
    //         $new_kamar->kondisi = 'Dihuni';
    //         $new_kamar->save();

    //         $item->status = 'Dipindahkan';
    //         $item->save();
    //     }

    // }
    // Pindah Kamar

    // Akun
    public function tolakAccount(Request $request) {

        $request->validate([
            'alasan' => 'required',
        ]);

        $akun = gantiAkun::where('id', $request->id)->first();

        $akun->alasan = $request->alasan;
        $akun->status = 'Ditolak';
        $akun->save();

        return back()->with('success', 'Data Telah DI Kirim');
    }
    public function setujuAccount(Request $request) {
        // dd($request);
        $request->validate([
            'id',
            'new_email' => 'nullable|email',
            'new_password' => 'nullable',
        ]);


        $newEmail = $request->input('new_email');
        $newPassword = $request->input('new_password');

        $user = User::where('id', $request->user_id)->first();

        if (!empty($newEmail)) {
            if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
                return back()->with('fail', 'Format email tidak valid');
            }else {
                $user->email = $newEmail;
            }
        }

        // Cek apakah input password tidak kosong
        if (!empty($newPassword)) {
            // Enkripsi password baru
            $user->password = Hash::make($newPassword);
        }

        // dd($request);
        $ajuan = gantiAkun::where('id', $request->id)->first();
        $ajuan->status = 'Diterima';
        $ajuan->save();
        $user->save();

        return redirect()->back()->with('success', 'Data Berhasil Di Update');
    }
    // Akun

    public function laporanKehilangan() {
        $lk = laporanKehilangan::orderBy('id', 'desc')->where('status', 'Dalam Proses')->get();
        $rk = laporanKehilangan::orderBy('id', 'desc')->where('status', 'Direspon')->get();

        return view('admin.kategori.laporan-kehilangan', compact('lk', 'rk'));
    }
    public function responKehilangan(Request $request) {

        // dd($request->all());
        $request->validate([
            'respon' => 'required',
        ]);

        $laporan = laporanKehilangan::where('user_id', $request->user_id)->first();
        $laporan->respon = $request->respon;
        $laporan->status = 'Direspon';
        $laporan->save();

        $filter = new filterRiwayat();
        $filter->kehilangan_id = $laporan->id;
        $filter->user_id = $laporan->user_id;
        $filter->save();

        return redirect()->back()->with('success', 'Respon Berhasil Dikirim');
    }


    // Laporan Kerusakan

    public function laporanKerusakan() {
        $kerusakan = laporanKerusakan::orderBy('id', 'desc')->where('status','Dalam Proses')->get();
        $riwayat = laporanKerusakan::orderBy('id', 'desc')->where('status','Direspon')->get();

        return view('admin.kategori.laporan-kerusakan', compact('kerusakan', 'riwayat'));
    }

    public function responKerusakan(Request $request) {

        // dd($request->all());
        $request->validate([
            'respon' => 'required',
        ]);

        $laporan = laporanKerusakan::where('user_id', $request->user_id)->first();
        $laporan->respon = $request->respon;
        $laporan->status = 'Direspon';
        $laporan->save();

        $filter = new filterRiwayat();
        $filter->kerusakan_id = $laporan->id;
        $filter->user_id = $laporan->user_id;
        $filter->save();

        return redirect()->back()->with('success', 'Respon Berhasil Dikirim');
    }

    // Laporan Kerusakan
}