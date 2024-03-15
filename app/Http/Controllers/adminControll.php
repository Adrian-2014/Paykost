<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cuci;
use App\Models\cuciBasah;
use App\Models\cuciKering;
use App\Models\cuciLipat;

use App\Models\cuciSetrika;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;
use App\Models\jasaSetrika;

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


    public function addCuciBasah() {
        return view('admin.layanan-cuci.cuci-basah');
    }

    public function addCuciKering() {
        return view('admin.layanan-cuci.cuci-kering');
    }

    public function addCuciSetrika() {
        return view('admin.layanan-cuci.cuci-setrika');
    }

    public function addCuciLipat() {
        return view('admin.layanan-cuci.cuci-lipat');
    }

    public function addJasaSetrika() {
        return view('admin.layanan-cuci.jasa-setrika');
    }

    public function storeCuciBasah(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            // 'layanan_barang' => 'required',
            'gambar_barang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'jenis'=>'required',
        ]);

        $gambarBarang = $request->file('gambar_barang');
        $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
        $gambarBarang->move(public_path('uploads'), $namaFile);

        $cuciBasahItem = new Cuci();
        $cuciBasahItem->nama_barang = $request->nama_barang;
        $cuciBasahItem->harga_barang = $request->harga_barang;
        $cuciBasahItem->cuci = $request->jenis;
        // $cuciBasahItem->layanan_barang = $request->layanan_barang;
        $cuciBasahItem->gambar_barang = $namaFile;
        $cuciBasahItem->save();
        // return redirect()->route('admin.index')->with('success', 'Barang berhasil ditambahkan.');
        return back()->with('success', 'Barang berhasil ditambahkan.');

    }

    public function storeCuciKering(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            // 'layanan_barang' => 'required',
            'gambar_barang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarBarang = $request->file('gambar_barang');
        $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
        $gambarBarang->move(public_path('uploads'), $namaFile);

        $cuciKeringItem = new cuciKering();
        $cuciKeringItem->nama_barang = $request->nama_barang;
        $cuciKeringItem->harga_barang = $request->harga_barang;
        // $cuciKeringItem->layanan_barang = $request->layanan_barang;
        $cuciKeringItem->gambar_barang = $namaFile;
        $cuciKeringItem->save();

        // return redirect()->route('admin.index')->with('success', 'Barang berhasil ditambahkan.');
        return back()->with('success', 'Barang berhasil ditambahkan.');
    }

    public function storeCuciSetrika(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            // 'layanan_barang' => 'required',
            'gambar_barang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarBarang = $request->file('gambar_barang');
        $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
        $gambarBarang->move(public_path('uploads'), $namaFile);

        $cuciKeringItem = new cuciSetrika();
        $cuciKeringItem->nama_barang = $request->nama_barang;
        $cuciKeringItem->harga_barang = $request->harga_barang;
        // $cuciKeringItem->layanan_barang = $request->layanan_barang;
        $cuciKeringItem->gambar_barang = $namaFile;
        $cuciKeringItem->save();

        // return redirect()->route('admin.index')->with('success', 'Barang berhasil ditambahkan.');
        return back()->with('success', 'Barang berhasil ditambahkan.');
    }
    public function storeCuciLipat(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            // 'layanan_barang' => 'required',
            'gambar_barang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarBarang = $request->file('gambar_barang');
        $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
        $gambarBarang->move(public_path('uploads'), $namaFile);

        $cuciKeringItem = new cuciLipat();
        $cuciKeringItem->nama_barang = $request->nama_barang;
        $cuciKeringItem->harga_barang = $request->harga_barang;
        // $cuciKeringItem->layanan_barang = $request->layanan_barang;
        $cuciKeringItem->gambar_barang = $namaFile;
        $cuciKeringItem->save();

        // return redirect()->route('admin.index')->with('success', 'Barang berhasil ditambahkan.');
        return back()->with('success', 'Barang berhasil ditambahkan.');
    }
    public function storeJasaSetrika(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required',
            // 'layanan_barang' => 'required',
            'gambar_barang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarBarang = $request->file('gambar_barang');
        $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
        $gambarBarang->move(public_path('uploads'), $namaFile);

        $cuciKeringItem = new jasaSetrika();
        $cuciKeringItem->nama_barang = $request->nama_barang;
        $cuciKeringItem->harga_barang = $request->harga_barang;
        // $cuciKeringItem->layanan_barang = $request->layanan_barang;
        $cuciKeringItem->gambar_barang = $namaFile;
        $cuciKeringItem->save();

        // return redirect()->route('admin.index')->with('success', 'Barang berhasil ditambahkan.');
        return back()->with('success', 'Barang berhasil ditambahkan.');
    }
}
