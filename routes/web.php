<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SchoolProfileController;
use App\Http\Controllers\Admin\VisionController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StrukturOrganisasiController;
use App\Http\Controllers\Admin\SaranaPrasaranaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\EkstrakurikulerController;


// Landing page (public)
Route::get('/', function () {
    return view('welcome');
});

// Redirect dashboard umum ke dashboard admin
Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes untuk user login (biasa)
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Group khusus admin
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {

    // Dashboard admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Halaman utama Profil Sekolah (gabung create & edit)
    Route::get('/profilsekolah', [SchoolProfileController::class, 'index'])->name('profilsekolah.index');
    Route::post('/profilsekolah/store', [SchoolProfileController::class, 'store'])->name('profilsekolah.store');
    Route::post('/profilsekolah/update', [SchoolProfileController::class, 'update'])->name('profilsekolah.update');
    Route::delete('/profilsekolah/destroy', [SchoolProfileController::class, 'destroy'])->name('profilsekolah.destroy');

    // Halaman utama Visi & Misi (gabung dalam 1 view)
    Route::get('/visimisi', [VisionController::class, 'index'])->name('visimisi.index');
    Route::post('/visimisi/saveAll', [VisionController::class, 'saveAll'])->name('visimisi.saveAll');

    // Simpan & update visi
    Route::post('/visi/store', [VisionController::class, 'store'])->name('visi.store');
    Route::put('/visi/update/{id}', [VisionController::class, 'update'])->name('visi.update');
    Route::delete('/visi/destroy/{id}', [VisionController::class, 'destroy'])->name('visi.destroy');

    // Simpan & update misi
    Route::post('/misi/store', [MissionController::class, 'store'])->name('misi.store');
    Route::put('/misi/update/{id}', [MissionController::class, 'update'])->name('misi.update');
    Route::delete('/misi/destroy/{id}', [MissionController::class, 'destroy'])->name('misi.destroy');

    // struktur organisasi
    Route::get('struktur-organisasi', [StrukturOrganisasiController::class, 'index'])->name('strukturorganisasi.index');
    Route::post('struktur-organisasi', [StrukturOrganisasiController::class, 'store'])->name('strukturorganisasi.store');
    Route::delete('struktur-organisasi', [StrukturOrganisasiController::class, 'destroy'])->name('strukturorganisasi.destroy');

    // Sarana Prasarana
    Route::get('/saranaprasarana/create', [SaranaPrasaranaController::class, 'create'])->name('saranaprasarana.create');
    Route::get('/saranaprasarana', [SaranaPrasaranaController::class, 'index'])->name('saranaprasarana.index');
    Route::post('/saranaprasarana', [SaranaPrasaranaController::class, 'store'])->name('saranaprasarana.store');
    Route::get('/saranaprasarana/{id}/edit', [SaranaPrasaranaController::class, 'edit'])->name('saranaprasarana.edit');
    Route::put('/saranaprasarana/{id}', [SaranaPrasaranaController::class, 'update'])->name('saranaprasarana.update');
    Route::delete('/saranaprasarana/{id}', [SaranaPrasaranaController::class, 'destroy'])->name('saranaprasarana.destroy');

    // Galeri
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');    
    Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');            
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');              
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
    
    // ektrakurikuler
    Route::get('/ekstrakurikuler/create', [EkstrakurikulerController::class, 'create'])->name('ekstrakurikuler.create');
    Route::post('/ekstrakurikuler', [EkstrakurikulerController::class, 'store'])->name('ekstrakurikuler.store');
    Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('ekstrakurikuler.index');
    Route::get('/ekstrakurikuler/{id}/edit', [EkstrakurikulerController::class, 'edit'])->name('ekstrakurikuler.edit');
    Route::put('/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'update'])->name('ekstrakurikuler.update');
    Route::delete('/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'destroy'])->name('ekstrakurikuler.destroy');
});

require __DIR__.'/auth.php';
