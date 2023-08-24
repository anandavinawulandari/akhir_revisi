@extends('layouts.master')
@section('title','SMPN 2 Kunjang Site')
@section('content')
<br>
<div class="container">
    <div class="row"></div>
        <div class="col-md-6">
            <h4>Data Pengguna</h4>
            <br>
            <form action="{{route('auth.update', $data->id)}}" method="POST"> 
            @csrf
                <div class="form-group">
                    <label>NIS <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nis" id="nis" value="{{$data->nis}}" readonly>
                </div>
                <div class="form-group">
                <label>Nama Pengguna <span class="text-danger">*</span></label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}" required autocomplete="name" autofocus readonly>
                </div>
                <div class="form-group">
                    <label>Email <span class="text-danger">*</span></label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data->email}}" required autocomplete="email" readonly>
                </div>
                <div class="form-group">
                    <label>Password <span class="text-danger">*</span></label>
                    <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{$data->password}}" required autocomplete="new-password" readonly>
                </div>
                <div class="form-group">
                    <label>Deskripsi Password <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="deskripsipassword" id="deskripsipassword" value="{{$data->deskripsipassword}}" readonly>
                </div>
                <div class="form-group">
                    <label>Level <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="level" id="level" value="{{$data->level}}" readonly>
                </div>
                <div class="form-group">
                    <label>Kode Hasil <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="kode_hasil" id="kode_hasil" value="{{$data->kode_hasil}}">
                </div>
                <br>
                <div><button type="submit" class="btn btn-success">Update</button>
                <a href="{{route('auth.opsi')}}" class="btn btn-danger">Kembali</a></div>
            </div>
                
            </form>
        </div></div></div>
        <br><br>
@endsection