@extends('layouts.master2')
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
                    <center>
                    <h4>Terimakasih, pendaftaran Anda telah berhasil.</h4>
                    </center>

                    <a href="{{url('/login')}}" class="btn btn-success">Selanjutnya</a></div>
</div>
    </div>
        </div>
            </div>
                </div>
                    </div>

@stop
@push('scripts')
@endpush

