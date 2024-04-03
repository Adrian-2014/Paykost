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
use App\Models\jasaSetrika;
use App\Models\kamarKost;
use App\Models\ProsesCuci;
use App\Models\User;
use Database\Seeders\CuciKeringSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class adminControll extends Controller
{
    public function index()
    {
        // $this->authorize('admin');
        return view('admin.index');
    }


    // For Kamar Kost
    public function kamarKost() {
        $kost = kamarKost::orderBy('id', 'desc')->get();
        return view('admin.kamar-kost', compact('kost'));
    }
    // For Kamar Kost

    // For User
    public function user() {
        $user = User::where('role_id', '>', 1)->orderBy('id', 'desc')->get();
        return view('admin.user', compact('user'));
    }
    public function storeUser(Request $request) {
        // dd($request->all());
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required|min:4',
            'tanggal_masuk' => 'required',
            'no_kamar' => 'required',
            'jenis_kelamin'=>'required',
            'pekerjaan'=>'required',
            'status'=>'required',
            'role_id'=>'required',
        ]);

        $user = new User();
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->tanggal_masuk = $request->tanggal_masuk;
        $user->no_kamar = $request->no_kamar;
        $user->jenis_kelamin = $request->jenis_kelamin;
        $user->pekerjaan = $request->pekerjaan;
        $user->status = $request->status;
        $user->role_id = $request->role_id;
        $user->save();
        return back()->with('success', 'user Berhasil Di Tambahkan.');
    }
    // For User

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
        $cuciItem->harga_barang = number_format($request->harga_barang, 0, ',', '.');
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
        $CuciItems->harga_barang = number_format($request->harga_barang, 0, ',', '.');
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
        return view('admin.kategori.cuci.proses-cuci', compact('proses'));
    }
}
