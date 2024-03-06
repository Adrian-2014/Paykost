<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CuciProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminControll extends Controller
{
    public function index()
    {
        // $this->authorize('admin');
        return view('admin.index');
    }

    public function create(Request $req)
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

    public function storeCuciItem(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required',
            'harga_barang' => 'required|numeric',
            'gambar_barang' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarBarang = $request->file('gambar_barang');
        $namaFile = time().'.'.$gambarBarang->getClientOriginalExtension();
        $gambarBarang->move(public_path('uploads'), $namaFile);

        $product = new CuciProduct;
        $product->nama_barang = $request->nama_barang;
        $product->harga_barang = $request->harga_barang;
        $product->gambar_barang = $namaFile;
        $product->save();

        return redirect()->route('admin.index')->with('success', 'Barang berhasil ditambahkan.');
    }
}
