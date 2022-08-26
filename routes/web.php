<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [SiteController::class, 'index'])->name('/');
Route::get('/dashboard', [SiteController::class, 'index'])->name('dashboard');
Route::get('/about', [SiteController::class, 'about'])->name('about');
Route::get('/contacts', [SiteController::class, 'contacts'])->name('contacts');
Route::get('/gallery', [SiteController::class, 'gallery'])->name('gallery');

/*Route Guru*/
Route::resource('/guru', GuruController::class);
/*Akhir Route Guru*/

/*Route Login Auth*/
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/do_login', [LoginController::class, 'authenticate'])->name('do.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
/*Akhir Route Guru*/


/*Route Siswa*/
Route::resource('/siswa', SiswaController::class);
/*Akhir Route Siswa*/

/*Route Register*/
Route::resource('/register', RegisterController::class);
/*Akhir Route Siswa*/

/*Route Register*/
Route::resource('/user', UserController::class);
/*Akhir Route Siswa*/
