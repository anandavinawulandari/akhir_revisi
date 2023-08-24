
@extends('layouts.master')
@section('title','SMPN 2 Kunjang Site')
@section('content')
<br>
<div class="container ">
    @if(Session::has('sucess'))
    <div class="alert alert-sucess " role="alert">
        {{Session::get('sucess')}}</div>
        @endif
        <div class="d-flex flex-column pt-3 mb-3 arsip-header" style="margin-left: 50px">
        <h1 class="h2">Data Peserta Didik >> Detail </h1>
<br>

<table class="table table-borderless">
<thead>
    <tr>
      <th scope="col">##</th>
      <th scope="col">Keterangan</th>
    </tr>
  </thead>
  <tbody>

    <tr>
      <td>Nama</td>
      <td>{{ Auth::user()->name }}</td>
    </tr>

    
  </tbody>
</table>

        <a href="{{route('/home')}}">
    <button type="button" class="btn btn-primary mx-1 btn-sm">
     Kembali
    </button>
    <br>
  </a>
  </a>
</div>
    </div>

<div class="mb-4">
 </div>
<br><br>
@endsection