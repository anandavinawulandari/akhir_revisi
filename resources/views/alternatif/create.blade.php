@extends('layouts.master')
@section('title','SMPN 2 Kunjang Site')
@section('content')
<head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
                    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
                    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>           
</head>
<br>
<div class="container">
@if(Session::has('error'))
            <div class="alert alert-danger d-flex align-items-center alert-dismissible" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <div>
            <i class='fas fa-exclamation-circle' style='font-size:24px'></i>
                {{Session::get('error')}}
            </div>
            </div>
            @endif

            <br>
    <div class="row"></div>
        <div class="col-md-8">
            <h4>Submit Data</h4>
            <br>

                
            <form action="{{route('alternatif.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Kode Alternatif <span class="text-danger">*</span></label>
                    <input class="form-control" type="text"  name="kode_alternatif" id="kode_alternatif" value="{{ $current_id }}">
                </div>
                <div class="form-group">
                    <label>NIS <span class="text-danger">*</span></label>
                    {{-- <input class="form-control" type="text" name="nisp" id="nisp"> --}}
                    <div class="input-group date" id="div_nis">
                        <input class="form-control" type="text" name="nis" id="nis">
                        <div class="input-group-append" data-target="#div_nis">
                            <div class="input-group-text"><i class="fas fa-search" onclick="getdetail()"></i></div>
                        </div>
                    </div>
                </div>

                  <div class="form-group">
                    <label>Riwayat Bantuan <span class="text-danger">*</span></label>
                    <select class="form-control" name="riwayat_c1" id="riwayat_c1" required>
                        <option value="">Pilih</option>
                        {{-- <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option> --}}
                    </select>
                </div>
                    <div class="form-group">
                    <label>Pekerjaan Orangtua <span class="text-danger">*</span></label>
                    <select class="form-control" name="pekerjaan_c2" id="pekerjaan_c2" required>
                        <option value="">Pilih</option>
                        {{-- <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option> --}}
                    </select>                
                </div>
                <div class="form-group">
                    <label>Penghasilan <span class="text-danger">*</span></label>
                    <select class="form-control" name="penghasilan_c3" id="penghasilan_c3" required>
                        <option value="">Pilih</option>
                        {{-- <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option> --}}
                    </select>
                </div>
                <div class="form-group">
                    <label>Jumlah Tanggungan Orangtua<span class="text-danger">*</span></label>
                    <select class="form-control" name="jml_tanggungan_c4" id="jml_tanggungan_c4" required>
                        <option value="">Pilih</option>
                        {{-- <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option> --}}
                    </select>
                </div>
                <div class="form-group">
                    <label>Nilai<span class="text-danger">*</span></label>
                    <select class="form-control" name="nilai_c5" id="nilai_c5" required>
                        <option value="">Pilih</option>
                        {{-- <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option> --}}
                    </select>
                </div>
                <div class="form-group">
                    <label>Tahun Ajaran <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="tahun_ajaran" id="tahun_ajaran">
                </div>

                    <br>
                <div><button type="submit" class="btn btn-success">Simpan</button>
                <a href="{{route('alternatif.index')}}" class="btn btn-danger">Kembali</a></div>
                </div>
            </form>
            <br><br>
        </div></div></div>

<script type="text/javascript">
    function getdetail()
    {
        var nis = $('#nis').val();
        if(nis.replace(/^\s+|\s+$/gm,'') == ''){
            alert('NIS Wajib diisi');
            return false;
        }
        $('#riwayat_c1').empty();
        $('#riwayat_c1').append("<option value=''>Loading...</option>");
        $('#riwayat_c1').trigger("chosen:updated");

        $('#pekerjaan_c2').empty();
        $('#pekerjaan_c2').append("<option value=''>Loading...</option>");
        $('#pekerjaan_c2').trigger("chosen:updated");

        $('#penghasilan_c3').empty();
        $('#penghasilan_c3').append("<option value=''>Loading...</option>");
        $('#penghasilan_c3').trigger("chosen:updated");

        $('#jml_tanggungan_c4').empty();
        $('#jml_tanggungan_c4').append("<option value=''>Loading...</option>");
        $('#jml_tanggungan_c4').trigger("chosen:updated");

        $('#nilai_c5').empty();
        $('#nilai_c5').append("<option value=''>Loading...</option>");
        $('#nilai_c5').trigger("chosen:updated");

        $.ajax({
            type: "GET",
            url: "{{ route('alternatif.getdetail') }}",
            data: "nis="+nis,
            cache: false,
            success: function(msg){
                var obj = $.parseJSON(msg);
                var status = obj['status'];
                if(status=='0'){
                    alert("NIS yang dimasukkan tidak terdeteksi !");
                    
                    $('#riwayat_c1').empty();
                    $('#riwayat_c1').append("<option value=''>Pilih</option>");
                    $('#riwayat_c1').trigger("chosen:updated");

                    $('#pekerjaan_c2').empty();
                    $('#pekerjaan_c2').append("<option value=''>Pilih</option>");
                    $('#pekerjaan_c2').trigger("chosen:updated");

                    $('#penghasilan_c3').empty();
                    $('#penghasilan_c3').append("<option value=''>Pilih</option>");
                    $('#penghasilan_c3').trigger("chosen:updated");

                    $('#jml_tanggungan_c4').empty();
                    $('#jml_tanggungan_c4').append("<option value=''>Pilih</option>");
                    $('#jml_tanggungan_c4').trigger("chosen:updated");

                    $('#nilai_c5').empty();
                    $('#nilai_c5').append("<option value=''>Pilih</option>");
                    $('#nilai_c5').trigger("chosen:updated");

                    return false;
                }
                var detail = obj['detail'];
                console.log(detail[0]['riwayat']);
                var ref_subkriteria = obj['ref_subkriteria'];
                console.log(ref_subkriteria);

                var opt_c1 ="<option value=''>Pilih</option>";
                var opt_c2 ="<option value=''>Pilih</option>";
                var opt_c3 ="<option value=''>Pilih</option>";
                var opt_c4 ="<option value=''>Pilih</option>";
                var opt_c5 ="<option value=''>Pilih</option>";
                for (let index = 0; index < ref_subkriteria.length; index++) {
                    var selected = "";
                    if(ref_subkriteria[index]['kode_kriteria']=='C1'){
                        if(ref_subkriteria[index]['kode_subkriteria']==detail[0]['riwayat']){
                            selected = "selected";
                        }
                        opt_c1 += "<option value='"+ref_subkriteria[index]['kode_subkriteria']+"' "+selected+">"+ref_subkriteria[index]['subkriteria']+" (bobot nilai : "+ref_subkriteria[index]['bobot_nilai']+")</option>";
                    }else if(ref_subkriteria[index]['kode_kriteria']=='C2'){
                        if(ref_subkriteria[index]['kode_subkriteria']==detail[0]['pekerjaan']){
                            selected = "selected";
                        }
                        opt_c2 += "<option value='"+ref_subkriteria[index]['kode_subkriteria']+"' "+selected+">"+ref_subkriteria[index]['subkriteria']+" (bobot nilai : "+ref_subkriteria[index]['bobot_nilai']+")</option>";
                    }else if(ref_subkriteria[index]['kode_kriteria']=='C3'){
                        if(ref_subkriteria[index]['kode_subkriteria']==detail[0]['penghasilan']){
                            selected = "selected";
                        }
                        opt_c3 += "<option value='"+ref_subkriteria[index]['kode_subkriteria']+"' "+selected+">"+ref_subkriteria[index]['subkriteria']+" (bobot nilai : "+ref_subkriteria[index]['bobot_nilai']+")</option>";
                    }else if(ref_subkriteria[index]['kode_kriteria']=='C4'){
                        if(ref_subkriteria[index]['kode_subkriteria']==detail[0]['jml_tanggungan']){
                            selected = "selected";
                        }
                        opt_c4 += "<option value='"+ref_subkriteria[index]['kode_subkriteria']+"' "+selected+">"+ref_subkriteria[index]['subkriteria']+" (bobot nilai : "+ref_subkriteria[index]['bobot_nilai']+")</option>";
                    }else if(ref_subkriteria[index]['kode_kriteria']=='C5'){
                        if(ref_subkriteria[index]['kode_subkriteria']==detail[0]['nilai']){
                            selected = "selected";
                        }
                        opt_c5 += "<option value='"+ref_subkriteria[index]['kode_subkriteria']+"' "+selected+">"+ref_subkriteria[index]['subkriteria']+" (bobot nilai : "+ref_subkriteria[index]['bobot_nilai']+")</option>";
                    }
                }

                $('#riwayat_c1').empty();
                $('#riwayat_c1').append(opt_c1);
                $('#riwayat_c1').trigger("chosen:updated");

                $('#pekerjaan_c2').empty();
                $('#pekerjaan_c2').append(opt_c2);
                $('#pekerjaan_c2').trigger("chosen:updated");

                $('#penghasilan_c3').empty();
                $('#penghasilan_c3').append(opt_c3);
                $('#penghasilan_c3').trigger("chosen:updated");

                $('#jml_tanggungan_c4').empty();
                $('#jml_tanggungan_c4').append(opt_c4);
                $('#jml_tanggungan_c4').trigger("chosen:updated");

                $('#nilai_c5').empty();
                $('#nilai_c5').append(opt_c5);
                $('#nilai_c5').trigger("chosen:updated");

                $('#tahun_ajaran').val(detail[0]['tahun_ajaran']);
            }
        });    
    }
    
</script>
@endsection