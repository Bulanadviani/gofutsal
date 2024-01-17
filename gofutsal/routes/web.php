<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LapanganController;
use App\Http\Controllers\LapanganBackendController;
use App\Http\Controllers\PembayaranBackendController;
use App\Http\Controllers\PeralatanController;
use App\Http\Controllers\PeralatanBackendController;
use App\Http\Controllers\PemesananBackendController;
use App\Http\Controllers\RatingBackendController;
use App\Http\Controllers\UserBackendController;

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginBackendController;

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
    return view('home');
});
Route::get('/home', function () {
    return view('home');
});

Route::get('/backend', function () {
    return view('backend.index');
});

Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login', [LoginController::class,'authenticate']);

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'register']);

Route::post('/logout', [LoginController::class,'logout']);

Route::get('/lapangan', [LapanganController::class,'index']);

Route::resource('lapangan-backend', LapanganBackendController::class);

Route::get('/peralatan', [PeralatanController::class,'index']);

Route::resource('peralatan-backend', PeralatanBackendController::class);
Route::resource('pembayaran-backend', PembayaranBackendController::class);

Route::resource('pemesanan-backend', PemesananBackendController::class);

Route::get('/login', [LoginController::class,'login'])->name('login');
Route::post('/login', [LoginController::class,'authenticate']);

Route::get('/register', [RegisterController::class,'index'])->name('register');
Route::post('/register', [RegisterController::class,'register']);

Route::post('/logout', [LoginController::class,'logout']);

Route::get('/user', [UserController::class,'index']);
Route::resource('user-backend', UserBackendController::class);

Route::resource('rating-backend', RatingBackendController::class);


