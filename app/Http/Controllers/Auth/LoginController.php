<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LoginController extends Controller

{
    //memanggil Form
    function index()
    {
        return view('pages.Auth.login');
    }
    function login(Request $request)
    {
        //validasi data 
        $validatedUser = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        // dd($validatedUser);

        //proses login ,di cek apakah sudah sesuai dengan data di data base
        if (Auth::attempt($validatedUser)) {
            //redirect ke halaman selanjut nya 
            return redirect()->to('/merk');
        } else {
            //redirect ke halaman login lagi
            return redirect()->back();
        }
    }
    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->to('/login');
    }
}
