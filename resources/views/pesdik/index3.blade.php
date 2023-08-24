@extends('layouts.master')
@section('title','SMPN 2 Kunjang Site')
@section('content')
<br>
<div class="container ">
    @if(Session::has('sucess'))
    <div class="alert alert-sucess " role="alert">
        {{Session::get('sucess')}}</div>
        @endif
      <div class="row ">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading " >
                    <h4>Data Pendaftaran</h4>
                    <form action="{{route('pesdik.index2')}}" method="GET">
                    <div class="row">
                        <div class="col-md-9">
                        <a href="{{route('pdfPesdik')}}" class="btn btn-secondary pull-right" target="_blank"><i class="fas fa-download"></i> PDF</a>
                            <a href="{{route('excel')}}" class="btn btn-secondary pull-right"><i class="fas fa-download"></i> Excel</a> 
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" type="options" name="tahun_ajaran" id="tahun_ajaran">
                                <option value="">Tahun Ajaran</option>
                                <option value="2022/2023" @if ($ta=="2022/2023") selected @endif>2022/2023</option>
                                <option value="2021/2022" @if ($ta=="2021/2022") selected @endif>2021/2022</option>              
                            </select>
                        </div>

                    </div>
                    </form>
                </div>
                <div class="panel-body py-3">
                    <table class="table table-bordered table-striped" id="table-pesdik">
                        <thead>
                            <tr>
                            <form method="POST">
                                <th style="width:5%; text-align: center">No</th>
                                <th style="width:12%; text-align: center">NIS</th>
                                <th style="width:12%; text-align: center">Nama</th>
                                <th style="width:12%; text-align: center">Jenis Kelamin</th>
                                <th style="width:12%; text-align: center">Alamat</th>
                                <th style="width:12%; text-align: center">Tanggal Lahir</th>
                                <th style="width:12%; text-align: center">Tahun Ajaran</th>
                                <th style="width:12%; text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataPesdik as $data)
                            <tr>
                                <td style="text-align: center"> {{ $loop->iteration }}</td>
                                <td style="text-align: center"> {{ $data->nis }}</td>
                                 <td style="text-align: center"> {{ $data->nama }}</td>
                                 <td style="text-align: center"> {{ $data->jk }}</td>
                                 <td style="text-align: center"> {{ $data->alamat }}</td>
                                 <td style="text-align: center"> {{ $data->ttl }}</td>
                                 <td  style="text-align: center"> {{ $data->tahun_ajaran }}</td>
                                 <td style="text-align: center"> <a href="{{ url('/pesdik/'. $data->nis .'/view') }}">
                                <button  type="button" class="badge btn btn-success mx-1 border-0">Detail </button>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

</div>

@stop
@push('scripts')
<script>
$(function() {
$('#table-pesdik').DataTable();
});

</script>

@endpush

