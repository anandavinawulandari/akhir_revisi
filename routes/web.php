<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PesdikController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubkriteriaController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use App\Exports\HasilExport;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('register', '\App\Http\Controllers\Auth\RegisterController@register');


//ROUTE PESERTA DIDIK
Route::get('datapesdik', function () {
    return view('pesdik.index2');
});
Route::get('datapesdik', function () {
    return view('pesdik.index3')->middleware('auth', 'pesdik');
});
Route::get('datapesdik', function () {
    return view('pesdik.index4')->middleware('auth', 'pesdik');
});
Route::get('datapeserta', function () {
    return view('pesdik.index');
});
Route::post('/pesdik', [PesdikController::class, 'store'])->name('pesdik.store');
Route::get('/tambahpesdik', [PesdikController::class, 'create'])->name('pesdik.create');
Route::get('pesdik', [PesdikController::class, 'index'])->name('pesdik.index');
Route::get('pesdik2', [PesdikController::class, 'index2'])->name('pesdik.index2');
Route::get('datapesdik', [PesdikController::class, 'index2']);
Route::get('datapesdik', [PesdikController::class, 'index2'])->name('pesdik.index2');
Route::get('datapeserta', [PesdikController::class, 'index'])->name('pesdik.index');
Route::get('datapeserta', [PesdikController::class, 'index']);
Route::get('cetakPDFPesdik', [PesdikController::class, 'pdfPesdik'])->name('pdfPesdik');
Route::get('/pesdik/{nis}/view', [PesdikController::class, 'show'])->name('pesdik.view');
//SELEKSI SHOW
Route::get('/pesdik/{nis}/viewseleksi', [PesdikController::class, 'showseleksi'])->name('pesdik.viewseleksi');
////////////////////////////
Route::get('pesdik3', [PesdikController::class, 'index3'])->name('pesdik.index3');
Route::get('datapesdik', [PesdikController::class, 'index3'])->name('pesdik.index3');
// Route::get('/auth/{id}/index4', [RegisterController::class, 'show'])->name('auth.index4');
// Route::get('/auth/{id}/index4', [LoginController::class, 'show'])->name('auth.index4');
Route::get('datapesdik', [NilaiController::class, 'index2']);
Route::get('/pesdik/delete/{nis}', [PesdikController::class, 'destroy'])->name('pesdik.destroy');

Route::get('datapesdik', function () {
    return view('pesdik.index')->middleware('auth', 'pesdik');
});

Route::get('exportExcelPesdik', [PesdikController::class, 'exportExcelPesdik'])->name('excel');

//ROUTE KRITERIA
Route::get('datakriteria', function () {
    return view('kriteria.index');
});
Route::post('/kriteria', [KriteriaController::class, 'store'])->name('kriteria.store');
Route::get('/tambahkriteria', [KriteriaController::class, 'create'])->name('kriteria.create');
Route::get('kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
Route::get('datakriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
Route::get('datakriteria', [KriteriaController::class, 'index']);
Route::get('cetakPDFKriteria', [KriteriaController::class, 'pdfKriteria'])->name('pdfKriteria');
Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');
//route edit
Route::get('/kriteria/edit/{kode_kriteria}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
//route edit
Route::post('/kriteria/edit/{kode_kriteria}', [KriteriaController::class, 'update'])->name('kriteria.update');
//route delete
Route::post('/kriteria/delete/{kode_kriteria}', [KriteriaController::class, 'destroys'])->name('kriteria.destroy');
Route::get('/datapencariankriteria/search', [KriteriaController::class, 'search']);


//REGISTER
Route::get('datauser', function () {
    return view('auth.opsi');
});
Route::get('auth', [RegisterController::class, 'opsi'])->name('auth.opsi');
Route::get('datauser', [RegisterController::class, 'opsi'])->name('auth.opsi');
Route::get('datauser', [RegisterController::class, 'opsi']);
Route::get('/tambahpengguna', [RegisterController::class, 'register'])->name('auth.register');
Route::post('/auth', [RegisterController::class, 'store'])->name('auth.store');
Route::get('/auth/edit/{id}', [RegisterController::class, 'edit'])->name('auth.edit');
//route edit
Route::post('/auth/edit/{id}', [RegisterController::class, 'update'])->name('auth.update');





Route::get('/daftarpengguna', [LoginController::class, 'login'])->name('auth.login');

// Route::get('register', '\App\Http\Controllers\Auth\RegisterController@register');


//ROUTE ALTERNATIF
Route::get('dataalternatif', function () {
    return view('alternatif.index');
});
Route::post('/alternatif', [AlternatifController::class, 'store'])->name('alternatif.store');
Route::get('alternatif', [AlternatifController::class, 'index'])->name('alternatif.index');
Route::get('dataalternatif', [AlternatifController::class, 'index'])->name('alternatif.index');
Route::get('dataalternatif', [AlternatifController::class, 'index']);
Route::get('cetakPDFAlternatif', [AlternatifController::class, 'pdfAlternatif'])->name('pdfAlternatif');
Route::get('/alternatif/getdetail', [AlternatifController::class, 'getdetail'])->name('alternatif.getdetail');

//route edit
Route::get('/alternatif/edit/{kode_alternatif}', [AlternatifController::class, 'edit'])->name('alternatif.edit')->middleware('auth', 'admin');
//route edit
Route::post('/alternatif/edit/{kode_alternatif}', [AlternatifController::class, 'update'])->name('alternatif.update');
Route::get('/tambahalternatif', [AlternatifController::class, 'create'])->name('alternatif.create');

Route::post('/alternatif', [AlternatifController::class, 'store'])->name('alternatif.store');
Route::get('/alternatif/delete/{kode_alternatif}', [AlternatifController::class, 'destroy'])->name('alternatif.destroy');
Route::get('/datapencarianalternatif/search', [AlternatifController::class, 'search']);
Route::get('exportExcelAlternatif', [AlternatifController::class, 'exportExcelAlternatif'])->name('excelAlternatif');



//ROUTE HASIL
Route::get('datahasil', function () {
    return view('hasil.index');
});
Route::get('datahasil', [HasilController::class, 'index'])->name('hasil.index');
Route::get('datahasil', [HasilController::class, 'index']);


Route::get('datahasil3', function () {
    return view('hasil.index3');
});
Route::get('datahasil3', [HasilController::class, 'index3'])->name('hasil.index3');
Route::get('datahasil3', [HasilController::class, 'index3']);
Route::get('hasil3', [HasilController::class, 'index3'])->name('hasil.index3');




Route::get('datahasil2', function () {
    return view('hasil.index2')->middleware('auth', 'pesdik');
});
Route::get('datahasil2', [HasilController::class, 'index2']);
Route::get('datahasil2', [HasilController::class, 'index2'])->name('hasil.index2');

Route::post('/ Hasil', [HasilController::class, 'store'])->name('hasil.store');
Route::get('/tambahHasil', [HasilController::class, 'create'])->name('hasil.create');
Route::get('hasil', [HasilController::class, 'index'])->name('hasil.index');

Route::get('cetakPDFHasil', [HasilController::class, 'pdfHasil'])->name('pdfHasil');
Route::get('cetakPDFHasil2', [HasilController::class, 'pdfHasil2'])->name('pdfHasil2');

Route::get('datahasil', function () {
    return view('hasil.index2')->middleware('auth', 'pesdik');
});
Route::get('hasil2', [HasilController::class, 'index2'])->name('hasil.index2');
Route::get('datahasil2', [HasilController::class, 'index2']);
Route::get('datahasil2', [HasilController::class, 'index2'])->name('hasil.index2');

Route::get('/datapencarian/search', [HasilController::class, 'search']);
Route::get('exportExcelHasil', [HasilController::class, 'exportExcelHasil'])->name('excelHasil');
Route::get('/hasil/edit/{kode_hasil}', [HasilController::class, 'edit'])->name('hasil.edit');
//route edit
Route::post('/hasil/edit/{kode_hasil}', [HasilController::class, 'update'])->name('hasil.update');
Route::get('/hasil/{nis}/viewseleksi', [HasilController::class, 'showseleksi'])->name('hasil.viewseleksi');


Route::get('home', function () {
    return view('layouts.home');
});
Route::get('layouts', function () {
    return view('layouts.home');
});
Route::get('home2', function () {
    return view('layouts.home2');
});
Route::get('layouts', function () {
    return view('layouts.home2');
});

Route::get('kontak', function () {
    return view('layouts.kontak');
});
Route::get('layouts', function () {
    return view('layouts.kontak');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home2', [App\Http\Controllers\HomeController::class, 'index2'])->name('home2');
Route::get('/auth/{id}/index4', [HomeController::class, 'show'])->name('auth.index4');
Route::get('/cetak', [HomeController::class, 'cetak'])->name('cetak');