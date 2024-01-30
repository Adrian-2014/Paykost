<?php

namespace App\Http\Controllers;

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

            } elseif(Auth::user()->role_id == 2) {

                return redirect('/pemilik-kos/index');

                // dd('success');

            } elseif(Auth::user()->role_id == 3) {

                return redirect('/user/index');

            }

        }

        return back()->with('error', 'email dan password tidak sesuai');
    }


    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

}
