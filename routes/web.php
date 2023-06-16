<?php

use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserControler;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\TentorController;
use App\Http\Controllers\PelajaranController;
use App\Http\Controllers\TransaksiController;
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



Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);




Route::group(['middleware' => ['auth', 'role:admin']], function () {
    Route::get('/admin', function () {
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

    Route::get('/download-file/{filename}', [MateriController::class, 'download'])->name('download.file');
    Route::delete('/file/{id}', [MateriController::class, 'delete'])->name('file.delete');

    Route::get('/pendidikan', [PendidikanController::class, 'index'])->name('pendidikan.index');
    Route::resource('pendidikan', PendidikanController::class);

    Route::get('/kelase', [KelasController::class, 'index'])->name('kelase.index');
    Route::resource('kelase', KelasController::class);
});



Route::group(['middleware' => ['auth', 'role:tentor,admin,siswa']], function () {
    Route::get('/', function () {
        return view('page.index');
    })->name('tentor.dashboard');


    Route::get('/pelajaran', [PelajaranController::class, 'index'])->name('pelajaran.index');
    Route::resource('pelajaran', PelajaranController::class);


    Route::get('/materi-tentor', [MateriController::class, 'tentor'])->name('materi.tentor');
    Route::resource('materi', MateriController::class);

    Route::get('/download/{id}', [MateriController::class, 'download'])->name('download');
    Route::delete('/file/{id}', [MateriController::class, 'delete'])->name('file.delete');

    Route::get('/allpelajaran', [PelajaranController::class, 'allpelajaran'])->name('allpelajaran');
    Route::get('/detailpelajaran/{slug}', [PelajaranController::class, 'show'])->name('pelajaran');

    Route::get('/pelajaransaya', [PelajaranController::class, 'pelajaransiswa'])->name('pelajaransiswa');

    Route::resource('pembayaran', TransaksiController::class);

    Route::get('/transaksi', [TransaksiController::class, 'user'])->name('transaksi.index');

    Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
    Route::resource('jadwal', JadwalController::class);
    Route::post('/jadwal/detail-siswa', [JadwalController::class, 'detailSiswa'])->name('jadwal.detail-siswa');
});


Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);


Route::get('/', [HomeController::class, 'index'])->name('index')->middleware('guest');

Route::get('/about', [HomeController::class, 'about'])->name('about')->middleware('guest');

Route::get('/faqs', [HomeController::class, 'faqs'])->name('faqs')->middleware('guest');

Route::get('/contact', [HomeController::class, 'contact'])->name('contact')->middleware('guest');

Route::get('/allpelajaran', [HomeController::class, 'allpelajaran'])->name('allpelajaran');

Route::get('/searchJobs',  [HomeController::class, 'alljob'])->name('searchJobs');