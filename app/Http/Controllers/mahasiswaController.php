<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\mahasiswa;
use PDF;

class mahasiswaController extends Controller
{
    public function index()
    {
        $data = mahasiswa::orderBy('id', 'desc')->get();
        return view('admin.mahasiswa.index', compact('data'));
    }

    public function store(Request $req)
    {
        $data = mahasiswa::create($req->all());

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function show($id)
    {
        $data = mahasiswa::where('id', $id)->first();

        return view('admin.mahasiswa.show', compact('data', 'bahan'));
    }

    public function edit($id)
    {
        $data = mahasiswa::where('id', $id)->first();

        return view('admin.mahasiswa.edit', compact('data'));
    }

    public function update(Request $req, $id)
    {
        $data = mahasiswa::where('id', $id)->first();

        $data->fill($req->all())->save();

        return redirect()->route('mahasiswaIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($id)
    {
        $data = mahasiswa::where('id', $id)->first()->delete();

        return redirect()->route('mahasiswaIndex')->withSuccess('Data berhasil dihapus');
    }

    public function cetak()
    {
        $data = mahasiswa::all();
        $pdf = PDF::loadView('formCetak.datamahasiswa', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data mahasiswa.pdf');
    }
}