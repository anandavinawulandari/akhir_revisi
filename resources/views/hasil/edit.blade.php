@extends('layouts.master')
@section('title','SMPN 2 Kunjang Site')
@section('content')
<br>
<div class="container">
    <div class="row"></div>
        <div class="col-md-6">
            <h4>Validasi Data Hasil Seleksi</h4>
            <br>
            <form action="{{route('hasil.update', $data->kode_hasil)}}" method="POST"> 
            @csrf
                <div class="form-group">
                    <label>Status Lolos <span class="text-danger">*</span></label>
                    <select class="form-control" type="options" name="status" id="status" />
                        <option value="LOLOS">LOLOS</option>
                        <option value="TIDAK LOLOS">TIDAK LOLOS</option>
                </select>
                </div>
                <div class="form-group">
                    <label>Nilai Rangking <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nilai_rangking" id="nilai_rangking" value="{{$data->nilai_rangking}}" readonly>
                </div>
                <div class="form-group">
                    <label>NIS <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nis" id="nis" value="{{$data->nis}}" readonly>
                </div>
                <div class="form-group">
                    <label>Nama Siswa <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama_siswa" id="nama_siswa" value="{{$data->pesdik->nama ?? ''}}" readonly>
                </div>
                <br>
                <div><button type="submit" class="btn btn-success">Update</button>
                <a href="{{route('hasil.index3')}}" class="btn btn-danger">Kembali</a></div>
            </div>
                
            </form>
        </div></div></div>
        <br><br>
@endsection