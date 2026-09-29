<?php

namespace App\Http\Controllers;

use App\Bahan;
use Illuminate\Http\Request;

class bahanController extends Controller
{
    public function index()
    {
        $data = Bahan::orderBy('id', 'desc')->get();
        return view('admin.bahan.index', compact('data'));
    }

    public function store(Request $req)
    {
        $data = Bahan::create($req->all());

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Bahan::where('uuid', $uuid)->first();

        return view('admin.bahan.edit', compact('data'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Bahan::where('uuid', $uuid)->first();

        $data->fill($req->all())->save();

        return redirect()->route('bahanIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        
        $data = Bahan::where('uuid', $uuid)->first()->delete();

        return redirect()->route('bahanIndex')->withSuccess('Data berhasil dihapus');
    }
}
