<?php

use App\Http\Controllers\admin\DataKontakController;
use App\Http\Controllers\admin\DataMobilController;
use App\Http\Controllers\admin\DataRuteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\DataAkunController;
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

Route::get('/kas', function (Request $request) {
    return view('frontend.kas');
})->name('kas');

Route::get('/deliveryorder', function (Request $request) {
    return view('frontend.do');
})->name('do');



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

require __DIR__.'/auth.php';
