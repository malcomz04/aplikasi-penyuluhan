<?php

namespace App\Http\Controllers;

use App\Bahan;
use App\Pembelian_bahan;
use Illuminate\Http\Request;

class pembelianBahanController extends Controller
{
    public function index()
    {
        $data = Pembelian_bahan::orderBy('id', 'desc')->get();
        $bahan = Bahan::orderBy('nama_bahan', 'asc')->get();
        return view('admin.pembelianBahan.index', compact('data', 'bahan'));
    }

    public function store(Request $req)
    {
        $data = Pembelian_bahan::create($req->all());

        $bahan = Bahan::findOrFail($req->bahan_id);
        $bahan->stok = $bahan->stok + $req->jumlah;
        $bahan->update();

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Pembelian_bahan::where('uuid', $uuid)->first();

        $bahan = Bahan::orderBy('nama_bahan', 'asc')->get();
        return view('admin.pembelianBahan.edit', compact('data', 'bahan'));

    }

    public function update(Request $req, $uuid)
    {
        $data = Pembelian_bahan::where('uuid', $uuid)->first();

        $data->fill($req->all())->save();

        return redirect()->route('pembelianBahanIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Pembelian_bahan::where('uuid', $uuid)->first()->delete();

        return redirect()->route('pembelianBahanIndex')->withSuccess('Data berhasil dihapus');
    }
}
