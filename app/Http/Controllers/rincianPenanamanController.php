<?php

namespace App\Http\Controllers;

use App\Bahan;
use App\Rincian_penanaman;
use Illuminate\Http\Request;

class rincianPenanamanController extends Controller
{
    public function index()
    {
        $data = Rincian_penanaman::orderBy('id', 'desc')->get();
        return view('admin.rincianPenanaman.index', compact('data'));
    }

    public function store(Request $req)
    {
        $data = Rincian_penanaman::create($req->all());

        $bahan = Bahan::findOrFail($req->bahan_id);
        $bahan->stok = $bahan->stok - $req->jumlah;
        $bahan->update();

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function edit($uuid)
    {
        $data = Rincian_penanaman::where('uuid', $uuid)->first();
        $bahan = Bahan::orderBy('nama_bahan', 'asc')->get();

        return view('admin.rincianPenanaman.edit', compact('data', 'bahan'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Rincian_penanaman::where('uuid', $uuid)->first();

        $data->fill($req->all())->save();
 
        return redirect()->route('penanamanShow', ['uuid' => $data->penanaman->uuid])->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Rincian_penanaman::where('uuid', $uuid)->first()->delete();

        return redirect()->back()->withSuccess('Data berhasil dihapus');
    }
}
