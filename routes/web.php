<?php

use App\Models\Ruang;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\GolonganController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\RuangController;
use App\Http\Controllers\JadwalAkademikController;
use App\Http\Controllers\KRSController;
use App\Http\Controllers\PresensiAkademikController;
use App\Http\Controllers\PengampuController;
use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Auth;

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
Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('golongan', GolonganController::class);
Route::resource('matakuliah', MatakuliahController::class);
Route::resource('dosen', DosenController::class);
Route::resource('ruang', RuangController::class);
Route::resource('jadwal', JadwalAkademikController::class);
Route::resource('krs', KRSController::class);
Route::resource('presensi', PresensiAkademikController::class);
Route::resource('pengampu', PengampuController::class);



// admin
// Route::get('/dashboard', [AdminController::class, 'dashboard']);
Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');