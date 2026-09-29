<?php

namespace App\Http\Controllers;

use App\Lahan;
use Illuminate\Http\Request;

class lahanController extends Controller
{
    public function index()
    {
        $data = Lahan::orderBy('id', 'desc')->get();
        return view('admin.lahan.index', compact('data'));
    }

    public function store(Request $req)
    {
        $data = Lahan::create($req->all());

        return redirect()->back()->withSuccess('Data berhasil disimpan');
    }

    public function show($uuid)
    {
        $data = Lahan::where('uuid', $uuid)->first();
        return view('admin.lahan.show', compact('data'));
    }

    public function edit($uuid)
    {
        $data = Lahan::where('uuid', $uuid)->first();

        return view('admin.lahan.edit', compact('data'));
    }

    public function update(Request $req, $uuid)
    {
        $data = Lahan::where('uuid', $uuid)->first();

        $data->fill($req->all())->save();

        return redirect()->route('lahanIndex')->withSuccess('Data berhasil diubah');
    }

    public function destroy($uuid)
    {
        $data = Lahan::where('uuid', $uuid)->first()->delete();

        return redirect()->route('lahanIndex')->withSuccess('Data berhasil dihapus');
    }

    public function filter($uuid)
    {
        $data = Lahan::where('uuid', $uuid)->first();
        return view('admin.lahan.filter', compact('data'));
    }

}
