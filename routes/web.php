<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Login\LoginController;

use App\Http\Controllers\Backend\Admin\JurusanController;
use App\Http\Controllers\Backend\Admin\EskulController;
use App\Http\Controllers\Backend\Admin\PetugasController;

use App\Http\Controllers\Backend\AnggotaController;
use App\Http\Controllers\Backend\PrestasiController;
use App\Http\Controllers\Backend\KegiatanController;
use App\Http\Controllers\Backend\PengurusController;
use App\Http\Controllers\Frontend;

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

// Frontend
Route::get('/', [Frontend::class, 'index']);
Route::get('/tentang', [Frontend::class, 'tentang']);
Route::get('/ekstrakulikuler', [Frontend::class, 'ekstrakulikuler']);
Route::get('/ekstrakulikuler/{eskul:slug}', [Frontend::class, 'detailEkstrakulikuler']);
Route::get('/prestasi', [Frontend::class, 'prestasi']);
Route::get('/detail-prestasi/{prestasi}', [Frontend::class, 'detailPrestasi']);

// Backend
Route::view('dashboard', 'backend.index')->middleware('auth');

// Route yang mengatur CRUD untuk hanya admin
Route::prefix('dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('jurusan', JurusanController::class)->except(['show','destroy']);
    Route::resource('eskul', EskulController::class)->except('destroy');
    Route::resource('petugas', PetugasController::class)->parameters(['petugas' => 'akun'])->except('show');
});

// Route yang mengatur CRUD lain
Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::resource('anggota', AnggotaController::class)->parameters(['anggota' => 'anggota'])->except(['show']);
    Route::resource('prestasi', PrestasiController::class)->except(['show']);
    Route::resource('kegiatan', KegiatanController::class)->except(['show']);
    Route::resource('pengurus', PengurusController::class)->parameters(['pengurus' => 'pengurus'])->except(['show','create','store','destroy']);
});

// Route untuk otentikasi
Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout']);