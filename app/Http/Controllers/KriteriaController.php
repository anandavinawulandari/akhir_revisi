<?php

namespace App\Http\Controllers;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class KriteriaController extends Controller
{
    public function search(Request $request) {
        if($request->has('search')){
            $data = DB::table('kriteria')
        ->join('subkriteria', 'kriteria.kode_kriteria', '=', 'subkriteria.kode_kriteria')
        ->select(
            'kriteria.kode_kriteria',
            'kriteria.kriteria',
            'kriteria.bobot_kriteria',
            'kriteria.jenis_atribut',
            DB::raw('GROUP_CONCAT(DISTINCT subkriteria.subkriteria ORDER BY subkriteria.subkriteria SEPARATOR ", ") AS subkriteria')
        )
        ->where('jenis_atribut','LIKE','%'.$request->search.'%')
        ->get();
        }
        else{
            $data = Kriteria::all();
        }
        return view('kriteria.index', ['dataKriteria' => $data]);
    }
    
    public function index(){
        $data = [
            'title' => 'Kriteria',
            'nav' => 'kriteria',
            'dataKriteria' => DB::table('kriteria')
            ->join('subkriteria', 'kriteria.kode_kriteria', '=', 'subkriteria.kode_kriteria')
            ->select(
                'kriteria.kode_kriteria',
                'kriteria.kriteria',
                'kriteria.bobot_kriteria',
                'kriteria.jenis_atribut',
                DB::raw('GROUP_CONCAT(DISTINCT subkriteria.subkriteria ORDER BY subkriteria.subkriteria SEPARATOR ", ") AS subkriteria')
            )
                ->groupBy('kriteria.kode_kriteria')
                ->orderBy('kode_kriteria')
                ->get()
        ];
        return view('kriteria.index',$data);
    }


    public function create()
    {
        return view('kriteria.create');
    }
    public function store(Request $request)
    {
        $data = new Kriteria;
        $data->kode_kriteria = $request->kode_kriteria;
        $data->kriteria = $request->kriteria;
        $data->bobot_kriteria = $request->bobot_kriteria;
        $data->jenis_atribut = $request->jenis_atribut;
        $data->save();
        return redirect('/kriteria');
    }
    public function edit($kode_kriteria)
    {
        $data = Kriteria::find($kode_kriteria);
        $kode = $data->kode_kriteria;
        return view('kriteria.edit', compact('data','kode_kriteria'));
    }
    public function update(Request $request, $kode_kriteria){

        $data= Kriteria::find($kode_kriteria);
        $data->kriteria = $request->kriteria;
        $data->bobot_kriteria = $request->bobot_kriteria;
        $data->jenis_atribut = $request->jenis_atribut;
        $data->update();
        return redirect('/kriteria')->with('sucess','Data Berhasil Diubah');
    }
    public function destroy($kode_kriteria)
    {
        $data = Kriteria::find($kode_kriteria);
        $data->delete();
        return redirect('/kriteria')->with('sucess','Data Berhasil Dihapus');    
    }
    public function pdfKriteria(){
        
        // $data = Kriteria::all();
        $data = DB::table('kriteria')
        ->join('subkriteria', 'kriteria.kode_kriteria', '=', 'subkriteria.kode_kriteria')
        ->select(
            'kriteria.kode_kriteria',
            'kriteria.kriteria',
            'kriteria.bobot_kriteria',
            'kriteria.jenis_atribut',
            DB::raw('GROUP_CONCAT(DISTINCT subkriteria.subkriteria ORDER BY subkriteria.subkriteria SEPARATOR ", ") AS subkriteria')
        )
            ->groupBy('kriteria.kode_kriteria')
            ->orderBy('kode_kriteria')
            ->get();
        return view('kriteria.pdfKriteria', ['dataKriteria' => $data]);
    }
}
