<?php

use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Dashboard;
use App\Http\Controllers\C_Frontend;
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

Route::group([], function () {
    Route::get('/', [C_Frontend::class, 'index'])->name('home');
    Route::get('/kontak', [C_Frontend::class, 'contact'])->name('contact');
    Route::get('/renungan', [C_Frontend::class, 'renungan'])->name('renunganpage');
    Route::get('/kegiatan', [C_Frontend::class, 'kegiatan'])->name('kegiatanpage');
    Route::get('/renungan/{id}', [C_Frontend::class, 'detailRenungan'])->name('detailRenungan');
    Route::get('/kegiatan/{id}', [C_Frontend::class, 'detailKegiatan'])->name('detailKegiatan');
    Route::get('/profile/{slug}', [C_Frontend::class, 'profile'])->name('profilePage');
});

Route::prefix('backyard')->group(function () {
    Route::get('/login', [C_Auth::class, 'index'])->name('login');
    Route::post('/login', [C_Auth::class, 'login'])->name('login');

    Route::middleware('login')->group(function () {
        Route::get('/logout', [C_Auth::class, 'logout'])->name('logout');
        Route::post('/resetMyPassword/{id}', [C_Auth::class, 'resetMyPassword'])->name('resetMyPassword');
        Route::get('/', [C_Dashboard::class, 'index'])->name('dashboard');

        // Image Collection
        Route::prefix('imgCollection')->group(function () {
            Route::get('/', [C_ImgCollection::class, 'index'])->name('imgCollection');
            Route::post('/addImages', [C_ImgCollection::class, 'addImages'])->name('addImages');
            Route::get('/getAllImages', [C_ImgCollection::class, 'getAllImages'])->name('getAllImages');
            Route::delete('/deleteImages/{id}', [C_ImgCollection::class, 'deleteImages'])->name('deleteImages');
        });

        // User Management
        Route::prefix('pengguna')->group(function () {
            Route::get('/', [C_Users::class, 'index'])->name('pengguna');
            Route::post('/registerUser', [C_Users::class, 'register'])->name('registerUser');
            Route::delete('/deleteUser/{id}', [C_Users::class, 'deleteUser'])->name('deleteUser');
            Route::post('/resetPassword/{id}', [C_Users::class, 'resetPassword'])->name('resetPassword');
        });

        // Renungan Management
        Route::prefix('renungan')->group(function () {
            Route::get('/', [C_Renungan::class, 'index'])->name('renungan');
            Route::get('/create', [C_Renungan::class, 'createRenungan'])->name('renunganCreate');
            Route::post('/store', [C_Renungan::class, 'storeRenungan'])->name('renunganStore');
            Route::get('/detail{id}', [C_Renungan::class, 'detailRenungan'])->name('renunganDetail');
            Route::post('/update/{id}', [C_Renungan::class, 'updateRenungan'])->name('renunganUpdate');
            Route::delete('/{id}', [C_Renungan::class, 'deleteRenungan'])->name('renunganDelete');
            Route::get('/trash', [C_Renungan::class, 'trash'])->name('renunganTrash');
            Route::post('/restore/{id}', [C_Renungan::class, 'restoreRenungan'])->name('renunganRestore');
            Route::delete('/forceDelete/{id}', [C_Renungan::class, 'forceDeleteRenungan'])->name('renunganForceDelete');
        });

        // Kegiatan Management
        Route::prefix('kegiatan')->group(function () {
            Route::get('/', [C_Kegiatan::class, 'index'])->name('kegiatan');
            Route::get('/create', [C_Kegiatan::class, 'create'])->name('kegiatanCreate');
            Route::post('/store', [C_Kegiatan::class, 'store'])->name('kegiatanStore');
            Route::get('/detail{id}', [C_Kegiatan::class, 'detail'])->name('kegiatanDetail');
            Route::post('/update/{id}', [C_Kegiatan::class, 'update'])->name('kegiatanUpdate');
            Route::delete('/{id}', [C_Kegiatan::class, 'delete'])->name('kegiatanDelete');
            Route::get('/trash', [C_Kegiatan::class, 'trash'])->name('kegiatanTrash');
            Route::post('/restore/{id}', [C_Kegiatan::class, 'restore'])->name('kegiatanRestore');
            Route::delete('/forceDelete/{id}', [C_Kegiatan::class, 'forceDelete'])->name('kegiatanForceDelete');
        });

        // Pengumuman Management
        Route::prefix('pengumuman')->group(function () {
            Route::get('/', [C_Pengumuman::class, 'index'])->name('pengumuman');
            Route::get('/create', [C_Pengumuman::class, 'create'])->name('pengumumanCreate');
            Route::post('/store', [C_Pengumuman::class, 'store'])->name('pengumumanStore');
            Route::get('/detail{id}', [C_Pengumuman::class, 'detail'])->name('pengumumanDetail');
            Route::post('/update/{id}', [C_Pengumuman::class, 'update'])->name('pengumumanUpdate');
            Route::delete('/{id}', [C_Pengumuman::class, 'delete'])->name('pengumumanDelete');
            Route::get('/trash', [C_Pengumuman::class, 'trash'])->name('pengumumanTrash');
            Route::post('/restore/{id}', [C_Pengumuman::class, 'restore'])->name('pengumumanRestore');
            Route::delete('/forceDelete/{id}', [C_Pengumuman::class, 'forceDelete'])->name('pengumumanForceDelete');
        });

        Route::prefix('layanan')->group(function () {
            Route::get('/', [C_Layanan::class, 'index'])->name('layanan');
            Route::get('/create', [C_Layanan::class, 'create'])->name('layananCreate');
            Route::post('/store', [C_Layanan::class, 'store'])->name('layananStore');
            Route::get('/detail{id}', [C_Layanan::class, 'detail'])->name('layananDetail');
            Route::post('/update/{id}', [C_Layanan::class, 'update'])->name('layananUpdate');
            Route::delete('/{id}', [C_Layanan::class, 'delete'])->name('layananDelete');
            Route::get('/trash', [C_Layanan::class, 'trash'])->name('layananTrash');
            Route::post('/restore/{id}', [C_Layanan::class, 'restore'])->name('layananRestore');
            Route::delete('/forceDelete/{id}', [C_Layanan::class, 'forceDelete'])->name('layananForceDelete');
        });

        Route::prefix('pernikahan')->group(function () {
            Route::get('/', [C_Pernikahan::class, 'index'])->name('pernikahan');
            Route::get('/create', [C_Pernikahan::class, 'create'])->name('pernikahanCreate');
            Route::post('/store', [C_Pernikahan::class, 'store'])->name('pernikahanStore');
            Route::get('/detail{id}', [C_Pernikahan::class, 'detail'])->name('pernikahanDetail');
            Route::post('/update/{id}', [C_Pernikahan::class, 'update'])->name('pernikahanUpdate');
            Route::delete('/{id}', [C_Pernikahan::class, 'delete'])->name('pernikahanDelete');
            Route::get('/trash', [C_Pernikahan::class, 'trash'])->name('pernikahanTrash');
            Route::post('/restore/{id}', [C_Pernikahan::class, 'restore'])->name('pernikahanRestore');
            Route::delete('/forceDelete/{id}', [C_Pernikahan::class, 'forceDelete'])->name('pernikahanForceDelete');
        });

        Route::prefix('profile')->group(function () {
            Route::get('/', [C_Profile::class, 'index'])->name('profile');
            Route::get('/create', [C_Profile::class, 'create'])->name('profileCreate');
            Route::post('/store', [C_Profile::class, 'store'])->name('profileStore');
            Route::get('/detail{id}', [C_Profile::class, 'detail'])->name('profileDetail');
            Route::post('/update/{id}', [C_Profile::class, 'update'])->name('profileUpdate');
            Route::delete('/{id}', [C_Profile::class, 'delete'])->name('profileDelete');
            Route::get('/trash', [C_Profile::class, 'trash'])->name('profileTrash');
            Route::post('/restore/{id}', [C_Profile::class, 'restore'])->name('profileRestore');
            Route::delete('/forceDelete/{id}', [C_Profile::class, 'forceDelete'])->name('profileForceDelete');
        });
    });
});
