<?php

use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_ImgCollection;
use App\Http\Controllers\C_Renungan;
use App\Http\Controllers\C_Users;
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

Route::group([], function () {
    Route::get('/login', [C_Auth::class, 'index'])->name('login');
    Route::post('/login', [C_Auth::class, 'login'])->name('login');
});

Route::middleware('login')->group(function () {
    Route::get('/logout', [C_Auth::class, 'logout'])->name('logout');
    Route::post('/resetMyPassword/{id}', [C_Auth::class, 'resetMyPassword'])->name('resetMyPassword');
    Route::get('/dashboard', [C_Dashboard::class, 'index'])->name('dashboard');
    Route::get('/imgCollection', [C_ImgCollection::class, 'index'])->name('imgCollection');
    Route::post('/addImages', [C_ImgCollection::class, 'addImages'])->name('addImages');
    Route::get('/getAllImages', [C_ImgCollection::class, 'getAllImages'])->name('getAllImages');
    Route::delete('/deleteImages/{id}', [C_ImgCollection::class, 'deleteImages'])->name('deleteImages');
    Route::get('/pengguna', [C_Users::class, 'index'])->name('pengguna');
    Route::post('/registerUser', [C_Users::class, 'register'])->name('registerUser');
    Route::delete('/deleteUser/{id}', [C_Users::class, 'deleteUser'])->name('deleteUser');
    Route::post('/resetPassword/{id}', [C_Users::class, 'resetPassword'])->name('resetPassword');
    Route::get('/renungan', [C_Renungan::class, 'index'])->name('renungan');
    Route::get('/renungan/create', [C_Renungan::class, 'createRenungan'])->name('renunganCreate');
    Route::post('/renungan/store', [C_Renungan::class, 'storeRenungan'])->name('renunganStore');
    Route::get('/renungan/{id}', [C_Renungan::class, 'detailRenungan'])->name('renunganDetail');
    Route::post('/renungan/update/{id}', [C_Renungan::class, 'updateRenungan'])->name('renunganUpdate');
    Route::delete('/renungan/{id}', [C_Renungan::class, 'deleteRenungan'])->name('renunganDelete');
    Route::get('/renungan-trash', [C_Renungan::class, 'trash'])->name('renunganTrash');
    Route::post('/renungan/restore/{id}', [C_Renungan::class, 'restoreRenungan'])->name('renunganRestore');
    Route::delete('/renungan/forceDelete/{id}', [C_Renungan::class, 'forceDeleteRenungan'])->name('renunganForceDelete');
});
