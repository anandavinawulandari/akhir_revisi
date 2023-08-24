<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use App\Models\Pesdik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ExportExcelAlternatif;

class AlternatifController extends Controller
{
    public function search(Request $request)
    {
        if ($request->has('search')) {
            $data = DB::table('alternatif')
                ->join('pesdik', 'pesdik.nis', '=', 'alternatif.nis')
                ->select(
                    'alternatif.kode_alternatif',
                    'pesdik.nis',
                    'pesdik.nama',
                    'pesdik.penghasilan',
                    'pesdik.nilai',
                    'pesdik.pekerjaan',
                    'pesdik.jml_tanggungan',
                    'pesdik.riwayat',
                    'alternatif.bobot_penghasilan',
                    'alternatif.bobot_nilai',
                    'alternatif.bobot_pekerjaan',
                    'alternatif.bobot_jml_tanggungan',
                    'alternatif.bobot_riwayat',
                )
                ->where('nama', 'LIKE', '%' . $request->search . '%')
                ->simplePaginate(5);
        } else {
            $data = Alternatif::all();
        }
        return view('alternatif.index', ['dataAlternatif' => $data]);
    }

    public function index()
    {
        $data = [
            'title' => 'Alternatif',
            'nav' => 'alternatif',
            'dataAlternatif' => DB::table('alternatif')
                ->join('pesdik', 'pesdik.nis', '=', 'alternatif.nis')
                ->select(
                    'alternatif.kode_alternatif',
                    'pesdik.nis',
                    'pesdik.nama',
                    'pesdik.penghasilan',
                    'pesdik.nilai',
                    'pesdik.tahun_ajaran',
                    'pesdik.pekerjaan',
                    'pesdik.jml_tanggungan',
                    'pesdik.riwayat',
                    'alternatif.bobot_penghasilan',
                    'alternatif.bobot_nilai',
                    'alternatif.bobot_pekerjaan',
                    'alternatif.bobot_jml_tanggungan',
                    'alternatif.bobot_riwayat',
                )
                // ->groupBy('alternatif.kode_alternatif')
                // ->orderBy('kode_alternatif')
                ->get()
        ];
        return view('alternatif.index', $data);
    }
    public function create()
    {
        $row_alternatif = DB::select("SELECT kode_alternatif FROM alternatif ORDER BY created_at DESC")[0];
        $awal = substr($row_alternatif->kode_alternatif, 0, 1);
        $akhir = substr($row_alternatif->kode_alternatif, 1) + 1;
        $current_id = $awal . $akhir;
        // dd($current_id);
        return view('alternatif.create', ['current_id' => $current_id]);
    }
    public function store(Request $request)
    {
        $cek = Alternatif::find($request->kode_alternatif);

        if (!empty($cek)) {
            return redirect('/tambahalternatif')->with('error', 'Kode Alternatif Sudah Ada');
            return false;
        } else {
            $cek2 = DB::select("SELECT * FROM alternatif WHERE nis='$request->nis'");
            if (!empty($cek2)) {
                return redirect('/tambahalternatif')->with('error', 'Data Alternatif Siswa Sudah Ada!');
                return false;
            }
        }

        $data = new Alternatif;
        $data->kode_alternatif = $request->kode_alternatif;
        $data->nis = $request->nis;
        $data->riwayat_c1 = $request->riwayat_c1;
        $data->pekerjaan_c2 = $request->pekerjaan_c2;
        $data->penghasilan_c3 = $request->penghasilan_c3;
        $data->jml_tanggungan_c4 = $request->jml_tanggungan_c4;
        $data->nilai_c5 = $request->nilai_c5;
        $data->bobot_riwayat = $this->cekbobot($request->riwayat_c1);
        $data->bobot_pekerjaan = $this->cekbobot($request->pekerjaan_c2);
        $data->bobot_penghasilan = $this->cekbobot($request->penghasilan_c3);
        $data->bobot_jml_tanggungan = $this->cekbobot($request->jml_tanggungan_c4);
        $data->bobot_nilai = $this->cekbobot($request->nilai_c5);
        $data->save();
        return redirect('/alternatif');
    }
    public function edit($kode_alternatif)
    {
        $data = Alternatif::find($kode_alternatif);

        $ref_subkriteria = DB::select('SELECT * FROM subkriteria');
        $kode = $data->kode_alternatif;
        // dd($kode_alternatif);
        return view('alternatif.edit', compact('data', 'ref_subkriteria', 'kode_alternatif'));
    }
    public function update(Request $request, $kode_alternatif)
    {
        $data = Alternatif::find($kode_alternatif);
        // dd($kode_alternatif);
        $data->nis = $request->nis;
        $data->riwayat_c1 = $request->riwayat_c1;
        $data->pekerjaan_c2 = $request->pekerjaan_c2;
        $data->penghasilan_c3 = $request->penghasilan_c3;
        $data->jml_tanggungan_c4 = $request->jml_tanggungan_c4;
        $data->nilai_c5 = $request->nilai_c5;
        $data->bobot_riwayat = $this->cekbobot($request->riwayat_c1);
        $data->bobot_pekerjaan = $this->cekbobot($request->pekerjaan_c2);
        $data->bobot_penghasilan = $this->cekbobot($request->penghasilan_c3);
        $data->bobot_jml_tanggungan = $this->cekbobot($request->jml_tanggungan_c4);
        $data->bobot_nilai = $this->cekbobot($request->nilai_c5);

        $data->update();
        return redirect('/alternatif')->with('sucess', 'Data Berhasil Diubah');
    }
    public function pdfAlternatif()
    {
        // $data = Alternatif::all();
        $data = DB::table('alternatif')
            ->join('pesdik', 'pesdik.nis', '=', 'alternatif.nis')
            ->select(
                'alternatif.kode_alternatif',
                'pesdik.nis',
                'pesdik.nama',
                'pesdik.penghasilan',
                'pesdik.nilai',
                'pesdik.pekerjaan',
                'pesdik.jml_tanggungan',
                'pesdik.riwayat',
                'alternatif.bobot_penghasilan',
                'alternatif.bobot_nilai',
                'alternatif.bobot_pekerjaan',
                'alternatif.bobot_jml_tanggungan',
                'alternatif.bobot_riwayat',
            )
            ->get();
        return view('alternatif.pdfAlternatif', ['dataAlternatif' => $data]);
    }


    public function getdetail(Request $request)
    {
        $nis = $request->input('nis');
        $detail = DB::select("SELECT * FROM pesdik WHERE nis ='$nis'");
        $ref_subkriteria = DB::select('SELECT * FROM subkriteria');
        $status = "0";
        if (!empty($detail)) {
            $status = "1";
        }
        header('Content-Type: application/json');
        echo json_encode(array('status' => $status, 'detail' => $detail, 'ref_subkriteria' => $ref_subkriteria));
    }

    public function cekbobot($kode_subkriteria)
    {
        $cek = DB::select("SELECT * FROM subkriteria WHERE kode_subkriteria='$kode_subkriteria'")[0];
        return $cek->bobot_nilai;
    }
    public function cektahun($nis)
    {
        $cek7 = DB::select("SELECT * FROM pesdik WHERE nis='$nis'")[0];
        return $cek7->tahun_ajaran;
    }

    public function destroy($kode_alternatif)
    {
        $data = Alternatif::find($kode_alternatif);
        $data->delete();
        return redirect('/alternatif')->with('sucess', 'Data Berhasil Dihapus');
    }
    public function exportExcelAlternatif()
    {
        return Excel::download(new exportExcelAlternatif, 'DataAlternatif.xlsx');
    }
}