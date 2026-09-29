<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    h4,
    h2 {
        font-family: serif;
    }

    body {
        font-family: sans-serif;
    }

    table {
        border-collapse: collapse;
        width: 100%;
    }

    table,
    th,
    td {}

    th {
        background-color: #708090;
        text-align: center;
        color: white;
    }

    td {
        text-align: left;
    }

    br {
        margin-bottom: 5px !important;
    }

    .judul {
        text-align: center;
    }

    .header {
        margin-bottom: 0px;
        text-align: center;
        height: 150px;
        padding: 0px;
    }

    .pemko {
        width: 150px;
    }

    .logo {
        float: left;
        margin-right: 0px;
        width: 15%;
        padding: 0px;
        text-align: right;
    }

    .headtext {
        float: right;
        margin-left: 0px;
        width: 75%;
        padding-left: 0px;
        padding-right: 10%;
    }

    hr {
        margin-top: 10%;
        height: 4px;
        background-color: black;
        width: 100%;
    }

    .ttd {
        margin-left: 50%;
        text-align: center;
        text-transform: uppercase;
    }

    .text-right {
        text-align: right;
    }

    .isi {
        padding: 10px;
    }

    .page-break {
        page-break-before: always;
    }
    </style>
</head>

<body>
    <div class="header">

        <div class="container">
            <div class="isi">
                <h3 style="text-align:center;">DETAIL PELATIHAN</h3>
                <table>
                    <tr>
                        <td style="width:100px !important;">Nomor</td>
                        <td>:</td>
                    </tr>
                    <tr>
                        <td style="width:100px !important;">Lampiran</td>
                        <td>:</td>
                    </tr>
                    <tr>
                        <td style="width:100px !important;">Perihal</td>
                        <td>: Pelaksanaan Pelatihan</td>
                    </tr>
                </table>
                <p style="text-align:justify;">dengan ini memberitahukan mengenai pelaksanaan Pelatihan
                    {{$data->nama_pelatihan}} yang diselenggarakan oleh
                    Dinas Pertanian, dengan peserta usulan dari setiap Kelompom Tani. Adapun rincian usulan pelaksanaan
                    sebagai berikut : </p>
                <table>
                    <tr>
                        <td style="width:150px !important;">Nama Pelatihan</td>
                        <td>: {{$data->nama_pelatihan}}</td>
                    </tr>
                    <tr>
                        <td style="width:150px !important;">Nama narasumber</td>
                        <td>: -</td>
                    </tr>
                    <tr>
                        <td style="width:100px !important;">uraian</td>
                        <td>
                            <p style="text-align:justify;">: {{$data->uraian}}</p>
                        </td>
                    </tr>
                    <tr>
                        <td style="width:100px !important;">Pelaksanaan</td>
                        <td>: {{carbon\carbon::parse($data->tgl_mulai)->translatedFormat('d F Y')}} -
                            {{carbon\carbon::parse($data->tgl_selesai)->translatedFormat('d F Y')}}</td>
                    </tr>
                </table>
                <p style="text-align:justify;">Sebagai upaya agar kegitan pelatihan {{$data->nama_pelatihan}} berjalan
                    lancar, terlampir kami sampaikan Daftar Peserta yang mengikuti pelatihan ini : </p>
                <p> Demikian pemberitahuan ini disampaikan. Atas perhatiannya, kami ucapkan terima kasih. </p>

                <div class="page-break"></div>
                <table>
                    <tr>
                        <td style="width:100px !important;">Lampiran</td>
                        <td>: Peserta Pelatihan</td>
                    </tr>
                </table>
                <br>
                <h3 style="text-align:center;">PESERTA PELATIHAN</h3>
                <table class=" zero-configuration" style="border: 1px solid black;">
                    <thead style="border: 1px solid black;">
                        <tr style="border: 1px solid black;">
                            <th style="border: 1px solid black;">No</th>
                            <th style="border: 1px solid black;">Pelatihan</th>
                            <th style="border: 1px solid black;">Nama</th>
                            <th style="border: 1px solid black;">Nomor SPT</th>
                            <th style="border: 1px solid black;">Tanggal SPT</th>
                            <th style="border: 1px solid black;">Nomor Ktp</th>
                            <th style="border: 1px solid black;">Jenis Kelamin</th>
                            <th style="border: 1px solid black;">Tempat Tanggal lahir</th>
                        </tr>
                    </thead>
                    <tbody style="border: 1px solid black;">
                        @foreach($data->peserta as $d)
                        <tr style="border: 1px solid black;">
                            <td style="border: 1px solid black;">{{$loop->iteration}}</td>
                            <td style="border: 1px solid black;">{{$d->pelatihan->nama_pelatihan}}</td>
                            <td style="border: 1px solid black;">{{$d->nama_peserta}}</td>
                            <td style="border: 1px solid black;">{{$d->no_spt}}</td>
                            <td style="border: 1px solid black;">
                                {{carbon\carbon::parse($d->tgl_spt)->translatedFormat('d F Y')}}
                            </td>
                            <td style="border: 1px solid black;">{{$d->NIK}}</td>
                            <td style="border: 1px solid black;">
                                @if($d->jk == 1)
                                Laki-laki
                                @else
                                Perempuan
                                @endif
                            </td>
                            <td style="border: 1px solid black;">{{$d->tempat_lahir}},
                                {{carbon\carbon::parse($d->tgl_spt)->translatedFormat('d F Y')}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

</body>

</html>