<?php

namespace App\Http\Controllers;

use App\Bahan;
use App\Evaluasi;
use PDF;
use App\Kecamatan;
use App\Lahan;
use App\Modul;
use App\Panen;
use App\Pelatihan;
use App\Pembelian_bahan;
use App\Penanaman;
use App\Penjualan;
use App\Peserta;
use App\Rincian_penanaman;
use App\Tanaman;
use Carbon\Carbon;

use Illuminate\Http\Request;

class reportController extends Controller
{
    public function kecamatanCetak()
    {
        $data         = Kecamatan::all();
        $pdf          = PDF::loadView('formCetak.dataKecamatan', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Kecamatan.pdf');
    }

    public function evaluasiCetak()
    {
        $data         = Evaluasi::all();
        $pdf          = PDF::loadView('formCetak.formEvaluasi', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Form Evaluasi.pdf');
    }

    public function pelatihanCetak()
    {
        $data         = Pelatihan::all();
        $pdf          = PDF::loadView('formCetak.dataPelatihan', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Pelatihan.pdf');
    }

    public function detailPelatihanCetak($uuid)
    {
        $data         = Pelatihan::where('uuid',$uuid)->first();
        $pdf          = PDF::loadView('formCetak.detailPelatihan', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Pelatihan.pdf');
    }

    public function modulCetak()
    {
        $data         = Modul::all();
        $pdf          = PDF::loadView('formCetak.dataModul', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Modul.pdf');
    }

    public function bahanCetak()
    {
        $data         = Bahan::all();
        $pdf          = PDF::loadView('formCetak.dataBahan', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Bahan.pdf');
    }

    public function pembelianCetak()
    {
        $data         = Pembelian_bahan::all();
        $pdf          = PDF::loadView('formCetak.dataPembelian', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Pembelian.pdf');
    }

    public function lahanCetak()
    {
        $data         = Lahan::all();
        $pdf          = PDF::loadView('formCetak.dataLahan', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Lahan.pdf');
    }

    public function penanamanCetak($uuid)
    {
        $lahan        = Lahan::where('uuid',$uuid)->first();
        $data         = Penanaman::where('lahan_id',$lahan->id)->get();
        $pdf          = PDF::loadView('formCetak.dataPenanaman', ['data'=>$data,'lahan'=>$lahan]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Penanaman.pdf');
    }

    public function rincianPenanamanCetak($uuid)
    {
        $penanaman    = Penanaman::where('uuid',$uuid)->first();
        $data         = Rincian_penanaman::where('penanaman_id',$penanaman->id)->get();
        $pdf          = PDF::loadView('formCetak.dataRincianPenanaman', ['data'=>$data,'penanaman'=>$penanaman]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Rincian Penanaman.pdf');
    }

    public function tanamanCetak()
    {
        $data         = Tanaman::all();
        $pdf          = PDF::loadView('formCetak.dataTanaman', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Tanaman.pdf');
    }

    public function panenCetak()
    {
        $data         = Panen::all();
        $pdf          = PDF::loadView('formCetak.dataPanen', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Panen Tanaman.pdf');
    }

    public function penjualanCetak()
    {
        $data         = Penjualan::all();
        $pdf          = PDF::loadView('formCetak.dataPenjualan', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Penjualan.pdf');
    }

    public function pesertaCetak()
    {
        $data         = Peserta::all();
        $pdf          = PDF::loadView('formCetak.dataPeserta', ['data'=>$data]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Peserta.pdf');
    }

    public function pesertaFilter()
    {
        $pelatihan    = Pelatihan::findOrFail(request()->pelatihan_id);
        $data         = Peserta::where('pelatihan_id',request()->pelatihan_id)->get();
        $pdf          = PDF::loadView('formCetak.dataPesertaFilter', ['data'=>$data, 'pelatihan'=>$pelatihan]);
        $pdf->setPaper('a4', 'portrait');

        return $pdf->stream('Laporan Data Peserta Filter.pdf');
    }

    public function panenFilter(Request $request){
        $data = Panen::whereBetween('tanggal', [$request->tgl_mulai, $request->tgl_akhir])->get();
        $tgl_mulai = $request->tgl_mulai;
        $tgl_akhir = $request->tgl_akhir;
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('formCetak.filterPanen', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_akhir'=>$tgl_akhir]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan data Filter Panen .pdf');
    }

    public function penjualanFilter(Request $request){
        $data = Penjualan::whereBetween('tanggal', [$request->tgl_mulai, $request->tgl_akhir])->get();
        $tgl_mulai = $request->tgl_mulai;
        $tgl_akhir = $request->tgl_akhir;
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('formCetak.filterPenjualan', ['data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_akhir'=>$tgl_akhir]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan data Filter Penjualan .pdf');
    }

    public function penanamanFilter(Request $request,$uuid){
        $lahan = Lahan::where('uuid',$uuid)->first();
        $data = Penanaman::where('lahan_id',$lahan->id)->whereBetween('tanggal', [$request->tgl_mulai, $request->tgl_akhir])->get();
        $tgl_mulai = $request->tgl_mulai;
        $tgl_akhir = $request->tgl_akhir;
        $tgl= Carbon::now()->format('d-m-Y');
        $pdf =PDF::loadView('formCetak.filterPenanaman', ['lahan'=>$lahan,'data'=>$data,'tgl'=>$tgl,'tgl_mulai'=>$tgl_mulai,'tgl_akhir'=>$tgl_akhir]);
        $pdf->setPaper('a4', 'landscape');
        return $pdf->stream('Laporan data Filter Penjualan .pdf');
    }

}
