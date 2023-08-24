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
      <td>NIS</td>
      <td>{{ $data->nis}}</td>
    </tr>
    <tr>
      <td>Nama</td>
      <td>{{ $data->nama}}</td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td>{{ $data->jk}}</td>
    </tr>
    <tr>
      <td>Tanggal Lahir</td>
      <td>{{ $data->ttl}}</td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>{{ $data->alamat}}</td>
    </tr>
    <tr>
      <td>Nomor HP</td>
      <td>{{ $data->no_hp}}</td>
    </tr>
    <tr>
      <td>Kelas</td>
      <td>{{ $data->kelas}}</td>
    </tr>
    <tr>
      <td>Nilai Rata-Rata</td>
      <td>{{ $nilai->subkriteria}}</td>
    </tr>
    <tr>
      <td>Pekerjaan Orang Tua</td>
      <td>{{ $pekerjaan->subkriteria}}</td>
    </tr>
    <tr>
      <td>Penghasilan Orang Tua Perbulan</td>
      <td>{{ $penghasilan->subkriteria}}</td>
    </tr>
    <tr>
      <td>Jumlah Tanggungan Orang Tua</td>
      <td>{{ $jml_tanggungan->subkriteria}}</td>
    </tr>
    <tr>
      <td>Riwayat Bantuan</td>
      <td>{{ $riwayat->subkriteria}}</td>
    </tr>
    <tr>
      <td>Tahun Ajaran</td>
      <td>{{ $data->tahun_ajaran}}</td>
    </tr>
  </tbody>
</table>


        <img src="{{asset('storage/' . $data->file)}}" width="50%" alt="{{$data->file}}" >
        <!-- <iframe src="{{asset('storage')}}/{{$data->file}}" type="application/pdf" width="100%" height="500px" ></iframe> -->
        </div>

        <a href="{{route('pesdik.index2')}}">
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