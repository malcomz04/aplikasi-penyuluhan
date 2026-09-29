<?php

namespace App\Http\Controllers;

use App\Modul;
use Illuminate\Http\Request;

class modulController extends Controller
{
    public function index()
    {
        $data = Modul::orderBy('id', 'desc')->get();
        return view('admin.modul.index', compact('data'));
    }

    public function preview($uuid)
    {
        $data = modul::where('uuid', $uuid)->first();
        $pathToFile = base_path() . '/public/modul/' . $data->file;

        return response()->file($pathToFile);
    }

    public function store(Request $request)
    {
        $data = new modul;
        $data->kode_modul = $request->kode_modul;
        $data->judul = $request->judul;
        if ($request->file != null) {
            $img = $request->file('file');
            $fileExt = $img->getClientOriginalExtension();
            $fileName = $request->kode_modul;
            $file = $fileName . '.' . $fileExt;
            $img->move('modul', $file);
            $data->file = $file;
        }

        $data->save();

        return redirect()->route('modulIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($uuid)
    {
        $data = modul::where('uuid', $uuid)->first();
        return view('admin.modul.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = modul::where('uuid', $uuid)->first();
        $data->kode_modul = $request->kode_modul;
        $data->judul = $request->judul;
        if ($request->file != null) {
            $img = $request->file('file');
            $fileExt = $img->getClientOriginalExtension();
            $fileName = $request->kode_modul;
            $file = $fileName . '.' . $fileExt;
            $img->move('modul', $file);
            $data->file = $file;
        } else {
            $data->file = $data->file;
        }

        $data->update();

        return redirect()->route('modulIndex')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($uuid)
    {
        $modul = modul::where('uuid', $uuid)->first()->delete();

        return redirect()->route('modulIndex')->with('success', 'Berhasil menghapus data');

    }
}
