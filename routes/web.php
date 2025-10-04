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

// -- RUTE UNTUK USER --
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');


// -- RUTE UNTUK MATA KULIAH --

// Rute untuk menampilkan daftar semua mata kuliah
// URL: /matakuliah
// Method: GET
// Controller Action: MataKuliahController@index
Route::get('/matakuliah', [MataKuliahController::class, 'index']);

// Rute untuk menampilkan form tambah mata kuliah baru
// URL: /matakuliah/create
// Method: GET
// Controller Action: MataKuliahController@create
Route::get('/matakuliah/create', [MataKuliahController::class, 'create'])->name('matakuliah.create');

// Rute untuk memproses dan menyimpan data dari form
// URL: /matakuliah
// Method: POST
// Controller Action: MataKuliahController@store
Route::post('/matakuliah', [MataKuliahController::class, 'store'])->name('matakuliah.store');

