<?php

namespace App\Http\Controllers;

use App\Panen;
use App\Penanaman;
use App\Tanaman;
use Illuminate\Http\Request;

class panenController extends Controller
{
    public function index()
    {
        $data = Panen::orderBy('id', 'desc')->get();
        $penanaman = Penanaman::orderBy('id', 'desc')->get();
        $tanaman = Tanaman::orderBy('id', 'desc')->get();
        return view('admin.panen.index', compact('data', 'penanaman', 'tanaman'));
    }

    public function store(Request $req)
    {
        $data = Panen::create($req->all());

        $tanaman = Tanaman::findOrFail($req->tanaman_id);
        $tanaman->stok = $tanaman->stok + $req->jumlah;
        $tanaman->update();

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Panen::where('uuid', $uuid)->first();

        return view('admin.panen.show', compact('data', 'bahan'));
    }

    public function edit($uuid)
    {
        $data = Panen::where('uuid', $uuid)->first();
        $tanaman = Tanaman::orderBy('id', 'desc')->get();
        $penanaman = Penanaman::orderBy('id', 'desc')->get();

        return view('admin.panen.edit', compact('data', 'penanaman', 'tanaman'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Panen::where('uuid', $uuid)->first();

        $data->fill($req->all())->save();

        return redirect()->route('panenIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Panen::where('uuid', $uuid)->first()->delete();

        return redirect()->route('panenIndex')->withSuccess('Data berhasil dihapus');
    }

    public function filter()
    {
        
        return view('admin.panen.filter');
    }
}
