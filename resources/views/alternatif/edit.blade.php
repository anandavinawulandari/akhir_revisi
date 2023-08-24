@extends('layouts.master')
@section('title','SMPN 2 Kunjang Site')
@section('content')
<br>
<div class="container">
    <div class="row"></div>
        <div class="col-md-8">
            <h4>Edit Data Alternatif</h4>
            <br>
            <form action="{{route('alternatif.update', $kode_alternatif)}}" method="POST"> 
            @csrf
                <div class="form-group">
                    <label>NIS <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nis" id="nis" value="{{$data->pesdik->nis ?? ''}}" readonly>
                    {{-- <div class="input-group date" id="div_nis">
                        <input class="form-control" type="text" name="nis" id="nis" value="{{$data->pesdik->nis ?? ''}}">
                        <div class="input-group-append" data-target="#div_nis">
                            <div class="input-group-text"><i class="fas fa-search" onclick="getdetail()"></i></div>
                        </div>
                    </div> --}}
                </div>
                <div class="form-group">
                    <label>Nama Siswa <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="nama_siswa" id="nama_siswa" value="{{$data->pesdik->nama ?? ''}}" readonly>
                </div>

                  <div class="form-group">
                    <label>Riwayat Bantuan <span class="text-danger">*</span></label>
                    {{-- <p>{{$data->pesdik->riwayat ?? ''}}</p> --}}
                    <select class="form-control" type="options" name="riwayat_c1" id="riwayat_c1" required>
                        <option value="">Pilih</option>
                        @foreach ($ref_subkriteria as $a)
                            @if ($a->kode_kriteria == 'C1')
                            <option value="{{$a->kode_subkriteria}}" @if ($a->kode_subkriteria==$data->riwayat_c1) selected @endif> {{$a->subkriteria}}</option>
                            @endif
                        @endforeach
                        {{-- <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option> --}}
                </select>
                </div>
                    <div class="form-group">
                    <label>Pekerjaan Orangtua <span class="text-danger">*</span></label>
                    {{-- <p> {{$data->pesdik->pekerjaan ?? ''}}</p> --}}
                    <select class="form-control" type="options" name="pekerjaan_c2" id="pekerjaan_c2" required>
                        <option value="">Pilih</option>
                        @foreach ($ref_subkriteria as $a)
                            @if ($a->kode_kriteria == 'C2')
                            <option value="{{$a->kode_subkriteria}}" @if ($a->kode_subkriteria==$data->pekerjaan_c2) selected @endif> {{$a->subkriteria}}</option>
                            @endif
                        @endforeach
                        {{-- <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option> --}}
                </select>                </div>
                <div class="form-group">
                    <label>Penghasilan <span class="text-danger">*</span></label>

                    {{-- <p> {{$data->pesdik->penghasilan ?? ''}} </p> --}}
                    <select class="form-control" type="options" name="penghasilan_c3" id="penghasilan_c3" required>
                        <option value="">Pilih</option>
                        @foreach ($ref_subkriteria as $a)
                            @if ($a->kode_kriteria == 'C3')
                            <option value="{{$a->kode_subkriteria}}" @if ($a->kode_subkriteria==$data->penghasilan_c3) selected @endif> {{$a->subkriteria}}</option>
                            @endif
                        @endforeach
                        {{-- <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option> --}}
                </select>
                </div>
                <div class="form-group">
                    <label>Jumlah Tanggungan Orangtua<span class="text-danger">*</span></label>

                    {{-- <p> {{$data->pesdik->jml_tanggungan ?? ''}} </p> --}}
                    <select class="form-control" type="options" name="jml_tanggungan_c4" id="jml_tanggungan_c4" required>
                        <option value="">Pilih</option>
                        @foreach ($ref_subkriteria as $a)
                            @if ($a->kode_kriteria == 'C4')
                            <option value="{{$a->kode_subkriteria}}" @if ($a->kode_subkriteria==$data->jml_tanggungan_c4) selected @endif> {{$a->subkriteria}}</option>
                            @endif
                        @endforeach
                        {{-- <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option> --}}
                </select>
                </div>
                <div class="form-group">
                    <label>Nilai<span class="text-danger">*</span></label>

                    {{-- <p> {{$data->pesdik->nilai ?? ''}} </p> --}}
                    <select class="form-control" type="options" name="nilai_c5" id="nilai_c5" required>
                        <option value="">Pilih</option>
                        @foreach ($ref_subkriteria as $a)
                            @if ($a->kode_kriteria == 'C5')
                            <option value="{{$a->kode_subkriteria}}" @if ($a->kode_subkriteria==$data->nilai_c5) selected @endif> {{$a->subkriteria}}</option>
                            @endif
                        @endforeach
                        {{-- <option value="4">4</option>
                        <option value="3">3</option>
                        <option value="2">2</option>
                        <option value="1">1</option> --}}
                </select>
                <br>
                <div><button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('alternatif.index')}}" class="btn btn-danger">Kembali</a></div>
                </div>
            </form>
        </div></div></div>
        <br><br>
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
            }
        });    
    }
    
</script>
@endsection