<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class adminControll extends Controller
{
    public function index()
    {
        // $this->authorize('admin');
        return view('admin.create');
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
}
