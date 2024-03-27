<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EveryoneController;
use App\Http\Controllers\KriteriaController;
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

Route::get('/', [AuthController::class, 'index']);

// Akses Admin
Route::middleware('admin')->group(function () {
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
});

// Akses User
Route::middleware('user')->group(function () {
    Route::get('dashboard-user', [EveryoneController::class, 'userIndex']);
    Route::get('jadwal-seleksi', [UserController::class, 'indexSeleksi']);
    Route::get('jadwal-seleksi/{id}', [UserController::class, 'viewSeleksi']);

    //pendaftaran
    Route::get('pendaftaran/{id}', [PesertaController::class, 'index'])->name('pendaftaran');
    Route::post('pendaftaran/add', [PesertaController::class, 'store'])->name('peserta.store');
    Route::post('pendaftaran/delete/{id}', [PesertaController::class, 'destroy'])->name('peserta.delete');
});
