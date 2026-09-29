<?php

namespace App\Http\Controllers;

use App\Tanaman;
use Illuminate\Http\Request;

class tanamanController extends Controller
{
    public function index()
    {
        $data = Tanaman::orderBy('id', 'desc')->get();
        return view('admin.tanaman.index', compact('data'));
    }

    public function store(Request $req)
    {
        $data = Tanaman::create($req->all());

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Tanaman::where('uuid', $uuid)->first();

        return view('admin.tanaman.show', compact('data', 'bahan'));
    }

    public function edit($uuid)
    {
        $data = Tanaman::where('uuid', $uuid)->first();

        return view('admin.tanaman.edit', compact('data'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Tanaman::where('uuid', $uuid)->first();

        $data->fill($req->all())->save();

        return redirect()->route('tanamanIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Tanaman::where('uuid', $uuid)->first()->delete();

        return redirect()->route('tanamanIndex')->withSuccess('Data berhasil dihapus');
    }
}
