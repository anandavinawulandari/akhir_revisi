@extends('layouts.master')
@section('title','SMPN 2 Kunjang Site')
@section('content')
<br>
<div class="container">
    
    <div class="row"></div>
        <div class="col-md-6">
            <h4>Edit Data Kriteria dan Bobot</h4>
            <br>
            <form action="{{route('kriteria.update', $kode_kriteria)}}" method="POST"> 
            @csrf
                <div class="form-group">
                    <label>Kriteria <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="kriteria" id="kriteria" value="{{$data->kriteria}}">
                </div>
                    <div class="form-group">
                    <label>Bobot Kriteria <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="bobot_kriteria" id="bobot_kriteria" 
                    value="{{$data->bobot_kriteria}}"/>
                </div>
                <div class="form-group">
                    <label>Atribut <span class="text-danger">*</span></label>
                    <select class="form-control" type="options" name="jenis_atribut" id="jenis_atribut" />
                        <option value="Cost">Cost</option>
                        <option value="Benefit">Benefit</option>
                </select>
                <br>
                <div><button type="submit" class="btn btn-success">Update</button>
                <a href="{{route('kriteria.index')}}" class="btn btn-danger">Kembali</a></div>
            </div>
                
            </form>
        </div></div></div>
        <br><br>
@endsection