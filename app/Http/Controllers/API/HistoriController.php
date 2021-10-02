<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Histori;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoriController extends Controller
{
    //
    public function all(Request $req)
    {
        $histories  = Histori::with('kendaraan')->get();

        if ($histories) {
            return ResponseFormater::success($histories, 'Data histori parkir berhasil ditampilkan');
        } else {
            return ResponseFormater::error(null, 'Data histori parkir tidak ada', 404);
        }
    }

    public function terparkir(Request $req)
    {
        $histories     = Histori::with('kendaraan')->where('status', 'masuk')->get();

        if ($histories) {
            return ResponseFormater::success($histories, 'Data histori parkir berhasil ditampilkan');
        } else {
            return ResponseFormater::error(null, 'Data histori parkir tidak ada', 404);
        }
    }

    public function store(Request $req)
    {
        $id         = $req->id;
        $now        = Carbon::now();

        if ($id) {
            # code...
            $histori = Histori::with('kendaraan')->where('kendaraan_id', $id)->first();

            if ($histori == null) {
                $histori = Histori::create([
                    'gedung'        => 'Gedung c',
                    'kendaraan_id'  => $id,
                    'jam_masuk'     => $now,
                    'status'        => 'masuk',
                ]);
                return ResponseFormater::success($histori, 'Data Histori Masuk berhasil tambahkan');
            } elseif ($histori->kendaraan_id == $id && $histori->jam_keluar == NULL) {
                $histori->update([
                    'jam_keluar'     => $now,
                    'status'        => 'keluar',

                ]);
                return ResponseFormater::success($histori, 'Data Histori keluar berhasil tambahkan');
            }
            return ResponseFormater::error(null, 'Data Histori Masuk tidak ada', 404);
        }
    }

    public function update(Request $req)
    {
        $id         = $req->id;
        $now        = Carbon::now();

        // slug
        if ($id) {
            $histori = Histori::where('kendaraan_id', $id)->first();

            if ($histori->jam_keluar == NULL) {
                # code...
                $histori->update([
                    'jam_keluar'     => $now,
                ]);
                return ResponseFormater::success($histori, 'Data Histori keluar berhasil tambahkan');
            } else {
                return ResponseFormater::error(null, 'Data Histori keluar tidak tambahkan', 404);
            }
        }
    }

    public function count(Request $req)
    {
        $histori = Histori::where('jam_keluar', '=', null)->count();

        return ResponseFormater::success($histori, 'Data Histori Terparkir berhasil dimunculkan');
    }
}
