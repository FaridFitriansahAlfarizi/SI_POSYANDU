<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ImunisasiController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\OrangTuaController;
use App\Http\Controllers\PendudukController;
use App\Http\Controllers\PertumbuhanController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\StatusGiziController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('login', [AuthController::class,'index'])->name('login');
Route::post('proses_login', [AuthController::class,'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class,'logout'])->name('logout');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/', function () {
        return redirect('/beranda');
    });

    Route::group(['middleware' => ['cek_login:ADMIN,PETUGAS,PENDUDUK']], function () {
        Route::prefix('beranda')->group(function () {
            Route::get('/', [BerandaController::class,'index']);

            Route::prefix('/profil')->group(function () {
                Route::get('/orangtua/{nik}', [BerandaController::class,'profil_orangtua']);
                Route::get('/anak/{nik}', [BerandaController::class,'profil_anak']);
                Route::put('/gantiPassword/{nik}', [BerandaController::class,'gantiPassword']);
            });

            Route::get('/grafik/anak/{nik}', [BerandaController::class,'grafik_anak']);
        });
    });
        
    Route::prefix('/jadwal')->group(function () {
        Route::group(['middleware' => ['cek_login:ADMIN,PETUGAS,PENDUDUK']], function () {
            Route::get('/', [JadwalController::class,'index']);
        });

        Route::group(['middleware' => ['cek_login:ADMIN,PETUGAS']], function () {
            Route::post('/prosesTambah', [JadwalController::class,'prosesTambah']);
            Route::get('/getJadwalByTanggal', [JadwalController::class, 'getJadwalByTanggal']);
            Route::delete('/hapus', [JadwalController::class,'hapus']);
        });
    });

    Route::prefix('/artikel')->group(function () {
        Route::group(['middleware' => ['cek_login:ADMIN,PETUGAS,PENDUDUK']], function () {
            Route::get('/', [ArtikelController::class,'index']);
            Route::get('/detail/{id}', [ArtikelController::class,'detail']);
        });

        Route::group(['middleware' => ['cek_login:ADMIN,PETUGAS']], function () {
            Route::get('/tambah', [ArtikelController::class,'tambah']);
            Route::post('/prosesTambah', [ArtikelController::class,'prosesTambah']);
            Route::delete('/hapus/{id}', [ArtikelController::class,'hapus']);
        });
    });

    Route::prefix('/statusgizi')->group(function () {
        Route::group(['middleware' => ['cek_login:ADMIN,PETUGAS,PENDUDUK']], function () {
            Route::get('/', [StatusGiziController::class,'index']);
        });

        Route::group(['middleware' => ['cek_login:ADMIN,PETUGAS']], function () {
            Route::get('/updateData', [StatusGiziController::class,'updateData']);
            Route::get('/saw', [StatusGiziController::class,'saw']);
            Route::get('/moora', [StatusGiziController::class,'moora']);
        });
    });

    Route::prefix('/pertumbuhan')->group(function () {
        Route::group(['middleware' => ['cek_login:ADMIN,PETUGAS,PENDUDUK']], function () {
            Route::get('/', [PertumbuhanController::class,'index']);
        });

        Route::group(['middleware' => ['cek_login:ADMIN,PETUGAS']], function () {
            Route::get('/tambah', [PertumbuhanController::class,'tambah']);
            Route::get('/getPendudukByNik/{nik}', [PertumbuhanController::class, 'getPendudukByNik']);
            Route::post('/prosesTambah', [PertumbuhanController::class,'prosesTambah']);
            Route::get('/ubah/{id}', [PertumbuhanController::class,'ubah']);
            Route::put('/prosesUbah/{id}', [PertumbuhanController::class,'prosesUbah']);
            Route::delete('/hapus/{id}', [PertumbuhanController::class,'hapus']);
        });
    });

    Route::prefix('/imunisasi')->group(function () {
        Route::group(['middleware' => ['cek_login:ADMIN,PETUGAS,PENDUDUK']], function () {
            Route::get('/', [ImunisasiController::class,'index']);
        });

        Route::group(['middleware' => ['cek_login:ADMIN,PETUGAS']], function () {
            Route::get('/tambah', [ImunisasiController::class,'tambah']);
            Route::get('/getPendudukByNik/{nik}', [ImunisasiController::class, 'getPendudukByNik']);
            Route::post('/prosesTambah', [ImunisasiController::class,'prosesTambah']);
            Route::get('/ubah/{id}', [ImunisasiController::class,'ubah']);
            Route::put('/prosesUbah/{id}', [ImunisasiController::class,'prosesUbah']);
            Route::delete('/hapus/{id}', [ImunisasiController::class,'hapus']);
        });
    });

    Route::prefix('data')->group(function () {
        Route::group(['middleware' => ['cek_login:ADMIN,PETUGAS']], function () {
            Route::prefix('/orangtua')->group(function () {
                Route::get('/', [OrangTuaController::class,'orangtua']);
                Route::get('/tambah', [OrangTuaController::class,'tambahOrangTua']);
                Route::get('/getPendudukByNikOT/{nik}', [OrangTuaController::class, 'getPendudukByNikOT']);
                Route::post('/prosesTambahOrangTua', [OrangTuaController::class,'prosesTambahOrangTua']);
                Route::get('/detail/{nik}', [OrangTuaController::class,'detailOrangTua']);
                Route::delete('/hapus/{nik}', [OrangTuaController::class,'hapusOrangTua']);
            });

            Route::prefix('/anak')->group(function () {
                Route::get('/', [AnakController::class,'index']);
                Route::get('/tambah', [AnakController::class,'tambah']);
                Route::get('/getPendudukByNik/{nik}', [AnakController::class, 'getPendudukByNik']);
                Route::post('/prosesTambah', [AnakController::class,'prosesTambah']);
                Route::get('/detail/{nik}', [AnakController::class,'detail']);
                Route::delete('/hapus/{nik}', [AnakController::class,'hapus']);
            });
        });

        Route::group(['middleware' => ['cek_login:ADMIN']], function () {
            Route::prefix('/penduduk')->group(function () {
                Route::get('/', [PendudukController::class,'penduduk']);
                Route::get('/tambah', [PendudukController::class,'tambahPenduduk']);
                Route::post('/prosesTambahPenduduk', [PendudukController::class,'prosesTambahPenduduk']);
                Route::get('/detail/{nik}', [PendudukController::class,'detailPenduduk']);
                Route::get('/ubah/{nik}', [PendudukController::class,'ubahPenduduk']);
                Route::put('/prosesUbahPenduduk/{nik}', [PendudukController::class,'prosesUbahPenduduk']);
                Route::delete('/hapus/{nik}', [PendudukController::class,'hapusPenduduk']);
            });

            Route::prefix('/petugas')->group(function () {
                Route::get('/', [PetugasController::class,'petugas']);
                Route::get('/tambah', [PetugasController::class,'tambahPetugas']);
                Route::get('/getPendudukByNik/{nik}', [PetugasController::class, 'getPendudukByNik']);
                Route::put('/prosesTambahPetugas/{nik}', [PetugasController::class,'prosesTambahPetugas']);
                Route::put('/hapus/{nik}', [PetugasController::class,'hapusPetugas']);
            });
        });
    });    
});