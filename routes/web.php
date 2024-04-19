<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\language\LanguageController;
use App\Http\Controllers\pages\HomePage;
use App\Http\Controllers\pages\Page2;
use App\Http\Controllers\pages\MiscError;
use App\Http\Controllers\authentications\LoginBasic;
use App\Http\Controllers\authentications\RegisterBasic;

//admin
use App\Http\Controllers\admin\dashboardAdminController;
use App\Http\Controllers\admin\ruanganAdminController;
use App\Http\Controllers\admin\karyawanAdminController;
use App\Http\Controllers\admin\aksesAdminController;
use App\Http\Controllers\admin\jabatanController;
use App\Http\Controllers\admin\loginAdminController;
//pegawai
use App\Http\Controllers\dashboardPegawaiController;
use App\Http\Controllers\ruanganPegawaiController;
use App\Http\Controllers\loginPegawaiController;

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

//pegawai
Route::prefix('/')->controller(loginPegawaiController::class)->name('loginPegawai.')->group(function () {
  Route::get('/','index')->name('index');
  Route::post('/masuk','loginPegawai')->name('login');
  Route::get('/keluar','logoutPegawai')->name('logout');

});
Route::middleware(['auth','web'])->group(function () {
    Route::prefix('dashboard')->controller(dashboardPegawaiController::class)->name('dashboard.')->group(function () {
      Route::get('/','index')->name('index');
    });
    Route::prefix('ruangan')->controller(ruanganPegawaiController::class)->name('ruangan.')->group(function () {
      Route::get('/','index')->name('index');
      Route::get('/detail/{id}','detail')->name('detail');
      Route::get('/detailPesanan/{id}','detailPesanan')->name('detailPesanan');
      Route::get('/edit/{id}','edit')->name('edit');
      Route::post('/update/{id}','update')->name('update');
      Route::get('delete/{id}','destroy')->name('hapus');
      Route::post('/pesan','store')->name('add');
    });
  });

  //admin
  Route::prefix('Admin')->controller(loginAdminController::class)->name('loginAdmin.')->group(function () {
    Route::get('/login','index')->name('index');
    Route::post('/masuk','loginAdmin')->name('login');
    Route::get('/keluar','logoutAdmin')->name('logout');
  });
  Route::prefix('Admin')->middleware(['auth:admin'])->group(function (){
    Route::prefix('dashboard')->controller(dashboardAdminController::class)->name('dashboardAdmin.')->group(function () {
      Route::get('/','index')->name('index');
    });
    Route::prefix('ruangan')->controller(ruanganAdminController::class)->name('ruanganAdmin.')->group(function () {
      Route::get('/','index')->name('index');
      Route::get('/detail','detail')->name('detail');
      Route::post('/add','store')->name('add');
      Route::get('/status/{id}','status')->name('status');
    });
    Route::prefix('karyawan')->controller(karyawanAdminController::class)->name('karyawan.')->group(function () {
      Route::get('/','index')->name('index');
      Route::post('/add','store')->name('add');
      Route::get('/detail','detail')->name('detail');
      Route::get('/edit/{id}','edit')->name('edit');
      Route::post('/update/{id}','update')->name('update');
      Route::get('/delete/{id}','destroy')->name('delete');
    });
    Route::prefix('aksesAdmin')->controller(aksesAdminController::class)->name('admin.')->group(function () {
      Route::get('/','index')->name('index');
      Route::post('/add','store')->name('add');
      Route::get('/detail','detail')->name('detail');
      Route::get('/edit/{id}','edit')->name('edit');
      Route::post('/update/{id}','update')->name('update');
      Route::get('/delete/{id}','destroy')->name('delete');
    });
    Route::prefix('jabatan')->controller(jabatanController::class)->name('jabatan.')->group(function () {
      Route::get('/','index')->name('index');
      Route::post('/add','store')->name('add');
      Route::get('/detail','detail')->name('detail');
      Route::get('/status/{id}','status')->name('status');
      Route::get('/edit/{id}','edit')->name('edit');
      Route::post('/update/{id}','update')->name('update');
    });
  });
// Main Page Route
Route::get('/page-2', [Page2::class, 'index'])->name('pages-page-2');

// locale
Route::get('lang/{locale}', [LanguageController::class, 'swap']);

// pages
Route::get('/pages/misc-error', [MiscError::class, 'index'])->name('pages-misc-error');

// authentication
Route::get('/auth/login-basic', [LoginBasic::class, 'index'])->name('auth-login-basic');
Route::get('/auth/register-basic', [RegisterBasic::class, 'index'])->name('auth-register-basic');
