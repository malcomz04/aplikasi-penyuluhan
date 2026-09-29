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
    td {
        border: 1px solid black;
    }

    th {
        text-align: center;
    }

    td {
        text-align: center;
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
        margin-left: 70%;
        text-align: center;
        text-transform: uppercase;
    }

    .text-right {
        text-align: right;
    }

    .isi {
        padding: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="isi">
            <h3 style="text-align:center;">DATA PESERTA PELATIHAN</h3>
            <table class="table zero-configuration">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Pelatihan</th>
                        <th>Nama</th>
                        <th>Nomor SPT</th>
                        <th>Tanggal SPT</th>
                        <th>Nomor Ktp</th>
                        <th>Jenis Kelamin</th>
                        <th>Tempat Tanggal lahir</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->pelatihan->nama_pelatihan}}</td>
                        <td>{{$d->nama_peserta}}</td>
                        <td>{{$d->no_spt}}</td>
                        <td>{{carbon\carbon::parse($d->tgl_spt)->translatedFormat('d F Y')}}
                        </td>
                        <td>{{$d->NIK}}</td>
                        <td>
                            @if($d->jk == 1)
                            Laki-laki
                            @else
                            Perempuan
                            @endif
                        </td>
                        <td>{{$d->tempat_lahir}},
                            {{carbon\carbon::parse($d->tgl_spt)->translatedFormat('d F Y')}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
            <br>

        </div>
</body>

</html>