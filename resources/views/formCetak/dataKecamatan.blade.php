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
        padding: 8px;
        /* Tambahkan padding agar lebih rapi */
    }

    td {
        text-align: center;
        padding: 8px;
        /* Tambahkan padding agar lebih rapi */
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
            <h3 style="text-align:center;">DATA KETUA KELOMPOK TANI</h3>
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Poktan</th>
                        <th>Username</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $d)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$d->kecamatan}}</td>
                        <td>{{$d->user->username}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            {{-- Bagian Tanggal dan Jam Cetak --}}
            <p class="text-right" style="margin-top: 15px; font-size: 12px;">
                Dicetak pada: {{ date('d-m-Y H:i:s') }}
            </p>

        </div>
    </div>
</body>

</html>