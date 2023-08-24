<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @foreach ($dataHasil as $data)
    <style>
        .garis-horizontal {
            border-top: 1px solid black;
            margin-top: 20px;
        }
        
        .garis-horizontal::before,
        .garis-horizontal::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            height: 1px;
            background-color: black;
        }

        .garis-horizontal::before {
            top: -1px;
        }

        .garis-horizontal::after {
            bottom: -1px;
        }
        .table1{
                font-family: sans-serif;
                color:#232323;
                border-collapse: collapse;
            }
            .table1, th, td{
                border: 1px  solid #999;
                padding: 8px 20px;
            }
    </style>
    @endforeach
</head>
<body>
<table border="0" align="center">
    <td><img src="{{asset('AdminLTE-3.2.0')}}/dist/img/logo4.png" width="110" height="120"></td>
<td><center>
   <b><font size="5">PEMERINTAH KABUPATEN KEDIRI</font><br>
   <b> <font size="5">DINAS PENDIDIKAN PEMUDA DAN OLAHRAGA</font><br>
    <font size="4">UPT SMP NEGERI 2 KUNJANG</font><br></b>
    <font size="3">Jl Raya Kunjang - Badas No 263, Kuwik, Kunjang Kab. Kediri Telp : (0354) 393127</font><br>
    <font size="3">Website http://www.smpn2kunjangkabkediri.sch.id E-mail : info@smpn2kunjangkabkediri.sch.id</font><br>
<b><font size="4">K E D I R I</font>&ensp; Kode Pos 64156</b>
<br>
</table>
</center>
    <div class="garis-horizontal"></div>
    <br>
<table>
<center><b><font size="4">P E N G U M U M A N</font><br></b> 
<font size="3">NOMOR : / 2023</font><br></b>
<font size="3">TENTANG <br> SELEKSI INTERNAL PENERIMAAN CALON PESERTA BEASISWA</font><br></b>
</center>
<br>
<br>
<h4>Data Normalisasi Hasil Matriks Keputusan</h4>
                    <table class="table table-bordered table-striped" id="example2">
                    <thead>
                            <tr>
                            <center>
                                <th style="width:5%; text-align:center" rowspan="2">No</th>
                                <th style="width:12%; text-align:center" rowspan="2">Kode Alternatif</th>
                                <th style="width:12%; text-align:center" rowspan="2">NIS</th>
                                <th style="width:12%; text-align:center" rowspan="2">Nama</th>
                                <th style="width:12%; text-align:center" colspan="5">Matriks Keputusan</th>
                            </tr>
                            <tr>
                                <th style="width:12%; text-align:center">Riwayat Bantuan</th>
                                <th style="width:12%; text-align:center">Pekerjaan Orangtua</th>
                                <th style="width:12%; text-align:center">Penghasilan Orangtua</th>
                                <th style="width:12%; text-align:center">Jumlah Tanggungan Orangtua</th>
                                <th style="width:12%; text-align:center">Nilai</th>
                                </center>
                            </tr>
                        </thead>   
                        <tbody>
                            @foreach ($dataHasil as $data)
                            <tr>
                                <td style="text-align: center"> {{ $loop->iteration }}</td>
                                <td style="text-align: center"> {{ $data->kode_alternatif }}</td>
                                <td style="text-align: center"> {{ $data->nis }}</td>
                                <td style="text-align: center"> {{ $data->nama }}</td>
                                <td style="text-align: center"> {{ $data->c1 }}</td>
                                <td style="text-align: center"> {{ $data->c2 }}</td>
                                <td style="text-align: center"> {{ $data->c3 }}</td>
                                <td style="text-align: center"> {{ $data->c4 }}</td>
                                <td style="text-align: center"> {{ $data->c5 }}</td>
                            </tr>
                            @endforeach
                        </tbody>              
                    </table>

                    <h4>Data Preferensi Nilai</h4>
                    <table class="table table-bordered table-striped" id="example2">
                    <thead>
                            <tr>
                            <center>
                                <th style="width:5%; text-align:center" rowspan="2">No</th>
                                <th style="width:12%; text-align:center" rowspan="2">Kode Alternatif</th>
                                <th style="width:12%; text-align:center" rowspan="2">NIS</th>
                                <th style="width:12%; text-align:center" rowspan="2">Nama</th>
                                <th style="width:12%; text-align:center" colspan="5">Nilai Preferensi</th>
                            </tr>
                            <tr>
                                <th style="width:12%; text-align:center">Riwayat Bantuan</th>
                                <th style="width:12%; text-align:center">Pekerjaan Orangtua</th>
                                <th style="width:12%; text-align:center">Penghasilan Orangtua</th>
                                <th style="width:12%; text-align:center">Jumlah Tanggungan Orangtua</th>
                                <th style="width:12%; text-align:center">Nilai</th>
                                </center>
                            </tr>
                        </thead>   
                        <tbody>

                            @foreach ($dataHasil as $data)
                            <tr>
                                <td style="text-align: center"> {{ $loop->iteration }}</td>
                                <td style="text-align: center"> {{ $data->kode_alternatif }}</td>
                                <td style="text-align: center"> {{ $data->nis }}</td>
                                <td style="text-align: center"> {{ $data->nama }}</td>
                                <td style="text-align: center"> {{ $data->bobotc1 }}</td>
                                <td style="text-align: center"> {{ $data->bobotc2 }}</td>
                                <td style="text-align: center"> {{ $data->bobotc3 }}</td>
                                <td style="text-align: center"> {{ $data->bobotc4 }}</td>
                                <td style="text-align: center"> {{ $data->bobotc5 }}</td>

                                @endforeach

                            </tr>
                        </tbody>              
                    </table>
                <div class="panel-body py-3">
                <h4>Data Hasil Pemeringkatan Seleksi</h4>
                    <table class="table table-bordered table-striped" id="example2">
                        <thead>
                            <tr>
                            <form method="POST">
                                <th style="width:5%">No</th>
                                <th style="text-align: center">Kode Alternatif</th>
                                <th style="text-align: center">NIS</th>
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center">Alamat</th>
                                <th style="text-align: center">Kelas</th>
                                <th style="text-align: center">Tahun Ajaran</th>
                                <th style="text-align: center">Jenis Kelamin</th>
                                <th style="text-align: center">Nilai Rangking</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataHasil as $data)
                            <tr>
                                <td style="text-align: center"> {{ $loop->iteration }}</td>
                                <td style="text-align: center"> {{ $data->kode_alternatif }}</td>
                                <td style="text-align: center"> {{ $data->nis }}</td>
                                <td style="text-align: center"> {{ $data->nama}}</td>
                                <td style="text-align: center"> {{ $data->alamat}}</td>
                                <td style="text-align: center"> {{ $data->kelas}}</td>
                                <td style="text-align: center"> {{ $data->tahun_ajaran}}</td>
                                <td style="text-align: center"> {{ $data->jk}}</td>
                                <td style="text-align: center"> {{ $data->nilai_rangking}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    

            
                    <script type="text/javascript">
                        window.print();
                    </script>
            </body>
        </html>