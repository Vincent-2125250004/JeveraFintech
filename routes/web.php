<?php

use App\Http\Controllers\DataMasterController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
    return view('admin.datamaster');
})->name('datamaster');

Route::get('/kas', function (Request $request) {
    return view('admin.kas');
})->name('kas');

Route::get('/deliveryorder', function (Request $request) {
    return view('admin.do');
})->name('do');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



//CRUD


require __DIR__.'/auth.php';
