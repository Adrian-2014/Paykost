<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\cuciBasah;
use App\Models\cuciKering;
use App\Models\CuciProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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


    public function cuciProduct() {
        return view('admin.cuciProduct');
    }

    public function addCuciKering() {
        return view('admin.createCuciKering');
    }

    public function storeCuciItem(Request $request)
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

        $cuciBasahItem = new cuciBasah();
        $cuciBasahItem->nama_barang = $request->nama_barang;
        $cuciBasahItem->harga_barang = $request->harga_barang;
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
}
