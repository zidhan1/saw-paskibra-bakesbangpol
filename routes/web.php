<?php

use App\Http\Controllers\NilaiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EveryoneController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SeleksiController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [AuthController::class, 'index'])->middleware('guest');

// Akses Admin
Route::middleware(['admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [EveryoneController::class, 'index']);

    // Kriteria
    Route::get('/kriteria', [KriteriaController::class, 'index']);
    Route::post('/kriteria/update/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');

    // Jadwal seleksi
    Route::get('data-seleksi', [SeleksiController::class, 'index']);
    Route::post('data-seleksi/add', [SeleksiController::class, 'store'])->name('seleksi.add');
    Route::post('data-seleksi/edit/{id}', [SeleksiController::class, 'update']);
    Route::post('data-seleksi/delete/{id}', [SeleksiController::class, 'delete']);

    // Data Peserta
    Route::get('peserta', [PesertaController::class, 'indexAdmin']);
    Route::get('peserta/{id}', [PesertaController::class, 'view']);

    // Data Nilai
    Route::get('nilai/add/{id}', [NilaiController::class, 'insertvalue']);
    Route::post('nilai/store/{id}', [NilaiController::class, 'store'])->name('nilai.store');
    Route::post('nilai/update/{id}', [NilaiController::class, 'update'])->name('nilai.update');

    // Perhitungan SAW
    Route::get('calculate/{tahun}', [HasilController::class, 'calculateSaw']);
    Route::post('calculate/store', [HasilController::class, 'store'])->name('hasil.store');
    Route::get('rangking/', [HasilController::class, 'view']);
    Route::post('rangking/validasi/{id}', [HasilController::class, 'validation'])->name('validation');

    // halaman settings
    Route::get('admin-settings', [EveryoneController::class, 'adminSetting']);
    Route::post('admin-setting/newpassword', [EveryoneController::class, 'adminNewPassword'])->name('admin.password');
    Route::post('admin-settings/destroy', [EveryoneController::class, 'adminDestroy'])->name('admin.destroy');
});

// Akses User
Route::middleware(['user'])->group(function () {
    Route::get('dashboard-user', [EveryoneController::class, 'userIndex']);
    Route::get('jadwal-seleksi', [UserController::class, 'indexSeleksi']);
    Route::get('jadwal-seleksi/{id}', [UserController::class, 'viewSeleksi']);

    //profile
    // Route::get('pendaftaran/{id}', [PesertaController::class, 'index'])->name('pendaftaran');
    Route::post('profile/add', [PesertaController::class, 'store'])->name('peserta.store');
    Route::post('profile/edit', [PesertaController::class, 'update'])->name('peserta.update');
    Route::post('profile/delete/{id}', [PesertaController::class, 'destroy'])->name('peserta.delete');

    // Pendaftaran
    Route::get('user-pendaftaran', [PendaftaranController::class, 'index']);
    Route::post('user-pendaftaran/add', [PendaftaranController::class, 'store'])->name('pendaftaran.store');

    // halaman profile
    Route::get('user-profile', [UserController::class, 'profile']);

    // halaman settings
    Route::get('user-settings', [EveryoneController::class, 'userSetting']);
    Route::post('user-setting/newpassword', [EveryoneController::class, 'userNewPassword'])->name('user.password');
    Route::post('user-settings/destroy', [EveryoneController::class, 'userDestroy'])->name('user.destroy');

    // Hasil seleksi
    Route::get('hasil-seleksi', [UserController::class, 'hasilSeleksi']);
});
