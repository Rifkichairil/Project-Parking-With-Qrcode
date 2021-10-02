<?php

namespace App\Http\Controllers;

use App\Models\Histori;
use App\Models\Kendaraan;
use DateTime;
use Illuminate\Http\Request;

class HistoriController extends Controller
{
    public function timeZone($location)
    {
        return date_default_timezone_set($location);
    }

    public function index(Request $request)
    {
        $histories  = Histori::with('kendaraan')->get();

        $terdaftar  = Kendaraan::get()->count();
        $motor      = Kendaraan::where('jenis_kendaraan', 'Motor')->count();
        $mobil      = Kendaraan::where('jenis_kendaraan', 'Mobil')->count();

        return view('backend.operator.index', compact('histories', 'terdaftar', 'mobil', 'motor'));
    }

    public function detail($id)
    {
        $user = Histori::with('kendaraan')->find($id);
        // dd($user);
        return view('backend.scan', compact('user'));
    }

    public function delete($id)
    {
        $histori    = Histori::findOrFail($id);
        $histori->delete();
        return redirect()->back();
    }
}
