<?php

use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_ImgCollection;
use App\Http\Controllers\C_Kegiatan;
use App\Http\Controllers\C_Pengumuman;
use App\Http\Controllers\C_Pernikahan;
use App\Http\Controllers\C_Renungan;
use App\Http\Controllers\C_Layanan;
use App\Http\Controllers\C_Profile;
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

Route::prefix('backyard')->group(function () {
    Route::get('/login', [C_Auth::class, 'index'])->name('login');
    Route::post('/login', [C_Auth::class, 'login'])->name('login');

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
        Route::get('/kegiatan', [C_Kegiatan::class, 'index'])->name('kegiatan');
        Route::get('/kegiatan/create', [C_Kegiatan::class, 'create'])->name('kegiatanCreate');
        Route::post('/kegiatan/store', [C_Kegiatan::class, 'store'])->name('kegiatanStore');
        Route::get('/kegiatan/{id}', [C_Kegiatan::class, 'detail'])->name('kegiatanDetail');
        Route::post('/kegiatan/update/{id}', [C_Kegiatan::class, 'update'])->name('kegiatanUpdate');
        Route::delete('/kegiatan/{id}', [C_Kegiatan::class, 'delete'])->name('kegiatanDelete');
        Route::get('/kegiatan-trash', [C_Kegiatan::class, 'trash'])->name('kegiatanTrash');
        Route::post('/kegiatan/restore/{id}', [C_Kegiatan::class, 'restore'])->name('kegiatanRestore');
        Route::delete('/kegiatan/forceDelete/{id}', [C_Kegiatan::class, 'forceDelete'])->name('kegiatanForceDelete');
        Route::get('/pengumuman', [C_Pengumuman::class, 'index'])->name('pengumuman');
        Route::get('/pengumuman/create', [C_Pengumuman::class, 'create'])->name('pengumumanCreate');
        Route::post('/pengumuman/store', [C_Pengumuman::class, 'store'])->name('pengumumanStore');
        Route::get('/pengumuman/{id}', [C_Pengumuman::class, 'detail'])->name('pengumumanDetail');
        Route::post('/pengumuman/update/{id}', [C_Pengumuman::class, 'update'])->name('pengumumanUpdate');
        Route::delete('/pengumuman/{id}', [C_Pengumuman::class, 'delete'])->name('pengumumanDelete');
        Route::get('/pengumuman-trash', [C_Pengumuman::class, 'trash'])->name('pengumumanTrash');
        Route::post('/pengumuman/restore/{id}', [C_Pengumuman::class, 'restore'])->name('pengumumanRestore');
        Route::delete('/pengumuman/forceDelete/{id}', [C_Pengumuman::class, 'forceDelete'])->name('pengumumanForceDelete');
        Route::get('/layanan', [C_Layanan::class, 'index'])->name('layanan');
        Route::get('/layanan/create', [C_Layanan::class, 'create'])->name('layananCreate');
        Route::post('/layanan/store', [C_Layanan::class, 'store'])->name('layananStore');
        Route::get('/layanan/{id}', [C_Layanan::class, 'detail'])->name('layananDetail');
        Route::post('/layanan/update/{id}', [C_Layanan::class, 'update'])->name('layananUpdate');
        Route::delete('/layanan/{id}', [C_Layanan::class, 'delete'])->name('layananDelete');
        Route::get('/layanan-trash', [C_Layanan::class, 'trash'])->name('layananTrash');
        Route::post('/layanan/restore/{id}', [C_Layanan::class, 'restore'])->name('layananRestore');
        Route::delete('/layanan/forceDelete/{id}', [C_Layanan::class, 'forceDelete'])->name('layananForceDelete');
        Route::get('/pernikahan', [C_Pernikahan::class, 'index'])->name('pernikahan');
        Route::get('/pernikahan/create', [C_Pernikahan::class, 'create'])->name('pernikahanCreate');
        Route::post('/pernikahan/store', [C_Pernikahan::class, 'store'])->name('pernikahanStore');
        Route::get('/pernikahan/{id}', [C_Pernikahan::class, 'detail'])->name('pernikahanDetail');
        Route::post('/pernikahan/update/{id}', [C_Pernikahan::class, 'update'])->name('pernikahanUpdate');
        Route::delete('/pernikahan/{id}', [C_Pernikahan::class, 'delete'])->name('pernikahanDelete');
        Route::get('/pernikahan-trash', [C_Pernikahan::class, 'trash'])->name('pernikahanTrash');
        Route::post('/pernikahan/restore/{id}', [C_Pernikahan::class, 'restore'])->name('pernikahanRestore');
        Route::delete('/pernikahan/forceDelete/{id}', [C_Pernikahan::class, 'forceDelete'])->name('pernikahanForceDelete');
        Route::get('/profile', [C_Profile::class, 'index'])->name('profile');
        Route::get('/profile/create', [C_Profile::class, 'create'])->name('profileCreate');
        Route::post('/profile/store', [C_Profile::class, 'store'])->name('profileStore');
        Route::get('/profile/{id}', [C_Profile::class, 'detail'])->name('profileDetail');
        Route::post('/profile/update/{id}', [C_Profile::class, 'update'])->name('profileUpdate');
        Route::delete('/profile/{id}', [C_Profile::class, 'delete'])->name('profileDelete');
        Route::get('/profile-trash', [C_Profile::class, 'trash'])->name('profileTrash');
        Route::post('/profile/restore/{id}', [C_Profile::class, 'restore'])->name('profileRestore');
        Route::delete('/profile/forceDelete/{id}', [C_Profile::class, 'forceDelete'])->name('profileForceDelete');
    });
});
