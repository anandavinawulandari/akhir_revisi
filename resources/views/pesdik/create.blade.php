@extends('layouts.master2')
@section('title', 'SMPN 2 Kunjang Site')
@section('content')
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
                    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>           
</head>
<br>
<div class="container overflow-hidden shadow sm:rounded-lg">
<div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card overflow-hidden shadow sm:rounded-lg">
    <div class="row"></div>
        <div class="col-md-12">
        <ul class="nav justify-content-center nav nav-tabs p-1 mb-5 bg-dark text-white">
            <center><b><h2>Form Pendaftaran</h2></b></center>
            <br>
            </ul>
            <form action="{{route('pesdik.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>NIS <span class="text-danger">*</span></label>
                    <input class="form-control" type="options" name="nis" id="nis" />   
                <div class="form-group">
                    <label>Nama Siswa <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama" id="nama" />
                </div>
                <div class="form-group">
                    <label>Jenis Kelamin <span class="text-danger">*</span></label>
                    <select class="form-control" type="options" name="jk" id="jk" />
                    <option value="P">P</option>
                    <option value="L">L</option>              
                </select>
                </div>
                <div class="form-group">
                    <label>Alamat <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="alamat" id="alamat" />
                </div>
                <div class="form-group">
                    <label>Nomor HP <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="no_hp" id="no_hp" />
                </div>
                <div class="form-group">
                    <label>Tanggal Lahir <span class="text-danger">*</span></label>
                    <input class="form-control" type="date" name="ttl" id="ttl" />
                </div>
                <div class="form-group">
                    <label>Kelas <span class="text-danger">*</span></label>
                    <select class="form-control" type="options" name="kelas" id="kelas" />
                    <option value="1A">1A</option>
                    <option value="1B">1B</option>   
                    <option value="1C">1C</option>
                    <option value="1D">1D</option>   
                    <option value="1E">1E</option>
                    <option value="1F">1F</option>   
                    <option value="1G">1G</option>
                    <option value="1H">1H</option>   
                    <option value="1I">1I</option>
                    <option value="2A">2A</option>   
                    <option value="2B">2B</option>
                    <option value="2C">2C</option>              
                    <option value="2D">2D</option>
                    <option value="2E">2E</option>   
                    <option value="2F">2F</option>
                    <option value="2G">2G</option>   
                    <option value="2H">2H</option>
                    <option value="2I">2I</option>   
                    <option value="3A">3A</option>   
                    <option value="3B">3B</option>
                    <option value="3C">3C</option>              
                    <option value="3D">3D</option>
                    <option value="3E">3E</option>   
                    <option value="3F">3F</option>
                    <option value="3G">3G</option>   
                    <option value="3H">3H</option>
                    <option value="3I">3I</option>   
                </select>
                </div>
                <div class="form-group">
                    <label>Nilai Rata-Rata <span class="text-danger">*</span></label>
                    <select class="form-control" type="options" name="nilai" id="nilai" required>
                    <option value="">Pilih</option>
                    @foreach ($ref_subkriteria as $a)
                        @if ($a->kode_kriteria == 'C5')
                        <option value="{{$a->kode_subkriteria}}"> {{$a->subkriteria}}</option>
                        @endif
                    @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>File Kartu Keluarga <span class="text-danger">*</span></label>
                    <input class="form-control" type="file" name="file" id="exampleFormControlFile1" required/>
                    @error('file') 
                        <div class="invalid-feedback" role="alert">
                        {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group">
                    <label>Pekerjaan Orang Tua <span class="text-danger">*</span></label>
                    <select class="form-control" type="options" name="pekerjaan" id="pekerjaan" required>
                        <option value="">Pilih</option>
                        @foreach ($ref_subkriteria as $a)
                            @if ($a->kode_kriteria == 'C2')
                            <option value="{{$a->kode_subkriteria}}"> {{$a->subkriteria}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah Tanggungan Orangtua <span class="text-danger">*</span></label>
                    <select class="form-control" type="options" name="jml_tanggungan" id="jml_tanggungan" required>
                        <option value="">Pilih</option>
                        @foreach ($ref_subkriteria as $a)
                            @if ($a->kode_kriteria == 'C4')
                            <option value="{{$a->kode_subkriteria}}"> {{$a->subkriteria}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Riwayat Bantuan <span class="text-danger">*</span></label>
                    <select class="form-control" type="options" name="riwayat" id="riwayat" required>
                        <option value="">Pilih</option>
                        @foreach ($ref_subkriteria as $a)
                            @if ($a->kode_kriteria == 'C1')
                            <option value="{{$a->kode_subkriteria}}"> {{$a->subkriteria}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Penghasilan Orangtua Perbulan <span class="text-danger">*</span></label>
                    <select class="form-control" type="options" name="penghasilan" id="penghasilan" required>
                        <option value="">Pilih</option>
                        @foreach ($ref_subkriteria as $a)
                            @if ($a->kode_kriteria == 'C3')
                            <option value="{{$a->kode_subkriteria}}"> {{$a->subkriteria}}</option>
                            @endif
                        @endforeach
                    </select>
                <div class="form-group">
                    <label>Tahun Ajaran <span class="text-danger">*</span></label>
                    <select class="form-control" type="options" name="tahun_ajaran" id="tahun_ajaran" />
                    <option value="2022/2023">2022/2023</option>
                    <option value="2021/2022">2021/2022</option>              
                </select>
                </div>
                <br>
                <div><button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{ url('/home') }}" class="btn btn-danger">Kembali</a></div>
            </form>
        </div></div></div>
        </div>
            </div>
        </div>
@endsection