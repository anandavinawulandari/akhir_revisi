@extends('layouts.master')
@section('title','SMPN 2 Kunjang Site')
@section('content')
<br>
<div class="container ">
    @if(Session::has('sucess'))
    <div class="alert alert-sucess " role="alert">
        {{Session::get('sucess')}}</div>
        @endif
    <div class="d-flex flex-column pt- mb-0 " style="margin-left: 50px">
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
      <td>{{ $data->nama}}</td>
    </tr>
    <tr>
      <td>Jenis Kelamin</td>
      <td>{{ $data->jk}}</td>
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
      <td>Riwayat Bantuan</td>
      <td>{{ $riwayat->subkriteria}} / <b> Bobot {{ $bobot_nilai_1->bobot_nilai}} <b> </td>
    </tr>
    <tr>
      <td>Pekerjaan Orang Tua</td>
      <td>{{ $pekerjaan->subkriteria}} / <b> Bobot {{ $bobot_nilai_2->bobot_nilai}} <b> </td>
    </tr>

    <tr>
      <td>Penghasilan Orang Tua Perbulan</td>
      <td>{{ $penghasilan->subkriteria}} / <b> Bobot {{ $bobot_nilai_3->bobot_nilai}} <b> </td>
    </tr>
    <tr>
      <td>Jumlah Tanggungan Orang Tua</td>
      <td>{{ $jml_tanggungan->subkriteria}} / <b> Bobot {{ $bobot_nilai_4->bobot_nilai}} <b> </td>
    </tr>
    <tr>
      <td>Nilai Rata-Rata</td>
      <td>{{ $nilai->subkriteria}} / <b> Bobot {{ $bobot_nilai_5->bobot_nilai}} <b> </td>
    </tr>
    <tr>
      <td>Tahun Ajaran</td>
      <td>{{ $data->tahun_ajaran}}</td>
    </tr>
    <!-- <tr>
      <td>Keterangan Status</td>
      <td>{{ $statuss->hasil}}</td>
    </tr> -->

  </tbody>
</table>


        <!-- <img src="{{asset('storage/' . $data->file)}}" width="50%" alt="{{$data->file}}" > -->
        <!-- <iframe src="{{asset('storage')}}/{{$data->file}}" type="application/pdf" width="100%" height="500px" ></iframe> -->
        </div>

        <a href="{{route('hasil.index3')}}">
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