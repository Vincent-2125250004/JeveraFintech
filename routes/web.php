<?php

use App\Http\Controllers\admin\DataKontakController;
use App\Http\Controllers\admin\DataMobilController;
use App\Http\Controllers\admin\DataRuteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DataAkunController;
use App\Http\Controllers\admin\DeliveryOrderController;
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
//Tampilan Halaman Utama
Route::get('/', function () {
    return view('welcome');
});
Route::get('/datamaster', function (Request $request) {
    return view('frontend.datamaster');
})->name('datamaster');

Route::get('/pencatatan', function (Request $request) {
    return view('frontend.pencatatan');
})->name('pencatatan');

Route::get('/laporan', function (Request $request) {
    return view('frontend.laporan');
})->name('laporan');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//DataMaster
Route::middleware('auth')->name('datamaster.')->prefix('datamaster')->group(function () {
    Route::resource('/akun', DataAkunController::class);
    Route::resource('/rute', DataRuteController::class);
    Route::resource('/kontak', DataKontakController::class);
    Route::resource('/mobil', DataMobilController::class);
});
Route::middleware('auth')->get('/datamaster/mobil/images/{id}', [DataMobilController::class, 'images'])->name('datamaster.mobil.images');
Route::middleware('auth')->get('generatePDFMobil', [App\Http\Controllers\PDF\PDFController::class, 'generatePDFMobil']) ->name('datamaster.mobil.pdf');

//Pencatatan
Route::middleware('auth')->name('pencatatan.')->prefix('pencatatan')->group(function () {
    Route::resource('/do', DeliveryOrderController::class);
});



require __DIR__.'/auth.php';
