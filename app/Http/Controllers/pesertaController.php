<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Pelatihan;
use App\Peserta;
use Illuminate\Http\Request;

class pesertaController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::latest()->get();
        $pelatihan = Pelatihan::latest()->get();
        $data = Peserta::latest()->get();
        return view('admin.peserta.index', compact('data', 'kecamatan', 'pelatihan'));
    }

    public function store(Request $req)
    {
        $data = Peserta::create($req->all());

        return back()->withSuccess('Data berhasil disimpan');
    }

    public function filter()
    {
        $pelatihan = Pelatihan::latest()->get();
        return view('admin.peserta.filter', compact('pelatihan'));
    }

    public function edit($uuid)
    {
        $kecamatan = Kecamatan::latest()->get();
        $pelatihan = Pelatihan::latest()->get();
        $data = Peserta::where('uuid', $uuid)->first();
        return view('admin.peserta.edit', compact('data', 'pelatihan', 'kecamatan'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Peserta::where('uuid', $uuid)->first();
        $data->fill($req->all())->save();

        return redirect()->route('pesertaIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Peserta::where('uuid', $uuid)->first()->delete();

        return back();
    }
}
