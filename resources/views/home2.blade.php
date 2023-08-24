@extends('layouts.master')
@section('title','SMPN 2 Kunjang Site')
@section('content')
<div class="container">

    <h1 class="card-title"><b> Selamat Datang, <a href=""> {{ Auth::user()->name }}
            </a> di Halaman Informasi Data Keputusan Beasiswa SMPN 2 Kunjang!</b></h1>

   

    <div class="card-tools ">
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-8">
        @foreach ($dataPengguna as $coba)
        @if($coba->status == "LOLOS" || $coba->status == "TIDAK LOLOS")
        <div class="card">
            <div class="card-header p-3 mb-2 bg-light text-dark"> <b>
                    <center>{{ __('HASIL SELEKSI BEASISWA') }} </center>
                </b></div>

            <div class="card-body">
                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <div class="col-2">

                    @foreach ($siswa as $data)
                    <div class="card">
                        <div class="card-header ">
                        </div>
                        <div class="card-body ">
                        </div>
                    </div>
                    <br>
                    @endforeach
                </div>
                <table class="table table-borderless p-3 mb-2 bg-light text-dark">
                    <thead>
                        <tr>
                            <th scope="col" style="width:5%;"></th>
                            <th scope="col" style="width:5%;"></th>
                            <th scope="col" style="width:10%;"></th>


                        </tr>
                    </thead>
                    @foreach ($dataPengguna as $user)
                    <tbody>

                        <tr>
                            <td>Nomor Induk Siswa </td>
                            <td>:</td>
                            <td><b>{{ $user->nis}}</b></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td><b>{{ $user->nama}}</b></td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir </td>
                            <td>:</td>
                            <td><b>{{ $user->ttl}}</b></td>
                        </tr>
                        <tr>
                            <td>Tahun Ajaran / Kelas</td>
                            <td>:</td>
                            <td><b>{{ $user->tahun_ajaran}} / {{ $user->kelas}}</b></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <br>
                Anda dinyatakan @foreach ($dataPengguna as $user) <b> {{ $user->status }} </b> seleksi internal beasiswa
                SMP Negeri 2 Kunjang dengan nilai rangking <b> {{ $user->nilai_rangking }}. </b>@endforeach
                <br>
                Bagi siswa yang lolos, silahkan membawa dokumen terkait pendaftaran beasiswa ke ruang Tata Usaha dan
                menyerahkan ke bagian administrasi.
                <br>
                <br>
                <a class="btn btn-info btn-block" href="{{ route('cetak')}}" target="__blank"> Cetak Bukti</a>
            </div>
            @else
            <div class="card">
                <div class="card-header text-center">HASIL SELEKSI BEASISWA</div>
                <div class="card-body">
                    <br>
                    <center style='font-size:22px'>
                       <b>DATA SEDANG DALAM PROSES VALIDASI ADMIN, HARAP CEK SECARA BERKALA!</b>
                    </center>
                    <br>
                </div>
            </div>
            @endif
            @endforeach
        </div>

    </div>
    <br>
    <!-- ./col -->
    <div class="col-lg-6 col-30">



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