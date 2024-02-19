<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dropzoneController extends Controller
{
    public function index() {
        return view('user.kategori.kerusakan');
    }


    public function store(Request $request) {
        $image = $request->file('file');
        $imageName = time().rand(1,100).'.'.$image->extension();
        $image->move(public_path('images'),$imageName);
        return response()->json(['success'=> $imageName]);
    }
}
