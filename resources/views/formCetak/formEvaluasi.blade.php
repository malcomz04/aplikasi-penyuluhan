<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    h4,h2{
        font-family:serif;
    }
        body{
            font-family:sans-serif;
        }
        table{
        border-collapse: collapse;
        width:100%;
      }
      table, th, td{
        border: 1px solid black;
      }
      th{
        text-align: center;
      }
      td{
        text-align: center;
      }
      br{
          margin-bottom: 5px !important;
      }
     .judul{
         text-align: center;
     }
     .header{
         margin-bottom: 0px;
         text-align: center;
         height: 150px;
         padding: 0px;
     }
     .pemko{
         width:150px;
     }
     .logo{
         float: left;
         margin-right: 0px;
         width: 15%;
         padding:0px;
         text-align: right;
     }
     .headtext{
         float:right;
         margin-left: 0px;
         width: 75%;
         padding-left:0px;
         padding-right:10%;
     }
     hr{
         margin-top: 10%;
         height: 4px;
         background-color: black;
         width:100%;
     }
     .ttd{
         margin-left:70%;
         text-align: center;
         text-transform: uppercase;
     }
     .text-right{
         text-align:right;
     }
     .isi{
         padding:10px;
     }
    </style>
</head>
<body>
<div class="header">
            <div class="logo">
                    <img  class="pemko" src="depan/img/logo.png">
            </div>
            <div class="headtext">
                <h4 style="margin:0px;">PEMERINTAH PROVINSI KALIMANTAN </h4>
                <h3 style="margin:0px; text-transform:uppercase;">Balai Pelatihan dan Penerapan Teknologi Pertanian (BP2TP) Provinsi Kalimantan Selatan</h3>
                <p style="margin:0px;">Jalan Jendral Ahmad Yani KM.51 Kecamatan Tambang Ulang, Kabupaten Tanah Laut</p>
                <p style="margin:0px;">Email: bp2tp.provkalsel@gmail.com </p>
            </div>
            <br>
    </div>
    <hr style="margin-top:1px;">
    <div class="container">
        <div class="isi">
            <h2 style="text-align:center;">FORM EVALUASI</h2>
            <table class="table table-hover" id="myTable">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Evaluasi</th>
                            <th>Nama Evaluasi</th>
                            <th>Keterangan</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $d)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$d->kode_evaluasi}}</td>
                                    <td>{{$d->nama_evaluasi}}</td>
                                    <td>{{$d->keterangan}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                      <br>
                      <br>
                      <div class="ttd">
                        <h5> <p> Kabupaten Tanah Laut, </p></h5>
                       <h6>Mengetahui</h6>
                      <h5>Kepala Balai Pelatihan dan Penerapan Teknologi Pertanian </h5>
                      <br>
                      <br>
                      <h5 style="text-decoration:underline;">Dr. Muhammad Yasin, MP</h5>
                      <h5>NIP. 19580726 1984 03 1 007</h5>
                      </div>
                    </div>
             </div>
         </body>
</html>