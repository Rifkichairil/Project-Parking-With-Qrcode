<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GedungController extends Controller
{
    public function index()
    {
        $data_gedung = \App\Models\Gedung::all();
        return view('gedung.index', ['data_gedung' => $data_gedung]);
    }

    public function create(Request $request)
    {
        \App\Models\Gedung::create($request->all());
        return redirect('/gedung')->with('sukses', 'Gedung berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $gedung = \App\Models\Gedung::find($id);
        return view('gedung/edit', ['gedung' => $gedung]);
    }

    public function update(Request $request, $id)
    {
        $gedung = \App\Models\Gedung::find($id);
        $gedung->update($request->all());
        return redirect('/gedung')->with('sukses', 'Data gedung berhasil diupdate!');
    }

    public function delete($id)
    {
        $gedung = \App\Models\Gedung::find($id);
        $gedung->delete();
        return redirect('/gedung')->with('sukses', 'Gedung berhasil dihapus!');
    }
}
