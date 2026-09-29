<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class kecamatanController extends Controller
{
    public function index()
    {
        $data = User::where('role', 1)->orderBy('id', 'desc')->get();
        return view('admin.kecamatan.index', compact('data'));
    }

    public function profil()
    {   
        $data = User::findOrFail(Auth::user()->id);
        return view('user.profil',compact('data'));
    }

    public function store(Request $request)
    {
        $data = new User;
        $data->nama = $request->nama;
        $data->username = $request->username;
        $data->password = Hash::make($request->password);
        if ($request->foto != null) {
            $img = $request->file('foto');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $request->nama;
            $foto = $FotoName . '.' . $FotoExt;
            $img->move('images/user', $foto);
            $data->foto = $foto;
        } else {
            $data->foto = 'default.jpg';
        }
        $data->role = 1;

        $data->save();

        $kecamatan = new Kecamatan;
        $kecamatan->user_id = $data->id;
        $kecamatan->kecamatan = $request->kecamatan;

        $kecamatan->save();

        return redirect()->route('kecamatanIndex')->with('success', 'Data Berhasil Disimpan');
    }

    public function edit($uuid)
    {
        $data = User::where('uuid', $uuid)->first();
        return view('admin.kecamatan.edit', compact('data'));
    }

    public function update(Request $request, $uuid)
    {
        $data = User::where('uuid', $uuid)->first();
        $data->nama = $request->nama;
        $data->username = $request->username;
        if (isset($request->password)) {
            $data->password = Hash::make($request->password);
        } else {
            $data->password = $data->password;
        }

        if ($request->foto != null) {
            $img = $request->file('foto');
            $FotoExt = $img->getClientOriginalExtension();
            $FotoName = $request->nama;
            $foto = $FotoName . '.' . $FotoExt;
            $img->move('images/user', $foto);
            $data->foto = $foto;
        } else {
            $data->foto = $data->foto;
        }

        $data->update();

        $kecamatan = Kecamatan::where('id', $data->kecamatan->id)->first();
        $kecamatan->user_id = $data->id;
        $kecamatan->kecamatan = $request->kecamatan;

        $kecamatan->update();

        return redirect()->route('kecamatanIndex')->with('success', 'Data Berhasil Diubah');
    }

    public function destroy($uuid)
    {
        $user = User::where('uuid', $uuid)->first()->delete();

        return redirect()->route('kecamatanIndex')->with('success', 'Berhasil menghapus data');

    }
}
