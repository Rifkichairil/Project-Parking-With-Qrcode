<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home()
    {
        $kendaraans = Kendaraan::get();
        return view('backend.guest', compact('kendaraans'));
    }

    public function create(Request $request)
    {
        //dd($request->all());
        $kendaraan = Kendaraan::create($request->all());
        if ($request->hasFile('foto_stnk')) {
            $request->file('foto_stnk')->move('images/', $request->file('foto_stnk')->getClientOriginalName());
            $kendaraan->foto_stnk = $request->file('foto_stnk')->getClientOriginalName();
            $kendaraan->Save();
        }
        return redirect()->route('guest.home')->with('sukses', 'Kendaraan berhasil didaftarkan!');
    }
}
