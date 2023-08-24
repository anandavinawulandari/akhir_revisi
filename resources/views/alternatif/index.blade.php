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
                    <h4>Data Alternatif Penilaian</h4>
                    <div class="row">
                        <div class="col-md-8">                        
                        <a href="{{route('alternatif.create')}}" class="btn btn-info pull-right"><i class='fas fa-plus-circle'></i> Submit Data</a>
                    <a href="{{route('pdfAlternatif')}}" class="btn btn-secondary pull-right" target="_blank"><i class="fas fa-download"></i>PDF </a>
                    <a href="{{route('excelAlternatif')}}" class="btn btn-secondary pull-right"><i class="fas fa-download"></i> Excel</a>
            </div>

            </form>
</div>
                <div class="panel-body py-3">
                    <table class="table table-bordered table-striped" id="example2">
                        <thead>
                            <tr>
                            <center>
                                <th style="width:5%; text-align:center" rowspan="2">No</th>
                                <th style="width:12z%; text-align:center" rowspan="2">Kode Alternatif</th>
                                <th style="width:12%; text-align:center" rowspan="2">NIS</th>
                                <th style="width:12%; text-align:center" rowspan="2">Nama</th>
                                <th style="width:12%; text-align:center" colspan="5">Bobot</th>
                                <th style="width:12%; text-align:center" rowspan="2">Tahun Ajaran</th>
                                <th style="width:12%; text-align:center" rowspan="2">Aksi</th>
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
                            @foreach ($dataAlternatif as $data)
                            <tr>
                                <td style="text-align: center"> {{ $loop->iteration }}</td>
                                <td style="text-align: center"> {{ $data->kode_alternatif }}</td>
                                <td style="text-align: center"> {{ $data->nis }}</td>
                                <td style="text-align: center"> {{ $data->nama }}</td>
                                <td style="text-align: center"> {{ $data->bobot_riwayat }}</td>
                                <td style="text-align: center"> {{ $data->bobot_pekerjaan }}</td>
                                <td style="text-align: center"> {{ $data->bobot_penghasilan }}</td>
                                <td style="text-align: center"> {{ $data->bobot_jml_tanggungan }}</td>
                                <td style="text-align: center"> {{ $data->bobot_nilai }}</td>
                                <td style="text-align: center"> {{ $data->tahun_ajaran }}</td>                                
                                <td style="text-align: center">                                
                                <a href="{{ route('alternatif.destroy', $data->kode_alternatif)}}" class="badge btn btn-danger mx-1 border-0" onClick="return confirm('Yakin Hapus Data?')">Hapus</a>
                                <a href="{{ route('alternatif.edit', $data->kode_alternatif)}}" class="badge btn btn-warning mx-1 border-0">Edit</a>
                                </td>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
<!--  -->

                

                    {{-- <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                        {{$dataAlternatif->links()}}
                        </ul>
                    </nav> --}}
                    <br><br>
                </div>
            </div>
        </div>

    </div>

</div>

@stop
@push('scripts')

@endpush