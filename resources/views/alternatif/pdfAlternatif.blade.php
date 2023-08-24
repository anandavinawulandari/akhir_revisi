<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @foreach ($dataAlternatif as $data)
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
<font size="3">TENTANG <br> DATA ALTERNATIF PENERIMAAN CALON PESERTA BEASISWA</font><br></b>
</center>
<br>
<br>
                   <table class="table1">
                <thead>
                    <tr>
                        <th style="width:5%; text-align:center" rowspan="2">No</th>
                        <th style="width:12%; text-align:center" rowspan="2">Kode Alternatif</th>
                        <th style="width:12%; text-align:center" rowspan="2">NIS</th>
                        <th style="width:12%; text-align:center" rowspan="2">Nama</th>
                        <th style="width:12%; text-align:center" colspan="5">Bobot</th>
                    </tr>
                    <tr>
                        <th style="width:12%; text-align:center">Riwayat Bantuan</th>
                        <th style="width:12%; text-align:center">Pekerjaan Orangtua</th>
                        <th style="width:12%; text-align:center">Penghasilan Orangtua</th>
                        <th style="width:12%; text-align:center">Jumlah Tanggungan Orangtua</th>
                        <th style="width:12%; text-align:center">Nilai</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataAlternatif as $data)
                    <tr>
                        <td> {{ $loop->iteration }}</td>
                        <td> {{ $data->kode_alternatif }}</td>
                        <td> {{ $data->nis }}</td>
                        <td> {{ $data->nama }}</td>
                        <td> {{ $data->bobot_riwayat }}</td>
                        <td> {{ $data->bobot_pekerjaan }}</td>
                        <td> {{ $data->bobot_penghasilan }}</td>
                        <td> {{ $data->bobot_jml_tanggungan }}</td>
                        <td> {{ $data->bobot_nilai }}</td>
                    </tr>
                    @endforeach
                </tbody>
                    </table>
                    <script type="text/javascript">
                        window.print();
                    </script>
            </body>
        </html>