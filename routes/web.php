<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\TentorController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\PendidikanController;
use App\Http\Middleware\CheckRole;

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



Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);




Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', function () {
        return view('page.index');
    })->name('admin.dashboard');

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::post('/siswa/getkelas', [SiswaController::class, 'getKelas'])->name('siswa.getkelas');
Route::post('/siswa/setstatus', [SiswaController::class, 'changeStatus'])->name('siswa.setstatus');
Route::resource('siswa', SiswaController::class);


Route::get('/tentor', [TentorController::class, 'index'])->name('tentor.index');
Route::post('/tentor/setstatus', [TentorController::class, 'changeStatus'])->name('tentor.setstatus');
Route::resource('tentor', TentorController::class);

Route::get('/user', [UserControler::class, 'index'])->name('user.index');
Route::post('/user/getkelas', [UserControler::class, 'getKelas'])->name('user.getkelas');
Route::resource('user', UserControler::class);

Route::get('/pelajaran', [PelajaranController::class, 'index'])->name('pelajaran.index');
Route::resource('pelajaran', PelajaranController::class);


Route::get('/materi', [MateriController::class, 'index'])->name('materi.index');
Route::resource('materi', MateriController::class);

Route::get('/pendidikan', [PendidikanController::class, 'index'])->name('pendidikan.index');
Route::resource('pendidikan', PendidikanController::class);

Route::get('/kelase', [KelasController::class, 'index'])->name('kelase.index');
Route::resource('kelase', KelasController::class);

});