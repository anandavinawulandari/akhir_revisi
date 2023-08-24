@extends('layouts.master')
@section('title','SMPN 2 Kunjang Site')
@section('content')
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>           
</head>
<br>
<div class="container">
    <div class="row"></div>
        <div class="col-md-6">
            <h4>Form Seleksi</h4>
            <br>       
            <form action="{{route('hasil.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>ID <span class="text-danger">*</span></label>
                    <input class="form-control" type="options" name="id" id="id" />   
                <div class="form-group">
                    <label>Kode Kriteria <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="kode_kriteria" id="kode_kriteria" />
                </div>
                <div class="form-group">
                    <label>Kode Subkriteria <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="kode_subkriteria" id="kode_subkriteria" />            
                </input>
                </div>
                <div class="form-group">
                    <label>Bobot Kriteria <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="bobot_kriteria" id="bobot_kriteria" />
                </div>
                <div class="form-group">
                    <label>Jenis Atribut <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="jenis_atribut" id="jenis_atribut" />
                </div>
                
                <br>
                <div><button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{url('')}}" class="btn btn-success">Kembali</a></div>
            </form>
        </div></div></div>
@endsection