<?php

namespace App\Http\Controllers;

use App\Penjualan;
use App\Tanaman;
use Illuminate\Http\Request;

class penjualanController extends Controller
{
    public function index()
    {
        $data = Penjualan::orderBy('id', 'desc')->get();
        $tanaman = Tanaman::orderBy('id', 'desc')->get();
        return view('admin.penjualan.index', compact('data', 'tanaman'));
    }

    public function store(Request $req)
    {
        $data = Penjualan::create($req->all());

        $tanaman = Tanaman::findOrFail($req->tanaman_id);
        $tanaman->stok = $tanaman->stok - $req->jumlah;
        $tanaman->update();

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Penjualan::where('uuid', $uuid)->first();

        return view('admin.penjualan.show', compact('data', 'bahan'));
    }

    public function edit($uuid)
    {
        $data = Penjualan::where('uuid', $uuid)->first();
        $tanaman = Tanaman::orderBy('id', 'desc')->get();

        return view('admin.penjualan.edit', compact('data', 'tanaman'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Penjualan::where('uuid', $uuid)->first();

        $data->fill($req->all())->save();

        return redirect()->route('penjualanIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Penjualan::where('uuid', $uuid)->first()->delete();

        return redirect()->route('penjualanIndex')->withSuccess('Data berhasil dihapus');
    }

    public function filter()
    {
        return view('admin.penjualan.filter');
    }
}