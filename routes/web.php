<?php

use Illuminate\Support\Facades\Route;
// Mengimpor semua controller yang akan digunakan
use App\Http\Controllers\MataKuliahController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

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

Route::get('/', function () {
    return view('welcome');
});

// -- RUTE UNTUK USER (LENGKAP) --
Route::get('/user', [UserController::class, 'index'])->name('user.index');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');


// -- RUTE UNTUK MATA KULIAH --

// Rute untuk menampilkan daftar semua mata kuliah
Route::get('/matakuliah', [MataKuliahController::class, 'index'])->name('matakuliah.index');

// Rute untuk menampilkan form tambah mata kuliah baru
Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');

// Rute untuk memproses dan menyimpan data dari form
Route::post('/matakuliah', [MataKuliahController::class, 'store'])->name('matakuliah.store');

// Rute untuk menampilkan form edit mata kuliah
Route::get('/matakuliah/{id}/edit', [MataKuliahController::class, 'edit'])->name('matakuliah.edit');

// Rute untuk memproses update data dari form edit
Route::put('/matakuliah/{id}', [MataKuliahController::class, 'update'])->name('matakuliah.update');

// Rute untuk menghapus data mata kuliah
Route::delete('/matakuliah/{id}', [MataKuliahController::class, 'destroy'])->name('matakuliah.destroy');

