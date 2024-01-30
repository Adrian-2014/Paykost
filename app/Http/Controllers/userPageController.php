<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class userPageController extends Controller
{
    public function kamarku() {
        return view('user.kamarku');
    }
    public function riwayat() {
        return view('user.riwayat');
    }
    public function profil() {
        return view('user.profil');
    }
}
