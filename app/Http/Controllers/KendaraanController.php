<?php

namespace App\Http\Controllers;

use App\Models\Kendaraan;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use PDF;
// use Imagick;

class KendaraanController extends Controller
{
    public function index()
    {
        $kendaraans = Kendaraan::get();
        return view('backend.operator.kendaraan.index', compact('kendaraans'));
    }

    public function detail($id)
    {
        $user = Kendaraan::find($id);
        // dd($user);
        // $qrcode = QrCode::size(200)->generate('Embed me into an e-mail!');
        $qrcode = QrCode::size(200)->generate($user->id);

        return view('backend.operator.kendaraan.detail', compact('user', 'qrcode'));
    }

    public function pdf($id)
    {
        $user = Kendaraan::find($id);
        $qrcode = QrCode::size(150)->generate($user->id);

        $pdf = PDF::loadview('backend.operator.kendaraan.pdf', compact('user', 'qrcode'));
        $pdf->setPaper([0, 0, 300.00, 250.00], 'landscape');

        return $pdf->stream();
    }


    public function edit($id)
    {
        $user = Kendaraan::find($id);
        return view('backend.operator.kendaraan.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        //dd($request->all());
        $kendaraan = Kendaraan::find($id);
        $kendaraan->update($request->all());
        if ($request->hasFile('foto_stnk')) {
            $request->file('foto_stnk')->move('images/', $request->file('foto_stnk')->getClientOriginalName());
            $kendaraan->foto_stnk = $request->file('foto_stnk')->getClientOriginalName();
            $kendaraan->Save();
        }
        return redirect()->route('kendaraan.dashboard')->with('sukses', 'Data berhasil diupdate!');
    }

    public function delete($id)
    {
        $kendaraan = Kendaraan::find($id);
        $kendaraan->delete();
        return redirect('/kendaraan')->with('sukses', 'Data berhasil dihapus!');
    }

    public function status($id)
    {
        $kendaraan = Kendaraan::where('id', $id)->find($id);

        if ($kendaraan->status_kendaraan == 0) {
            # code...
            $kendaraan->status_kendaraan = 1;
        } else {
            $kendaraan->status_kendaraan = 0;
        }
        $kendaraan->save();

        return redirect()->route('kendaraan.dashboard');
    }
}
