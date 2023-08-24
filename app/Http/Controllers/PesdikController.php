<?php

namespace App\Http\Controllers;
use App\Models\Pesdik;
use App\Models\Hasil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables;
use App\Models\Subkriteria;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcelPesdik;

class PesdikController extends Controller
{
    public function __construct(){
        $this->middleware('admin')->only('index2');
    }
    public function __construct1(){
        $this->middleware('pesdik');
    }
    public function index(){
        $data = Pesdik::all();
        return view('pesdik.index', ['
        esdik' => $data]);
    }
    public function index2(Request $request){
        
        $ta = "";
        $data = Pesdik::all();
        if($request->has('tahun_ajaran')){
            $ta = $request->tahun_ajaran;
            if($ta!=""){
                $data = Pesdik::where('tahun_ajaran', '=', $ta)->get();
            }
        }
        // dd($ta);
        
        return view('pesdik.index2', ['dataPesdik' => $data, 'ta' => $ta]);
    }
    public function index3(Request $request){
        $ta = "";
        $data = Pesdik::all();
        if($request->has('tahun_ajaran')){
            $ta = $request->tahun_ajaran;
            if($ta!=""){
                $data = Pesdik::where('tahun_ajaran', '=', $ta)->get();
            }
        }

        
        // dd($ta);
        return view('pesdik.index3', ['dataPesdik' => $data, 'ta' => $ta]);
    }

    public function index4(Request $request){
        
        $ta = "";
        $data = Pesdik::all();
        if($request->has('tahun_ajaran')){
            $ta = $request->tahun_ajaran;
            if($ta!=""){
                $data = Pesdik::where('tahun_ajaran', '=', $ta)->get();
            }
        }
        // dd($ta);
        
        return view('pesdik.index4', ['dataPesdik' => $data, 'ta' => $ta]);
    }
    public function create()
    {
        $ref_subkriteria= DB::select('SELECT * FROM subkriteria');

        return view('pesdik.create', compact('ref_subkriteria'));
    }
    public function show($nis)
    {
        $data           = Pesdik::find($nis);
        $riwayat        = DB::select("SELECT subkriteria FROM subkriteria WHERE kode_subkriteria = '$data->riwayat'")[0];
        $pekerjaan      = DB::select("SELECT subkriteria FROM subkriteria WHERE kode_subkriteria = '$data->pekerjaan'")[0];
        $penghasilan    = DB::select("SELECT subkriteria FROM subkriteria WHERE kode_subkriteria = '$data->penghasilan'")[0];
        $jml_tanggungan = DB::select("SELECT subkriteria FROM subkriteria WHERE kode_subkriteria = '$data->jml_tanggungan'")[0];
        $nilai          = DB::select("SELECT subkriteria FROM subkriteria WHERE kode_subkriteria = '$data->nilai'")[0];
        
        // dd($nilai);
        return view('pesdik.view', compact('data', 'riwayat', 'pekerjaan', 'penghasilan', 'jml_tanggungan', 'nilai'));
    }

    public function showseleksi($nis)
    {
        $data           = Pesdik::find($nis);
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
        $status_p       = Hasil::find($nis);
        $statuss        = DB::select("SELECT status FROM hasil WHERE kode_hasil = '$status_p->status'")[0];
        // dd($nilai);
        return view('pesdik.viewseleksi', ['dataHasil' => $status_p], compact('data', 'riwayat', 'pekerjaan', 'penghasilan', 'jml_tanggungan', 'nilai','bobot_nilai_1','bobot_nilai_2','bobot_nilai_3','bobot_nilai_4','bobot_nilai_5'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'alamat' => 'required',
            'ttl' => 'required',
            'kelas' => 'required',
            'nilai' => 'required',
            'file' => 'required',
            'pekerjaan' => 'required',
            'jml_tanggungan' => 'required',
            'riwayat' => 'required',
            'penghasilan' => 'required',
            'no_hp' => 'required',
            'tahun_ajaran' => 'required',

        ]);
        $file = "";
        if($request->hasFile('file')){
            $filenameWithExt = $request->file('file')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('file')->getClientOriginalExtension();
            $filenameSimpan = $filename.'_'.time().'.'.$extension;
            $path = $request->file('file')->storeAs('public', $filenameSimpan);

            $file = $filenameSimpan;
        }
        // if ($request->file('file')) {
        //     $dokumen_file = $validatedData['file'];
        //     $dokumen_name =  time() . "-" . $dokumen_file->getClientOriginalName() . "." . $dokumen_file->getClientOriginalExtension();
        //     $path = public_path('storage/');
        //     $dokumen_file->move($path, $dokumen_name);
        //     $arsip_dokumen= 'storage/' . $dokumen_name;
        // }
        Pesdik::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'alamat' => $request->alamat,
            'ttl' => $request->ttl,
            'kelas' => $request->kelas,
            'nilai' => $request->nilai,
            'file' => $file,
            'pekerjaan' => $request->pekerjaan,
            'jml_tanggungan' => $request->jml_tanggungan,
            'riwayat' => $request->riwayat,
            'penghasilan' => $request->penghasilan,
            'no_hp' => $request->no_hp,
            'tahun_ajaran' => $request->tahun_ajaran
        ]);

        return redirect('/pesdik');
    }
    public function pdfPesdik(){
        $data = Pesdik::all();
        return view('pesdik.pdfPesdik', ['dataPesdik' => $data]);
    }
    public function destroy($nis)
    {
        $data = Pesdik::find($nis);
        $data->delete();
        return redirect('/pesdik2')->with('sucess','Data Berhasil Dihapus');    
    }
    public function exportExcelPesdik(){
        return Excel::download(new exportExcelPesdik, 'DataPendaftaran.xlsx');
    }   
}
