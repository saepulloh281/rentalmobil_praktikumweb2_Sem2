<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tipemobil;

class TipeMobilController extends Controller
{
    //menampilkan data
    function index()
    {
        $tipeMobilData = TipeMobil::get();
        return view('pages.tipemobil.index', compact('tipeMobilData'));
    }

    //menambahkan data
    function store(Request $request)
    {
        //validasi data yang masuk 
        $tipeMobildata = $request->validate([
            'tipe' => 'required',
        ]);
        //simpan kedalam database
        TipeMobil::create($tipeMobilData);
        //mengalihkan ke halaman awal
        return redirect()->to('/tipemobil');
    }

    function create()
    {
        return view('pages.tipemobil.create');
    }

    function update($id, Request $request)
    {
        //validasi data
        //cara pertama $validasiTipeMobil = $request->validate(['tipe' => 'required']);
        $validasiTipeMobil = $request->validate([
            'tipe' => 'required'
        ]);
        TipeMobil::find($id)->update($validasiTipeMobil);
        //redirect
        return redirect()->to('/tipemobil');
    }
    function edit($id)
    {
        $tipeMobilData = TipeMobil::find($id);
        return view('pages.tipe_mobil.edit', compact('tipeMobilData'));
    }
    //hapus data
    function delete($id)
    {
        TipeMobil::find($id)->delete();

        return redirect()->to('/tipemobil');
    }
}

// seperti tipe mobil
