<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\JurusanController;


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
Route::view('/dashboard', 'dashboard.index');

// Route yang mengatur CRUD
Route::resource('/dashboard/jurusan', JurusanController::class)
        ->except(['show']);