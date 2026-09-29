<?php

namespace App\Http\Controllers;

use App\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class beritaController extends Controller
{
    public function index()
    {
        $data = Berita::orderBy('id', 'desc')->get();
        return view('admin.berita.index', compact('data'));
    }

    public function store(Request $request)
    {
        $data = new berita;
        $data->user_id = Auth::id();
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        if ($request->foto != null) {
            $img = $request->file('foto');
            $fotoExt = $img->getClientOriginalExtension();
            $fotoName = $request->judul;
            $foto = $fotoName . '.' . $fotoExt;
            $img->move('berita', $foto);
            $data->foto = $foto;
        }

        $data->save();

        return redirect()->route('beritaIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function show($uuid)
    {
        $data = berita::where('uuid', $uuid)->first();
        return view('admin.berita.show', compact('data'));
    }

    public function edit($uuid)
    {
        $data = berita::where('uuid', $uuid)->first();
        return view('admin.berita.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = berita::where('uuid', $uuid)->first();
        $data->judul = $request->judul;
        $data->isi = $request->isi;
        if ($request->foto != null) {
            $img = $request->file('foto');
            $fotoExt = $img->getClientOriginalExtension();
            $fotoName = $request->judul;
            $foto = $fotoName . '.' . $fotoExt;
            $img->move('berita', $foto);
            $data->foto = $foto;
        } else {
            $data->foto = $data->foto;
        }

        $data->update();

        return redirect()->route('beritaIndex')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($uuid)
    {
        $berita = berita::where('uuid', $uuid)->first()->delete();

        return redirect()->route('beritaIndex')->with('success', 'Berhasil menghapus data');

    }
   public function showDepan($uuid)
{
    $berita = \App\Berita::where('uuid', $uuid)->firstOrFail();
    return view('depan.berita_detail', compact('berita'));
}

}