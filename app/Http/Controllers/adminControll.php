<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuci;
use App\Models\cuciBasah;
use App\Models\cuciKering;
use App\Models\cuciLipat;

use App\Models\cuciSetrika;
use App\Models\jasaSetrika;
use App\Models\User;
use Database\Seeders\CuciKeringSeeder;
use Illuminate\Http\Request;
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

    public function create() {
        return view('admin/create');
    }

    public function createStore(Request $req)
    {

       $createdData = $req->validate([
            'name'=> 'required|max:255',
            'email'=> 'required|email|unique:users',
            'password'=> 'required|min:4'
        ],
    [
        'email.unique' => 'Email sudah digunakan. Silakan gunakan email lain.'
    ]);

    $createdData['password'] = bcrypt($createdData['password']);
       User::create($createdData);

       return back()->with('success', 'creating success!, creating more users!');
    }

    public function addCuciItem() {
        $cuciItems = Cuci::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.kategori.jasa-cuci-baju', compact('cuciItems'));
    }

    public function storeCuciItem(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            // 'layanan_barang' => 'required',
            'gambar_barang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status'=>'required',
            'jenis'=>'required',
        ]);

        $gambarBarang = $request->file('gambar_barang');
        $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
        $gambarBarang->move(public_path('uploads'), $namaFile);

        $cuciItem = new Cuci();
        $cuciItem->nama_barang = $request->nama_barang;
        $cuciItem->harga_barang = $request->harga_barang;
        $cuciItem->jenis_layanan = $request->jenis;
        // $cuciItem->layanan_barang = $request->layanan_barang;
        $cuciItem->gambar_barang = $namaFile;
        $cuciItem->save();
        // return redirect()->route('admin.index')->with('success', 'Barang berhasil ditambahkan.');
        return back()->with('berhasil', 'Barang berhasil ditambahkan.');

    }
    public function show(Cuci $Cuci)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Post',
            'data'    => $Cuci
        ]);
    }

    public function hapus($id)
    {
        // Cari item berdasarkan ID
        $item = Cuci::findOrFail($id);
        // Hapus item
        $item->delete();

        // Set pesan sukses ke dalam session
        return redirect()->back();
        Session::flash('success', 'Item berhasil dihapus');
    }

}
