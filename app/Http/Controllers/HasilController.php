<?php

namespace App\Http\Controllers;
use App\Models\Hasil;
use App\Models\Pesdik;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\DataTables\HasilDataTable;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcelHasil;

class HasilController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->only('index');
    }
    public function __construct1(){
        $this->middleware('pesdik');
    }

    
    public function search(Request $request) {
        if($request->has('search')){
            $data = DB::table('hasil')
                ->join('pesdik', 'pesdik.nis', '=', 'hasil.nis')
                ->select(
                        'hasil.nilai_rangking',
                        'hasil.kode_alternatif',
                        'pesdik.nis',
                        'pesdik.nama',
                        'pesdik.alamat',
                        'pesdik.kelas',
                        'pesdik.jk',
                    )
                ->where('nama','LIKE','%'.$request->search.'%')
                ->simplePaginate(5);
        }

        else{
            $data = Hasil::all();
        }
        return view('hasil.index', ['dataHasil' => $data]);
    }

    public function edit($kode_hasil)
    {
        $data = Hasil::find($kode_hasil);
        return view('hasil.edit', compact('data'));
    }
    public function update(Request $request, $kode_hasil){

        $data= Hasil::find($kode_hasil);
        $data->nis = $request->nis;
        $data->kode_kriteria = $request->kode_kriteria;
        $data->kode_subkriteria = $request->kode_subkriteria;
        $data->nilai_rangking = $request->nilai_rangking;
        $data->status = $request->status;
        $data->update();
        return redirect('/hasil3')->with('sucess','Data Berhasil Divalidasi');
    }

    public function index(Request $request){

        $data_tahun_ajaran = DB::table('pesdik')
        ->select('tahun_ajaran')
        ->groupBy('tahun_ajaran')->get();

        foreach ($data_tahun_ajaran as $tahun_ajaran) 
        {
            // dd($tahun_ajaran->tahun_ajaran);
            $t_ajaran = $tahun_ajaran->tahun_ajaran;
            $data = DB::table('alternatif')
            ->join('pesdik', 'pesdik.nis', '=', 'alternatif.nis')
            ->select(
                    'alternatif.*',
                    'pesdik.nis',
                    'pesdik.nama',
                    'pesdik.alamat',
                    'pesdik.kelas',
                    'pesdik.jk',
                    'pesdik.tahun_ajaran',
                    )
            ->where('pesdik.tahun_ajaran', $t_ajaran)
            ->get();

            // dd($data);

            //query untuk mengambil data max atau min bobot nilai
            $bobot = DB::select("SELECT MAX(bobot_riwayat) max_c1, MAX(bobot_pekerjaan) max_c2, MIN(bobot_penghasilan) min_c3,
                        MAX(bobot_jml_tanggungan) max_c4, MAX(bobot_nilai) max_c5 FROM alternatif left join pesdik on pesdik.nis=alternatif.nis
                        WHERE pesdik.tahun_ajaran='$t_ajaran'")[0];
            // dd($bobot);
            //query untuk mengambil data bobot kriteria
            $bk_c1 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C1'")[0];
            $bk_c2 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C2'")[0];
            $bk_c3 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C3'")[0];
            $bk_c4 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C4'")[0];
            $bk_c5 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C5'")[0];

            foreach ($data as $key) {

                $c1 = $key->bobot_riwayat / $bobot->max_c1;
                $c2 = $key->bobot_pekerjaan / $bobot->max_c2;
                $c3 = $bobot->min_c3 / $key->bobot_penghasilan;
                $c4 = $key->bobot_jml_tanggungan / $bobot->max_c4;
                $c5 = $key->bobot_nilai / $bobot->max_c5;

                $hasil = ($bk_c1->bobot_kriteria * $c1) + ($bk_c2->bobot_kriteria * $c2) 
                        + ($bk_c3->bobot_kriteria * $c3) + ($bk_c4->bobot_kriteria * $c4)
                        + ($bk_c5->bobot_kriteria * $c5);

                $cek = DB::select("SELECT * FROM hasil WHERE kode_alternatif='$key->kode_alternatif' AND nis='$key->nis'");

                //query untuk mengambil data preferensi
                // $prefc1 = DB::select("SELECT c1 FROM hasil")[0];
                // $prefc2 = DB::select("SELECT c2 FROM hasil")[0];
                // $prefc3 = DB::select("SELECT c3 FROM hasil")[0];
                // $prefc4 = DB::select("SELECT c4 FROM hasil")[0];
                // $prefc5 = DB::select("SELECT c5 FROM hasil")[0];

                $databkc1 = $bk_c1->bobot_kriteria;
                $databkc2 = $bk_c2->bobot_kriteria;
                $databkc3 = $bk_c3->bobot_kriteria;
                $databkc4 = $bk_c4->bobot_kriteria;
                $databkc5 = $bk_c5->bobot_kriteria;
                $bobotc1 = $c1 * $bk_c1->bobot_kriteria;
                $bobotc2 = $c2 * $bk_c2->bobot_kriteria;
                $bobotc3 = $c3 * $bk_c3->bobot_kriteria;
                $bobotc4 = $c4 * $bk_c4->bobot_kriteria;
                $bobotc5 = $c5 * $bk_c5->bobot_kriteria;

                // echo $hasil.'<br>';
                if(empty($cek)){
                    $insert = new Hasil;
                    $insert->nilai_rangking = $hasil;
                    $insert->nis = $key->nis;
                    $insert->kode_alternatif = $key->kode_alternatif;
                    $insert->c1 = $c1;
                    $insert->c2 = $c2;
                    $insert->c3 = $c3;
                    $insert->c4 = $c4;
                    $insert->c5 = $c5;
                    $insert->bobotc1 = $bobotc1;
                    $insert->bobotc2 = $bobotc2;
                    $insert->bobotc3 = $bobotc3;
                    $insert->bobotc4 = $bobotc4;
                    $insert->bobotc5 = $bobotc5;
                    $insert->save();
                }else{
                    if($cek[0]->nilai_rangking != $hasil){
                        $update = Hasil::find($cek[0]->kode_hasil);
                        $update->nilai_rangking = $hasil;
                        $update->c1 = $c1;
                        $update->c2 = $c2;
                        $update->c3 = $c3;
                        $update->c4 = $c4;
                        $update->c5 = $c5;
                        $update->bobotc1 = $bobotc1;
                        $update->bobotc2 = $bobotc2;
                        $update->bobotc3 = $bobotc3;
                        $update->bobotc4 = $bobotc4;
                        $update->bobotc5 = $bobotc5;
                        $update->update();
                    }
                }

                

            }
            // dd($hasil);
            // die();
            // dd($data);
        }
        
        // $bobot1 = 25;
        // $bobot2 = 25;
        // $bobot3 = 20;
        // $bobot4 = 20;
        // $bobot5 = 10;

        $result = DB::table('hasil')
        ->join('pesdik', 'pesdik.nis', '=', 'hasil.nis')
        ->select(
                'hasil.kode_hasil',
                'hasil.nilai_rangking',
                'hasil.status',
                'hasil.kode_alternatif',
                'pesdik.nis',
                'pesdik.nama',
                'pesdik.alamat',
                'pesdik.kelas',
                'pesdik.jk',
                'pesdik.tahun_ajaran',
                'hasil.c1',
                'hasil.c2',
                'hasil.c3',
                'hasil.c4',
                'hasil.c5',
                'hasil.bobotc1',
                'hasil.bobotc2',
                'hasil.bobotc3',
                'hasil.bobotc4',
                'hasil.bobotc5',
            )
            ->orderBy('nilai_rangking', 'desc');

        $ta = "";
        if($request->has('tahun_ajaran')){
            $ta = $request->tahun_ajaran;
        }

        if($ta!=''){
            $result = $result->where('pesdik.tahun_ajaran', $ta)->get();
        }else{
            $result = $result->get();
        }
        // dd($result);
        // $data = Hasil::all();
        

        return view('hasil.index', ['dataHasil' => $result, 'ta' => $ta,'data' => $data], ['dataAlternatif' => $data,'key' => $key, 'bobot' => $bobot,'databkc1' => $databkc1,'databkc2' => $databkc2,'databkc3' => $databkc3,'databkc4' => $databkc4,'databkc5' => $databkc5,'hasil' => $hasil, 't_ajaran' => $t_ajaran, 'bk_c1' => $bk_c1, 'bk_c2' => $bk_c2, 'bk_c3' => $bk_c3, 'bk_c4' => $bk_c4, 'bk_c5' => $bk_c5, 'bobotc1' => $bobotc1,'bobotc2' => $bobotc2,'bobotc3' => $bobotc3,'bobotc4' => $bobotc4,'bobotc5' => $bobotc5], compact('databkc1', 'hasil', 't_ajaran', 'key','cek', 'bk_c1', 'bk_c2', 'bk_c3', 'bk_c4', 'bk_c5'));
    }

    public function index3(Request $request){

        $data_tahun_ajaran = DB::table('pesdik')
        ->select('tahun_ajaran')
        ->groupBy('tahun_ajaran')->get();

        foreach ($data_tahun_ajaran as $tahun_ajaran) 
        {
            // dd($tahun_ajaran->tahun_ajaran);
            $t_ajaran = $tahun_ajaran->tahun_ajaran;
            $data = DB::table('alternatif')
            ->join('pesdik', 'pesdik.nis', '=', 'alternatif.nis')
            ->select(
                    'alternatif.*',
                    'pesdik.nis',
                    'pesdik.nama',
                    'pesdik.alamat',
                    'pesdik.kelas',
                    'pesdik.jk',
                    'pesdik.tahun_ajaran',
                    )
            ->where('pesdik.tahun_ajaran', $t_ajaran)
            ->get();

            // dd($data);
            //query untuk mengambil data max atau min bobot nilai
            $bobot = DB::select("SELECT MAX(bobot_riwayat) max_c1, MAX(bobot_pekerjaan) max_c2, MIN(bobot_penghasilan) min_c3,
                        MAX(bobot_jml_tanggungan) max_c4, MAX(bobot_nilai) max_c5 FROM alternatif left join pesdik on pesdik.nis=alternatif.nis
                        WHERE pesdik.tahun_ajaran='$t_ajaran'")[0];
            // dd($bobot);

            //query untuk mengambil data bobot kriteria
            $bk_c1 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C1'")[0];
            $bk_c2 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C2'")[0];
            $bk_c3 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C3'")[0];
            $bk_c4 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C4'")[0];
            $bk_c5 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C5'")[0];

           

            foreach ($data as $key) {

                $c1 = $key->bobot_riwayat / $bobot->max_c1;
                $c2 = $key->bobot_pekerjaan / $bobot->max_c2;
                $c3 = $bobot->min_c3 / $key->bobot_penghasilan;
                $c4 = $key->bobot_jml_tanggungan / $bobot->max_c4;
                $c5 = $key->bobot_nilai / $bobot->max_c5;

                $hasil = ($bk_c1->bobot_kriteria * $c1) + ($bk_c2->bobot_kriteria * $c2) 
                        + ($bk_c3->bobot_kriteria * $c3) + ($bk_c4->bobot_kriteria * $c4)
                        + ($bk_c5->bobot_kriteria * $c5);

                $cek = DB::select("SELECT * FROM hasil WHERE kode_alternatif='$key->kode_alternatif' AND nis='$key->nis'");

                //query untuk mengambil data preferensi
                // $prefc1 = DB::select("SELECT c1 FROM hasil")[0];
                // $prefc2 = DB::select("SELECT c2 FROM hasil")[0];
                // $prefc3 = DB::select("SELECT c3 FROM hasil")[0];
                // $prefc4 = DB::select("SELECT c4 FROM hasil")[0];
                // $prefc5 = DB::select("SELECT c5 FROM hasil")[0];

                $databkc1 = $bk_c1->bobot_kriteria;
                $databkc2 = $bk_c2->bobot_kriteria;
                $databkc3 = $bk_c3->bobot_kriteria;
                $databkc4 = $bk_c4->bobot_kriteria;
                $databkc5 = $bk_c5->bobot_kriteria;
                $bobotc1 = $c1 * $bk_c1->bobot_kriteria;
                $bobotc2 = $c2 * $bk_c2->bobot_kriteria;
                $bobotc3 = $c3 * $bk_c3->bobot_kriteria;
                $bobotc4 = $c4 * $bk_c4->bobot_kriteria;
                $bobotc5 = $c5 * $bk_c5->bobot_kriteria;

                // echo $hasil.'<br>';
                if(empty($cek)){
                    $insert = new Hasil;
                    $insert->nilai_rangking = $hasil;
                    $insert->nis = $key->nis;
                    $insert->kode_alternatif = $key->kode_alternatif;
                    $insert->c1 = $c1;
                    $insert->c2 = $c2;
                    $insert->c3 = $c3;
                    $insert->c4 = $c4;
                    $insert->c5 = $c5;
                    $insert->bobotc1 = $bobotc1;
                    $insert->bobotc2 = $bobotc2;
                    $insert->bobotc3 = $bobotc3;
                    $insert->bobotc4 = $bobotc4;
                    $insert->bobotc5 = $bobotc5;
                    $insert->save();
                }else{
                    if($cek[0]->nilai_rangking != $hasil){
                        $update = Hasil::find($cek[0]->kode_hasil);
                        $update->nilai_rangking = $hasil;
                        $update->c1 = $c1;
                        $update->c2 = $c2;
                        $update->c3 = $c3;
                        $update->c4 = $c4;
                        $update->c5 = $c5;
                        $update->bobotc1 = $bobotc1;
                        $update->bobotc2 = $bobotc2;
                        $update->bobotc3 = $bobotc3;
                        $update->bobotc4 = $bobotc4;
                        $update->bobotc5 = $bobotc5;
                        $update->update();
                    }
                }
            }
            // dd($hasil);
            // die();
            // dd($data);
        }
        
        // $bobot1 = 25;
        // $bobot2 = 25;
        // $bobot3 = 20;
        // $bobot4 = 20;
        // $bobot5 = 10;
        //MENAMPILKAN DATA DARI SUBKRITERIA SISWA DI TAMPILAN VALIDASI HASIL

        
        $result = DB::table('hasil')
        ->join('pesdik', 'pesdik.nis', '=', 'hasil.nis')
        ->select(
                'hasil.kode_hasil',
                'hasil.nilai_rangking',
                'hasil.status',
                'hasil.kode_alternatif',
                'pesdik.nis',
                'pesdik.nama',
                'pesdik.alamat',
                'pesdik.kelas',
                'pesdik.jk',
                'pesdik.tahun_ajaran',
                'pesdik.riwayat',
                'pesdik.pekerjaan',
                'pesdik.penghasilan',
                'pesdik.jml_tanggungan',
                'pesdik.nilai',
                'hasil.c1',
                'hasil.c2',
                'hasil.c3',
                'hasil.c4',
                'hasil.c5',
                'hasil.bobotc1',
                'hasil.bobotc2',
                'hasil.bobotc3',
                'hasil.bobotc4',
                'hasil.bobotc5',
            )
            ->orderBy('nilai_rangking', 'desc');

        $ta = "";
        if($request->has('tahun_ajaran')){
            $ta = $request->tahun_ajaran;
        }

        if($ta!=''){
            $result = $result->where('pesdik.tahun_ajaran', $ta)->get();
        }else{
            $result = $result->get();
        }
        // dd($result);
        // $data = Hasil::all();
        
        return view('hasil.index3', ['dataHasil' => $result, 'ta' => $ta,'data' => $data], ['dataAlternatif' => $data,'key' => $key, 'bobot' => $bobot,'databkc1' => $databkc1,'databkc2' => $databkc2,'databkc3' => $databkc3,'databkc4' => $databkc4,'databkc5' => $databkc5,'hasil' => $hasil, 't_ajaran' => $t_ajaran, 'bk_c1' => $bk_c1, 'bk_c2' => $bk_c2, 'bk_c3' => $bk_c3, 'bk_c4' => $bk_c4, 'bk_c5' => $bk_c5, 'bobotc1' => $bobotc1,'bobotc2' => $bobotc2,'bobotc3' => $bobotc3,'bobotc4' => $bobotc4,'bobotc5' => $bobotc5], compact('databkc1', 'hasil', 't_ajaran', 'key','cek', 'bk_c1', 'bk_c2', 'bk_c3', 'bk_c4', 'bk_c5'));
    }

    public function index2(Request $request){
        // $data = Hasil::all();
        $data_tahun_ajaran = DB::table('pesdik')
        ->select('tahun_ajaran'
        )->groupBy('tahun_ajaran')->get();

        foreach ($data_tahun_ajaran as $tahun_ajaran) 
        {
            // dd($tahun_ajaran->tahun_ajaran);
            $t_ajaran = $tahun_ajaran->tahun_ajaran;
            $data = DB::table('alternatif')
            ->join('pesdik', 'pesdik.nis', '=', 'alternatif.nis')
            ->select(
                    'alternatif.*',
                    'pesdik.nis',
                    'pesdik.nama',
                    'pesdik.alamat',
                    'pesdik.kelas',
                    'pesdik.jk',
                    'pesdik.tahun_ajaran',
                    )
            ->where('pesdik.tahun_ajaran', $t_ajaran)
            ->get();

            // dd($data);

                //query untuk mengambil data max atau min bobot nilai
            $bobot = DB::select("SELECT MAX(bobot_riwayat) max_c1, MAX(bobot_pekerjaan) max_c2, MIN(bobot_penghasilan) min_c3,
                        MAX(bobot_jml_tanggungan) max_c4, MAX(bobot_nilai) max_c5 FROM alternatif left join pesdik on pesdik.nis=alternatif.nis
                        WHERE pesdik.tahun_ajaran='$t_ajaran'")[0];
            // dd($bobot);

                //query untuk mengambil data bobot kriteria
            $bk_c1 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C1'")[0];
            $bk_c2 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C2'")[0];
            $bk_c3 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C3'")[0];
            $bk_c4 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C4'")[0];
            $bk_c5 = DB::select("SELECT * FROM kriteria WHERE kode_kriteria='C5'")[0];


            foreach ($data as $key) {

                $c1 = $key->bobot_riwayat / $bobot->max_c1;
                $c2 = $key->bobot_pekerjaan / $bobot->max_c2;
                $c3 = $bobot->min_c3 / $key->bobot_penghasilan;
                $c4 = $key->bobot_jml_tanggungan / $bobot->max_c4;
                $c5 = $key->bobot_nilai / $bobot->max_c5;

                $hasil = ($bk_c1->bobot_kriteria * $c1) + ($bk_c2->bobot_kriteria * $c2) 
                        + ($bk_c3->bobot_kriteria * $c3) + ($bk_c4->bobot_kriteria * $c4)
                        + ($bk_c5->bobot_kriteria * $c5);

                $cek = DB::select("SELECT * FROM hasil WHERE kode_alternatif='$key->kode_alternatif' AND nis='$key->nis'");

                // echo $hasil.'<br>';
                if(empty($cek)){
                    $insert = new Hasil;
                    $insert->nilai_rangking = $hasil;
                    $insert->nis = $key->nis;
                    $insert->kode_alternatif = $key->kode_alternatif;
                    $insert->save();
                }else{
                    if($cek[0]->nilai_rangking != $hasil){
                        $update = Hasil::find($cek[0]->kode_hasil);
                        $update->nilai_rangking = $hasil;
                        $update->update();
                    }
                }

                

            }
            // die();
            // dd($data);
        }

        $result = DB::table('hasil')
        ->join('pesdik', 'pesdik.nis', '=', 'hasil.nis')
        ->select(
                'hasil.kode_hasil',
                'hasil.nilai_rangking',
                'hasil.status',
                'hasil.kode_alternatif',
                'pesdik.nis',
                'pesdik.nama',
                'pesdik.alamat',
                'pesdik.kelas',
                'pesdik.jk',
                'pesdik.tahun_ajaran'
            )
            ->orderBy('nilai_rangking', 'desc');

        $ta = "";
        if($request->has('tahun_ajaran')){
            $ta = $request->tahun_ajaran;
        }

        if($ta!=''){
            $result = $result->where('pesdik.tahun_ajaran', $ta)->get();
        }else{
            $result = $result->get();
        }
        // dd($data_tahun_ajaran);
        // $data = Hasil::all();
        

        return view('hasil.index2', ['dataHasil' => $result, 'ta' => $ta]);
    }

    public function create()
    {
        return view('hasil.create');
    }
    public function store(Request $request)
    {
        $data = new Hasil;
        $data->kode_hasil = $request->kode_hasil;
        $data->nilai_rangking = $request->nilai_rangking;
        $data->kode_kriteria = $request->kode_kriteria;
        $data->kode_alternatif = $request->kode_alternatif;
        $data->save();
        return redirect('/hasil');
    }
    public function pdfHasil(){
        // $data = Hasil::all();
        
        $result = DB::table('hasil')
        ->join('pesdik', 'pesdik.nis', '=', 'hasil.nis')
        ->select(
                'hasil.kode_hasil',
                'hasil.nilai_rangking',
                'hasil.status',
                'hasil.kode_alternatif',
                'pesdik.nis',
                'pesdik.nama',
                'pesdik.alamat',
                'pesdik.kelas',
                'pesdik.jk',
                'pesdik.tahun_ajaran',
                'hasil.c1',
                'hasil.c2',
                'hasil.c3',
                'hasil.c4',
                'hasil.c5',
                'hasil.bobotc1',
                'hasil.bobotc2',
                'hasil.bobotc3',
                'hasil.bobotc4',
                'hasil.bobotc5',
            )
            ->orderBy('nilai_rangking', 'desc')
            ->get();
        return view('hasil.pdfHasil', ['dataHasil' => $result]);
    }
    public function pdfHasil2(){
        // $data = Hasil::all();
        $result = DB::table('hasil')
        ->join('pesdik', 'pesdik.nis', '=', 'hasil.nis')
        ->select(
                'hasil.kode_hasil',
                'hasil.nilai_rangking',
                'hasil.status',
                'hasil.kode_alternatif',
                'pesdik.nis',
                'pesdik.nama',
                'pesdik.alamat',
                'pesdik.kelas',
                'pesdik.jk',
                'pesdik.tahun_ajaran',
                'hasil.c1',
                'hasil.c2',
                'hasil.c3',
                'hasil.c4',
                'hasil.c5',
                'hasil.bobotc1',
                'hasil.bobotc2',
                'hasil.bobotc3',
                'hasil.bobotc4',
                'hasil.bobotc5',
            )
            ->orderBy('nilai_rangking', 'desc')
            ->get();
        return view('hasil.pdfHasil2', ['dataHasil' => $result]);
    }

    public function showseleksi($nis)
    {
        $data  = Pesdik::find($nis);
        
        $riwayat        = DB::select("SELECT subkriteria FROM subkriteria WHERE kode_subkriteria = '$data->riwayat'")[0];
        $pekerjaan      = DB::select("SELECT subkriteria FROM subkriteria WHERE kode_subkriteria = '$data->pekerjaan'")[0];
        $penghasilan    = DB::select("SELECT subkriteria FROM subkriteria WHERE kode_subkriteria = '$data->penghasilan'")[0];
        $jml_tanggungan = DB::select("SELECT subkriteria FROM subkriteria WHERE kode_subkriteria = '$data->jml_tanggungan'")[0];
        $nilai          = DB::select("SELECT subkriteria FROM subkriteria WHERE kode_subkriteria = '$data->nilai'")[0];
        $bobot_nilai_1  = DB::select("SELECT bobot_nilai FROM subkriteria WHERE kode_subkriteria = '$data->riwayat'")[0];
        $bobot_nilai_2  = DB::select("SELECT bobot_nilai FROM subkriteria WHERE kode_subkriteria = '$data->pekerjaan'")[0];
        $bobot_nilai_3  = DB::select("SELECT bobot_nilai FROM subkriteria WHERE kode_subkriteria = '$data->penghasilan'")[0];
        $bobot_nilai_4  = DB::select("SELECT bobot_nilai FROM subkriteria WHERE kode_subkriteria = '$data->jml_tanggungan'")[0];
        $bobot_nilai_5  = DB::select("SELECT bobot_nilai FROM subkriteria WHERE kode_subkriteria = '$data->nilai'")[0];
        
    
        // dd($nilai);
        return view('hasil.viewseleksi', compact('data', 'riwayat', 'pekerjaan', 'penghasilan', 'jml_tanggungan', 'nilai','bobot_nilai_1','bobot_nilai_2','bobot_nilai_3','bobot_nilai_4','bobot_nilai_5'));
    }

    public function destroy($kode_hasil)
    {
        $data = Hasil::find($kode_hasil);
        $data->delete();
        return redirect('/hasil')->with('sucess','Data Berhasil Dihapus');    
    }
    public function exportExcelHasil(){
        
        return Excel::download(new exportExcelHasil , 'DataSeleksi.xlsx');
    }
}