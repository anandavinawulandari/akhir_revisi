<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @foreach ($dataPengguna as $user)
    <title>Seleksi {{ $user->nis }}</title>
    <style>
        .garis-horizontal {
            border-top: 1px solid black;
            margin-top: 20px;
        }
        
        .garis-horizontal::before,
        .garis-horizontal::after {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            height: 1px;
            background-color: black;
        }

        .garis-horizontal::before {
            top: -1px;
        }

        .garis-horizontal::after {
            bottom: -1px;
        }
    </style>
    @endforeach
</head>
<body>
<table border="0" align="center">
    <td><img src="{{asset('AdminLTE-3.2.0')}}/dist/img/logo4.png" width="110" height="120"></td>
<td><center>
   <b><font size="5">PEMERINTAH KABUPATEN KEDIRI</font><br>
   <b> <font size="5">DINAS PENDIDIKAN PEMUDA DAN OLAHRAGA</font><br>
    <font size="4">UPT SMP NEGERI 2 KUNJANG</font><br></b>
    <font size="3">Jl Raya Kunjang - Badas No 263, Kuwik, Kunjang Kab. Kediri Telp : (0354) 393127</font><br>
    <font size="3">Website http://www.smpn2kunjangkabkediri.sch.id E-mail : info@smpn2kunjangkabkediri.sch.id</font><br>
<b><font size="4">K E D I R I</font>&ensp; Kode Pos 64156</b>
<br>
</table>
</center>
    <div class="garis-horizontal"></div>
    <br>
<table>
@foreach ($dataPengguna as $user)
<center><b><font size="4">P E N G U M U M A N</font><br></b> 
<font size="3">NOMOR : {{ $user->id }} / {{ $user->nis }} / 2023</font><br></b>
<font size="3">TENTANG <br> SELEKSI INTERNAL PENERIMAAN CALON PESERTA BEASISWA</font><br></b>
</center>
<br>
<br>
<table cellpadding="0" cellspacing="0" style="margin-right:9pt; margin-left:9pt; border-collapse:collapse; float:left;">
        <tbody>
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; padding-left:100.4pt; padding-right:10.4pt; vertical-align:top;">Diberitahukan bahwa peserta didik di bawah ini dengan keterangan : </p>
                <tr><td style="width:187.65pt; padding-right:2pt; padding-left:132.2pt; vertical-align:top;">
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;">Nama Peserta Didik&ensp; &ensp;: {{ $user->nama }}</p>
                </td>
                </tr>
                <tr><td style="width:187.65pt; padding-right:2pt; padding-left:132.2pt; vertical-align:top;">
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;">NIS&ensp;&ensp;&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; : {{ $user->nis }}</p>
                </td>
                </tr>
                <tr><td style="width:187.65pt; padding-right:2pt; padding-left:132.2pt; vertical-align:top;">
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;">Kelas&ensp;&ensp;&ensp;&ensp;&emsp;&emsp;&emsp;&emsp;&emsp;: {{ $user->kelas }}</p>
                </td>
                </tr>
                <tr><td style="width:187.65pt; padding-right:2pt; padding-left:132.2pt; vertical-align:top;">
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;">Tahun Ajaran&ensp;&ensp;&ensp;&ensp;&ensp;&emsp; : {{ $user->tahun_ajaran }}</p>
                </td>
                </tr>
                <tr><td style="width:187.65pt; padding-right:2pt; padding-left:132.2pt; vertical-align:top;">
        <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%;">Nilai Rangking&ensp;&emsp;&emsp;&ensp;: {{ $user->nilai_rangking }}</p>
                </td>
                </tr>
                <tr>
    </tbody>      
</table>
    </table>
    <div style=" margin-top: 17%">
    <p style="margin-top:0pt; margin-bottom:0pt; line-height:150%; padding-left:100.4pt; padding-right:10.4pt; vertical-align:top;">
    Dinyatakan {{ $user->status }} seleksi internal beasiswa SMP Negeri 2 Kunjang. Dihimbau untuk segera menyerahkan berkas administrasi ke ruang tata usaha.</p>

</div>


            
<div style="margin-left: 50%; margin-top: 20%">
        <span style="text-align: center;">
            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; line-height:150%;">&nbsp;</p>
            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; line-height:150%;">&nbsp;</p>
            <p style='margin:0cm; text-align:center;font-size:16px;font-family:"Arial",sans-serif;'>

            
            <p style='margin:0cm; padding-right:2pt; padding-left:2pt;  text-align:center;font-size:15px;font-family:"Arial",sans-serif;'>KEPALA SEKOLAH</p>
            <p style='margin:0cm; text-align:center;font-size:16px;font-family:"Arial",sans-serif;'>SMP NEGERI 2 KUNJANG</p>
            <p style='margin:0cm; text-align:center;font-size:16px;font-family:"Arial",sans-serif;'>&nbsp;</p>
            <p style='margin:0cm;text-align:center;font-size:16px;font-family:"Arial",sans-serif;'>&nbsp;</p>
            <p style='margin:0cm;text-align:center;font-size:16px;font-family:"Arial",sans-serif;'>&nbsp;</p>
            <p style='margin:0cm;text-align:center;font-size:16px;font-family:"Arial",sans-serif;'>&nbsp;</p>
            <p style='margin:0cm; text-align:center;font-size:16px;font-family:"Arial",sans-serif;'><strong><u>Taufik Hariadi          </u></strong></p>
            <p style="margin: 0cm; text-align: center; font-size: 16px; font-family: Arial, sans-serif;">NIP. 19680511 199403 2 009</p>
            <p style="margin-top:0pt; margin-bottom:0pt; text-align:left; line-height:150%;">&nbsp;</p>
        </span>
    </div>
</td>
@endforeach
</tbody>
<script type="text/javascript">
window.print();
</script>
        </body></html>