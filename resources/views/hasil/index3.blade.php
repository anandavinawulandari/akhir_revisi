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
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading " >
                    <form action="{{route('hasil.index')}}" method="GET">
                    <div class="row">
                        <div class="col-md-9">
                        <a href="{{route('pdfHasil')}}" class="btn btn-secondary pull-right" target="_blank"><i class="fas fa-download"></i>PDF </a>
                            <a href="{{route('excelHasil')}}" class="btn btn-secondary pull-right"><i class="fas fa-download"></i>Excel</a>
                        </div>
                        <div class="col-md-2">
                            <select class="form-control" type="options" name="tahun_ajaran" id="tahun_ajaran">
                                <option value="">Tahun Ajaran</option>
                                <option value="2022/2023" @if ($ta=="2022/2023") selected @endif>2022/2023</option>
                                <option value="2021/2022" @if ($ta=="2021/2022") selected @endif>2021/2022</option>              
                            </select>
                        </div>
                        <div class="col-md-1">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                    </form>
                    {{-- <div class="row">
                        <div class="col-md-8">        
                            <a href="{{route('pdfHasil')}}" class="btn btn-secondary pull-right" target="_blank">Unduh </a>
                        </div>
                        <div class="col-md-4">
                            <form action="/datapencarian/search" class="d-flex" role="search" method="GET">
                            <input type="search" name="search" class="form-control float-right me-2" placeholder="Search">  
                            <button class="btn btn-outline-success" type="submit">Search</button>              
                            </button>
                    </div> --}}
            </form>
        </div>  
                <div class="panel-body py-3">
                <h4>Data Validasi Seleksi</h4>
                    <table class="table table-bordered table-striped" id="example2">
                        <thead>
                            <tr>
                            <form method="POST">
                                <th style="width:5%">No</th>
                                <th style="text-align: center">NIS</th>
                                <th style="text-align: center">Nama</th>
                                <th style="text-align: center">Alamat</th>
                                <th style="text-align: center">Kelas</th>
                                <th style="text-align: center">Tahun Ajaran</th>
                                <th style="text-align: center">Jenis Kelamin</th>
                                <th style="text-align: center">Nilai Rangking</th>
                                <th style="text-align: center">Status</th>
                                <th style="text-align: center">Aksi</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataHasil as $data)
                            <tr>
                                <td style="text-align: center"> {{ $loop->iteration }}</td>
                                <td style="text-align: center"> {{ $data->nis }}</td>
                                <td style="text-align: center"> {{ $data->nama}}</td>
                                <td style="text-align: center"> {{ $data->alamat}}</td>
                                <td style="text-align: center"> {{ $data->kelas}}</td>
                                <td style="text-align: center"> {{ $data->tahun_ajaran}}</td>
                                <td style="text-align: center"> {{ $data->jk}}</td>
                                <td style="text-align: center"> {{ $data->nilai_rangking}}</td>
                                @if($data->status == "LOLOS" || $data->status == "TIDAK LOLOS")
                                <td style="text-align: center"> <a href="{{ route('hasil.edit', $data->kode_hasil)}}" class="badge btn btn-success mx-1 border-0"> {{ $data->status}}</a></td>
                                @else
                                <td style="text-align: center"> <a href="{{ route('hasil.edit', $data->kode_hasil)}}" class="badge btn btn-warning mx-1 border-0">Beri Validasi</a> </td>
                                @endif 
                                <td style="text-align: center"> <a href="{{ url('/hasil/'. $data->nis .'/viewseleksi') }}">
                                <button type="button" class="badge btn btn-primary mx-1 border-0">Detail </button>
                                </td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    

                    {{-- <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-center">
                    {{$dataHasil->links()}}
                    <br><br>
                    </ul>
                    </nav> --}}
                </div>
            </div>
        </div>

    </div>

</div>

@stop
@push('scripts')
<script>
$(function() {
$('#table-hasil').DataTable();
});
</script>
@endpush