<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Str;

class loginController extends Controller
{
    public function index() {
        return view('welcome');
    }

    public function admin() {
        return view('admin.index');
    }

    public function pengajuan() {
        return view('pengajuan');
    }

    public function user() {
        return view('user.index');
    }

    public function login(Request $request) {
        $auth = $request->validate([
            'email'    => 'required',
            'password' => 'required'
        ]);


        if(Auth::attempt($auth)) {

            // dd(Str::replace('-',' ',Str::title(Auth::user()->role->name)));

            if (Auth::user()->role_id == 1) {

                return redirect('/admin/index');
                // dd('success');

            } elseif(Auth::user()->role_id == 2) {

                return redirect()->route('userku');
            }

        }

        return back()->with('error', 'email dan password tidak sesuai');
    }

    public function formPengajuan(Request $request) {
        // dd($request);
        $request->validate([
            'email' => 'required',
            'no_kamar' => 'required',
        ]);

        $user = User::where('email', $request->email)->where('no_kamar', $request->no_kamar)->first();

        if ($user) {
            $pengajuan = new pengajuan();
            $pengajuan->email = $request->email;
            $pengajuan->no_kamar = $request->no_kamar;
            $pengajuan->keterangan = $request->keterangan_lanjutan;
            $pengajuan->save();

            return back()->with('success', 'Formulir berhasil di kirim');
        } else {
            return back()->with('error', 'Data yang Kamu Masukkan tidak cocok.');
        }
    }



    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
