<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Pesdik;
use App\Models\Hasil;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function __construct1()
    {
        $this->middleware('auth');
    }
    public function __construct3()
    {
        $this->middleware('pesdik')->only('index2');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [

            'jmlsiswa1' => DB::table('pesdik')
                ->where('tahun_ajaran', '=', '2022/2023')->count(),
            'jmlsiswa2' => DB::table('pesdik')
                ->where('tahun_ajaran', '=', '2021/2022')->count(),
            'jmlsiswalolos' => DB::table('hasil')
                ->where('status', '=', 'LOLOS')->count(),
            'jmlsiswalolos2' => DB::table('hasil')
                ->where('status', '=', 'TIDAK LOLOS')->count(),
            'siswa' => DB::table('pesdik')
                ->where('nis')
                ->get(),
            'siswa2' => DB::table('hasil')
                ->where('kode_hasil')
                ->get(),
            'dataUser' => DB::table('users')
                ->join('pesdik', 'users.nis', '=', 'pesdik.nis')
                ->select(
                    'users.name',
                    'users.id',
                    'users.email',
                    'users.password',
                    'users.deskripsipassword',
                    'users.level',
                    'pesdik.nis',
                    'pesdik.nama',
                    'pesdik.alamat',
                    'pesdik.kelas',
                    'pesdik.tahun_ajaran',
                )

                // ->groupBy('alternatif.kode_alternatif')
                // ->orderBy('kode_alternatif')
                ->get(),

            

            'dataRangking' => DB::table('hasil')
                ->join('pesdik', 'pesdik.nis', '=', 'hasil.nis')
                ->select(
                    'pesdik.nis',
                    'pesdik.nama',
                    'pesdik.alamat',
                    'hasil.kode_hasil',
                    'hasil.nilai_rangking',
                    'hasil.status',
                )
                // ->groupBy('alternatif.kode_alternatif')
                // ->orderBy('kode_alternatif')
                ->get(),
        ];
        return view('home', $data);
    }

    public function index2(Request $request)
    {
        // if ($user->isEmpty()){
        //     return view('home2');
        // }
        // else {
        //     return view('home2', $data, $user, ['user' => Auth::user()]);
        // }
        // Contoh penggunaan dalam query builder
        $user = [
            'dataPengguna' =>
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->join('pesdik', 'users.nis', '=', 'pesdik.nis')
                ->join('hasil', 'hasil.nis', '=', 'users.nis')
                ->select(
                    'users.name',
                    'users.id',
                    'users.email',
                    'users.password',
                    'users.deskripsipassword',
                    'users.level',
                    'pesdik.nis',
                    'hasil.nis',
                    'hasil.nilai_rangking',
                    'hasil.status',
                    'pesdik.nama',
                    'pesdik.alamat',
                    'pesdik.kelas',
                    'pesdik.tahun_ajaran',
                    'pesdik.ttl',
                )
                ->get()
        ];
        $data = [

            'jmlsiswa1' => DB::table('pesdik')
                ->where('tahun_ajaran', '=', '2022/2023')->count(),
            'jmlsiswa2' => DB::table('pesdik')
                ->where('tahun_ajaran', '=', '2021/2022')->count(),
            'jmlsiswalolos' => DB::table('hasil')
                ->where('status', '=', 'LOLOS')->count(),
            'jmlsiswalolos2' => DB::table('hasil')
                ->where('status', '=', 'TIDAK LOLOS')->count(),
            'siswa' => DB::table('pesdik')
                ->where('nis')
                ->get(),
            'siswa2' => DB::table('hasil')
                ->where('kode_hasil')
                ->get(),
            'dataUser' => Auth::user('users')
                ->join('pesdik', 'users.nis', '=', 'pesdik.nis')
                ->join('hasil', 'hasil.nis', '=', 'users.nis')
                ->select(
                    'users.name',
                    'users.id',
                    'users.email',
                    'users.password',
                    'users.deskripsipassword',
                    'users.level',
                    'pesdik.nis',
                    'hasil.nis',
                    'hasil.nilai_rangking',
                    'hasil.status',
                    'pesdik.nama',
                    'pesdik.alamat',
                    'pesdik.kelas',
                    'pesdik.tahun_ajaran',
                    'pesdik.ttl',
                )

                // ->groupBy('alternatif.kode_alternatif')
                // ->orderBy('kode_alternatif')
                ->get(),

            
            'dataRangking' => DB::table('hasil')
                ->join('pesdik', 'pesdik.nis', '=', 'hasil.nis')
                ->select(
                    'pesdik.nis',
                    'pesdik.nama',
                    'pesdik.alamat',
                    'hasil.kode_hasil',
                    'hasil.nilai_rangking',
                    'hasil.status',
                )
                // ->groupBy('alternatif.kode_alternatif')
                // ->orderBy('kode_alternatif')
                ->get(),
        ];
        return view('home2', $data, $user, ['user' => Auth::user()]);
    }

    public function cetak()
    {
        $user = [
            'dataPengguna' =>
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->join('pesdik', 'users.nis', '=', 'pesdik.nis')
                ->join('hasil', 'hasil.nis', '=', 'users.nis')
                ->select(
                    'users.name',
                    'users.id',
                    'users.email',
                    'users.password',
                    'users.deskripsipassword',
                    'users.level',
                    'pesdik.nis',
                    'hasil.nis',
                    'hasil.nilai_rangking',
                    'hasil.status',
                    'pesdik.nama',
                    'pesdik.alamat',
                    'pesdik.kelas',
                    'pesdik.tahun_ajaran',
                    'pesdik.ttl',
                )
                ->get()
        ];
        return view('cetak', $user, ['user' => Auth::user()]);
    }


}