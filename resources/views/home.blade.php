@extends('layouts.master')
@section('title','SMPN 2 Kunjang Site')
@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SMPN 2 Kunjang Site</title>
        <style type="text/css">

            .inner   {
                background-color: #008B8B;
                color: #FFFFFF;
                
                        }
        </style>
    </head>
<div class="container">

          <h1 class="card-title"><b style="font-size:28px;"> Selamat Datang, <a href=""> {{ Auth::user()->name }}  </a> di Halaman Informasi Data Keputusan Beasiswa SMPN 2 Kunjang!</b></h1>
          <!-- <h1 class="card-title"><b style="font-size:28px;"> Selamat Datang, <a href=""> {{ Auth::user()->name }}  </a> di SIPESAN Beasiswa SMPN 2 Kunjang!</b></h1> -->


          
          <div class="card-tools">
          </div>
        </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="col-6">

                        @foreach ($siswa as $data)
                        <div class="card">
                            <div class="card-header">
                            </div>
                            <div class="card-body">
                            </div>
                        </div>
                        <br>
                        @endforeach
                    </div>
                </div>
                <div class="container-fluid col-md-10">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                <div class="col-lg-6 col-30">
                    <!-- small box -->
            <!-- small box -->
            <div class="small-box bg-primary">
                    <div class="inner">
                        <b><h4>TAHUN AJARAN <p> 2022/2023<sup style="font-size: 15px"></sup></p></h4></b>

                        <p>Jumlah Pendaftar {{$jmlsiswa1}} Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-alt">{{$jmlsiswa1}} </i>
                    </div>
                    <a href="{{route('pesdik.index2', 'pesdik.index3')}}" class="small-box-footer bg-dark">
                        <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <br>
                <!-- ./col -->
      <div class="col-lg-6 col-30">



      
<!-- small box -->
<div class="small-box bg-primary">
   <div class="inner">
   <b><h4>TAHUN AJARAN <p> 2021/2022<sup style="font-size: 15px"></sup></p></h4></b>

   <p>Jumlah Pendaftar {{$jmlsiswa2}} Siswa</p>
   </div>
   <div class="icon">
     <i class="fas fa-user-alt">{{$jmlsiswa2}}</i>
   </div>
   <a href="{{route('pesdik.index2', 'pesdik.index3')}}" class="small-box-footer bg-dark">
       <i class="fas fa-arrow-circle-right"></i></a>
 </div>
</div>
      <!-- ./col -->
      <div class="col-lg-6 col-30">
      <div class="small-box bg-primary">
                    <div class="inner">
                    <b><h4>SELEKSI <p> LOLOS<sup style="font-size: 15px"></sup></p></h4></b>

                    <p>Jumlah Lolos {{$jmlsiswalolos}} Siswa</p>
                    </div>
                    <div class="icon">
                        <i class="far fa-grin-hearts">{{$jmlsiswalolos}}</i>
                    </div>
                    <a href="{{route('hasil.index', 'hasil.index2')}}" class="small-box-footer bg-dark">
                        <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
      <!-- ./col -->
      <div class="col-lg-6 col-30">

       <!-- small box -->
       <div class="small-box bg-primary">
          <div class="inner">
          <b><h4>SELEKSI <p> TIDAK LOLOS<sup style="font-size: 15px"></sup></p></h4></b>

          <p>Jumlah Tidak Lolos {{$jmlsiswalolos2}} Siswa</p>
          </div>
          <div class="icon">
            <i class="fas fa-frown">{{$jmlsiswalolos2}}</i>
          </div>
          <a href="{{route('hasil.index', 'hasil.index2')}}" class="small-box-footer bg-dark">
              <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">

            </div>
                </div>
                 
            </div>

            <div class="card">


        </div>
        </div>
    </div>
</div>
@endsection
