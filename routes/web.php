<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TentorController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\PendidikanController;

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
    return view('page.index');
});

Route::get('/login', function () {
    return view('auth.index');
});

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::resource('siswa', SiswaController::class);


Route::get('/tentor', [TentorController::class, 'index'])->name('tentor.index');
Route::resource('tentor', TentorController::class);


Route::get('/user', [UserControler::class, 'index'])->name('user.index');
Route::post('/user/getkelas', [UserControler::class, 'getKelas'])->name('user.getkelas');
Route::resource('user', UserControler::class);

Route::get('/pelajaran', [PelajaranController::class, 'index'])->name('pelajaran.index');
Route::resource('pelajaran', PelajaranController::class);


Route::get('/pendidikan', [PendidikanController::class, 'index'])->name('pendidikan.index');
Route::resource('pendidikan', PendidikanController::class);

Route::get('/kelase', [KelasController::class, 'index'])->name('kelase.index');
Route::resource('kelase', KelasController::class);
