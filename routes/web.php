<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\KunjunganController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RekamMedisController;
use App\Http\Controllers\UserController;
use App\Models\Dokter;
use App\Models\Kunjungan;
use App\Models\Pasien;
use App\Models\Pelayanan;
use App\Models\Poli;
use App\Models\User;
use Illuminate\Support\Facades\Route;


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

Route::controller(AuthController::class)->group(function () {
    // Route::get('/orders/{id}', 'show');
    // Route::post('/orders', 'store');
    Route::get('/login', 'login')->name('login')->middleware('guest');
    Route::post('/login', 'store_login');
    Route::get('/register', 'register')->middleware('guest');
    Route::post('/register', 'store_register');
    Route::post('/logout', 'logout');
    Route::get('/', 'index');
});

Route::resource('/master/user',UserController::class)->middleware('administrator');
// Route::resource('/master/gender',RekamMedisController::class)->middleware('auth');
// Route::resource('/master/poli',RekamMedisController::class)->middleware('auth');
Route::resource('/analis/rekam-medis',RekamMedisController::class)->middleware('admin');
Route::resource('/input/dokter',DokterController::class)->middleware('administrator');
Route::resource('/input/pasien',PasienController::class)->middleware('administrator');
Route::resource('/loket-pendaftaran',KunjunganController::class)->middleware('auth');
Route::controller(PasienController::class)->group(function() {
    Route::get('/tambah-pasien', 'tambahPasien')->middleware('auth');
    Route::post('/tambah-pasien/store', 'tambahPasienStore')->middleware('auth');
});
// Route::controller(UserController::class)->group(function(){
//     Route::get('/user/index', 'index');
// });

Route::get('/dashboard', function(){
    return view('components.dashboard', [
        'title' => 'Dashboard',
        'totalKunjungan' => Kunjungan::where('isActive','1')->count(),
        'totalPasien' => Pasien::all()->count(),
        'totalDokter' => Dokter::all()->count(),
        'totalUser' => User::all()->count(),
        'pasiens' => Pasien::where('isQueue',false)->orderBy('name','asc')->get(),
        'polies' => Poli::all(),
        'kunjungans' => Kunjungan::where('isActive','1')->with(['pasien', 'poli','pelayanan'])->get(),
        'pelayanans' => Pelayanan::all()
    ]);
})->middleware('admin');

Route::controller(UserController::class)->group(function(){
    Route::get('/user', 'index')->middleware('administrator');
});

Route::get('/input/createSlug', [DokterController::class, 'createSlug'])->middleware('administrator');
Route::get('/slugPasien', [PasienController::class, 'slugPasien'])->middleware('auth');

Route::get('/laporan/dokter', [DokterController::class, 'formLaporanDokter'])->middleware('administrator');
Route::get('/laporan/dokter/preview', [DokterController::class, 'preview'])->middleware('administrator');
Route::get('/laporan/dokter/unduh', [DokterController::class, 'unduh'])->middleware('administrator');

Route::get('/laporan/pasien', [PasienController::class, 'formLaporan'])->middleware('administrator');
Route::get('/laporan/dokter/preview', [PasienController::class, 'preview'])->middleware('administrator');
Route::get('/laporan/pasien/unduh', [PasienController::class, 'unduh'])->middleware('administrator');

Route::get('/laporan/rekam-medis',[RekamMedisController::class, 'formLaporan'])->middleware('admin');

Route::get('/unduh/single-rm/{rekam_medi}', [RekamMedisController::class, 'unduhSingle'])->middleware('admin');
Route::get('/unduh/data-rm/harian', [RekamMedisController::class, 'unduhHarian'])->middleware('admin');
Route::get('/unduh/data-rm/bulanan', [RekamMedisController::class, 'unduhBulanan'])->middleware('admin');
Route::get('/unduh/data-rm/tahunan', [RekamMedisController::class, 'unduhTahunan'])->middleware('admin');
