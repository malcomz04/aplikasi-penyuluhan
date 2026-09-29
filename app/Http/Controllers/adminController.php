<?php

namespace App\Http\Controllers;

use App\Pelatihan;
use App\Berita;
use App\Lahan;
use App\Penjualan;
use App\Tanaman;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function depan()
    {
        $berita = Berita::all();
        return view('welcome',compact('berita'));
    }
    public function index()
    {
        $pelatihan = Pelatihan::all();
        $lahan     = Lahan::all();
        $tanaman   = Tanaman::all();
        $penjualan = Penjualan::all();
        return view('admin.index',compact('pelatihan','lahan','tanaman','penjualan'));
    }

    public function userIndex()
    {
        $pelatihan = Pelatihan::all();
        return view('user.index',compact('pelatihan'));
    }
}