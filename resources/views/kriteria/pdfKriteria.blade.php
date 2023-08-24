<html>
    <head>
        <title>Cetak PDF</title>
        <link rel="shortcut icon" href="{{asset('AdminLTE-3.2.0')}}/dist/img/logo.png" type="image/x-icon">
    </head>
    <body>
        <style type="text/css">
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
        <h4 align="center">Data Pendaftaran Siswa SMPN 2 KUNJANG</h4>
            <table class="table1">
                <thead>
                    <tr>
                                <th style="width:5%">No</th>
                                <th style="width:12%">Kode Kriteria</th>
                                <th style="width:12%">Kriteria</th>
                                <th style="width:12%">Subkriteria</th>
                                <th style="width:12%">Bobot Kriteria</th>
                                <th style="width:12%">Atribut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKriteria as $data)
                            <tr>
                                <td> {{ $loop->iteration }}</td>
                                <td> {{ $data->kode_kriteria }}</td>
                                <td> {{ $data->kriteria }}</td>
                                <td> {{ $data->subkriteria }}</td>
                                <td> {{ $data->bobot_kriteria }}</td>
                                <td> {{ $data->jenis_atribut }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <script type="text/javascript">
                        window.print();
                    </script>
            </body>
        </html>