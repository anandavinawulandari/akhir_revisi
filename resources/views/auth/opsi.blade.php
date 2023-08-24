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
                    <h4>Data Pengguna</h4>
                    <!-- <form action="" method="GET"> -->
                    <div class="row">
                        <div class="col-md-9">
                        @if (Route::has('register'))
                        <a href="{{ route('auth.register') }}" class="btn btn-info pull-right"><i class='fas fa-plus-circle'></i> Submit Data</a>
                        @endif
                    </div>

                        </div>
                    </div>
                    </form>
                </div>
                <div class="panel-body py-3">
                    <table class="table table-bordered table-striped" id="example2">
                        <thead>
                            <tr>
                            <form method="POST">
                                <!-- <th style="width:5%">No</th> -->
                                <th style="width:12%; text-align: center">ID Pengguna</th>
                                <th style="width:12%; text-align: center">Nama Pengguna</th>
                                <th style="width:12%; text-align: center">Email</th>
                                <th style="width:12%; text-align: center">Password</th>
                                <th style="width:12%; text-align: center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($dataUser as $data)
                            <tr>
                                <!-- <td> {{ $loop->iteration }}</td> -->
                                <td style="text-align: center"> {{ $data->id }}</td>
                                <td style="text-align: center"> {{ $data->name }}</td> 
                                 <td style="text-align: center"> {{ $data->email}}</td>
                                 <td style="text-align: center"> {{ $data->deskripsipassword }}</td>
                                 <td style="text-align: center"> {{ $data->level }}</td>
                                 <!-- <td style="text-align: center"><a href="{{ route('auth.edit', $data->id)}}" class="badge btn btn-warning mx-1 border-0">Edit</a></td> -->
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
{{-- <script>
$(function() {
$('#example2').DataTable();
});

</script> --}}
{{-- 
<script>
    $(function () {
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script> --}}

@endpush

