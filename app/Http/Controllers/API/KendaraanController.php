<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Kendaraan;
use Illuminate\Http\Request;

class KendaraanController extends Controller
{
    //
    public function getData()
    {
        $kendaraan  = Kendaraan::get();

        if ($kendaraan) {
            return ResponseFormater::success($kendaraan, 'Data histori parkir berhasil ditampilkan');
        } else {
            return ResponseFormater::error(null, 'Data histori parkir tidak ada', 404);
        }
    }

    public function all(Request $req)
    {
        $id                 = $req->input('id');
        $nama_civitas       = $req->input('nama_civitas');
        $status_civitas     = $req->input('status_civitas');
        $nip_nim            = $req->input('nip_nim');
        $plat_nomor         = $req->input('plat_nomor');
        $jenis_kendaraan    = $req->input('jenis_kendaraan');
        $merk               = $req->input('merk');
        $status_kendaraan   = $req->input('status_kendaraan');

        if ($id) {
            $kendaraan = Kendaraan::find($id);

            if ($kendaraan) {
                # code...
                return ResponseFormater::success($kendaraan, 'Data Kendaraan berhasil diambil');
            } else {
                return ResponseFormater::error(null, 'Data Kendaraan tidak ada', 404);
            }
        }

        // slug
        if ($plat_nomor) {
            $kendaraan = Kendaraan::where('plat_nomor', $plat_nomor)->first();

            if ($kendaraan) {
                # code...
                return ResponseFormater::success($kendaraan, 'Data Kendaraan berhasil diambil');
            } else {
                return ResponseFormater::error(null, 'Data Kendaraan tidak ada', 404);
            }
        }


        // $kendaraan = Kendaraan::with('galleries');

        // if ($name) {
        //     # code...
        //     $kendaraan->where('name', 'like', '%' . $name . '%');
        // }
        // if ($type) {
        //     # code...
        //     $kendaraan->where('type', 'like', '%' . $type . '%');
        // }
        // if ($price_from) {
        //     # code...
        //     $kendaraan->where('price', '>=', 'price_from');
        // }
        // if ($price_to) {
        //     # code...
        //     $kendaraan->where('price', '<=', 'price_to');
        // }

        // return ResponseFormatter::success(
        //     $kendaraan->paginate($limit),
        //     'Data list produk berhasil diambil'
        // );
    }
}
// }
