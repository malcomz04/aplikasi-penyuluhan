<?php

namespace App\Http\Controllers;

use App\Evaluasi;
use Illuminate\Http\Request;

class evaluasiController extends Controller
{
    public function index()
    {
        $data = Evaluasi::orderBy('id', 'desc')->get();
        return view('admin.evaluasi.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new evaluasi;
        $data->kode_evaluasi = $request->kode_evaluasi;
        $data->nama_evaluasi = $request->nama_evaluasi;
        $data->keterangan = $request->keterangan;

        $data->save();

        return redirect()->route('evaluasiIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($uuid)
    {
        $data = evaluasi::where('uuid', $uuid)->first();
        return view('admin.evaluasi.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = evaluasi::where('uuid', $uuid)->first();
        $data->kode_evaluasi = $request->kode_evaluasi;
        $data->nama_evaluasi = $request->nama_evaluasi;
        $data->keterangan = $request->keterangan;

        $data->update();

        return redirect()->route('evaluasiIndex')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($uuid)
    {
        $evaluasi = evaluasi::where('uuid', $uuid)->first()->delete();

        return redirect()->route('evaluasiIndex')->with('success', 'Berhasil menghapus data');

    }
}
