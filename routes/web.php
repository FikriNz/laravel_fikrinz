<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Rspanel\DashboardController;
use App\Http\Controllers\Rspanel\PasienController;
use App\Http\Controllers\Rspanel\RumahSakitController;
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

Route::middleware('guest')->group(function () {
   Route::get('/', [LoginController::class, 'index'])->name('login');
   Route::post('/login', [LoginController::class, 'authenticate'])->name('auth');
});

Route::middleware('auth')->group(function () {
   Route::resource('rumah-sakit', RumahSakitController::class);
   Route::resource('pasien', PasienController::class);
   Route::get('/get-pasien-by-rs', [PasienController::class, 'filterByRs'])->name('get-pasien-by-rs');

   Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});
