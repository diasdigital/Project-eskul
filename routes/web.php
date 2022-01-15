<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Admin\JurusanController;
use App\Http\Controllers\Dashboard\Admin\EskulController;
use App\Http\Controllers\Dashboard\Admin\PetugasController;
use App\Http\Controllers\Login\LoginController;


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

Route::view('/', 'beranda');
Route::view('dashboard', 'dashboard.index')->middleware('auth');

// Route yang mengatur CRUD untuk hanya admin
Route::prefix('dashboard')->middleware(['auth', 'admin'])->group(function () {
    Route::resource('jurusan', JurusanController::class)->except(['show']);
    Route::resource('eskul', EskulController::class);
    Route::resource('petugas', PetugasController::class)->parameters(['petugas' => 'akun'])->except('show');
});

// Route untuk otentikasi
Route::get('login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout']);