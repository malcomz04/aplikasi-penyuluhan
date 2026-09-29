<?php

namespace App\Http\Controllers;

use App\Bahan;
use App\Penanaman;
use Illuminate\Http\Request;

class penanamanController extends Controller
{
    public function index()
    {
        $data = Penanaman::orderBy('id', 'desc')->get();
        return view('admin.penanaman.index', compact('data'));
    }

    public function store(Request $req)
    {
        $data = Penanaman::create($req->all());

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Penanaman::where('uuid', $uuid)->first();
        $bahan = Bahan::orderBy('nama_bahan', 'asc')->get();

        return view('admin.penanaman.show', compact('data', 'bahan'));
    }

    public function edit($uuid)
    {
        $data = Penanaman::where('uuid', $uuid)->first();

        return view('admin.penanaman.edit', compact('data'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Penanaman::where('uuid', $uuid)->first();

        $data->fill($req->all())->save();

        return redirect()->route('lahanShow', ['uuid' => $data->lahan->uuid])->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Penanaman::where('uuid', $uuid)->first()->delete();

        return redirect()->route('penanamanIndex')->withSuccess('Data berhasil dihapus');
    }
}
