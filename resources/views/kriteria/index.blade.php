@extends('layouts.master')
@section('title','SMPN 2 Kunjang Site')
@section('content')
<br>
<div class="container ">
    @if(Session::has('sucess'))
    <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>	
        {{Session::get('sucess')}}</div>
        @endif
      <div class="row ">
        <div class="col-md-12 ">
            <div class="panel panel-default">
                <div class="panel-heading " >
                    <h4>Data Kriteria dan Bobot</h4> 
                    <div class="row">
                        <div class="col-md-8">                       
                        <a href="{{route('pdfKriteria')}}" class="btn btn-secondary pull-right" target="_blank"><i class="fas fa-download"></i> PDF </a>
                            </div>
    
                            </form>
                </div>
                
                {{-- <a href="{{route('kriteria.create')}}" class="btn btn-success pull-right">+ Submit Data</a> --}}
            </div>
                <div class="panel-body py-3">
                    <table class="table table-bordered table-striped" id="example2">
                        <thead>
                            <tr>
                            <form method="POST">
                                <th style="width:5%; text-align: center">No</th>
                                <th style="width:12%; text-align: center">Kode Kriteria</th>
                                <th style="width:12%; text-align: center">Kriteria</th>
                                <th style="width:12%; text-align: center">Subkriteria</th>
                                <th style="width:12%; text-align: center">Bobot Kriteria</th>
                                <th style="width:12%; text-align: center">Atribut</th>
                                <th style="width:8%; text-align: center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKriteria as $data)
                            <tr>
                                <td style="text-align: center"> {{ $loop->iteration }}</td>
                                <td style="text-align: center"> {{ $data->kode_kriteria }}</td>
                                <td style="text-align: center"> {{ $data->kriteria }}</td>
                                <td style="text-align: center"> {{ $data->subkriteria }}</td>
                                <td style="text-align: center"> {{ $data->bobot_kriteria }}</td>
                                <td style="text-align: center"> {{ $data->jenis_atribut }}</td>
                                <form action="{{ route('kriteria.destroy', $data->kode_kriteria)}}" method="post">@csrf
                                <td style="text-align: center"> 
                                {{-- <button type="button" class="badge btn btn-primary mx-1 border-0" onClick="return confirm('Yakin Hapus Data?')">Delete</button>   --}}
                                <a href="{{ route('kriteria.edit', $data->kode_kriteria)}}" class="badge btn btn-warning mx-1 border-0">Edit</a>
                            </form> </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <br><br>
                </div>
            </div>
        </div>

    </div>

</div>

@stop
@push('scripts')

@endpush