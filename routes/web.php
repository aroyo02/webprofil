<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;

// Admin controllers
use App\Http\Controllers\Admin\SchoolProfileController;
use App\Http\Controllers\Admin\VisionController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\StrukturOrganisasiController;
use App\Http\Controllers\Admin\SaranaPrasaranaController;
use App\Http\Controllers\Admin\GaleriController;
use App\Http\Controllers\Admin\EkstrakurikulerController;
use App\Http\Controllers\Admin\PrestasiController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\SiswaGuruController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\GaleriPustakaController;

// Publik controllers
use App\Http\Controllers\Halpublik\DashboardPublikController;
use App\Http\Controllers\Halpublik\SchoolProfilPublikController;
use App\Http\Controllers\Halpublik\VisiMisiPublikController;
use App\Http\Controllers\Halpublik\StrukturOrganisasiPublikController;
use App\Http\Controllers\Halpublik\EkstrakurikulerPublikController;
use App\Http\Controllers\Halpublik\PrestasiPublikController;
use App\Http\Controllers\Halpublik\DaftarGuruPublikController;
use App\Http\Controllers\Halpublik\SarprasPublikController;
use App\Http\Controllers\Halpublik\GaleriPublikController;
use App\Http\Controllers\Halpublik\BeritaPublikController;
use App\Http\Controllers\Halpublik\kontakPublikController;
use App\Http\Controllers\Halpublik\GaleriPustakaPublikController;


// Halaman publik
Route::get('/', [DashboardPublikController::class, 'index'])->name('dashboardpublik');
Route::get('/profilsekolah', [SchoolProfilPublikController::class, 'index'])->name('profilsekolah');
Route::get('/visimisi', [VisiMisiPublikController::class, 'index'])->name('visimisi');
Route::get('/struktur-organisasi', [StrukturOrganisasiPublikController::class, 'index'])->name('strukturorganisasi');
Route::get('/ekstrakurikuler', [EkstrakurikulerPublikController::class, 'index'])->name('ekskul');
Route::get('/prestasi', [PrestasiPublikController::class, 'index'])->name('prestasi');
Route::get('/daftarguru', [DaftarGuruPublikController::class, 'index'])->name('daftarguru');
Route::get('/saranaprasarana', [SarprasPublikController::class, 'index'])->name('sarpras');
Route::get('/galeri', [GaleriPublikController::class, 'index'])->name('galeri');
Route::get('/berita', [BeritaPublikController::class, 'index'])->name('berita.publik');
Route::get('/berita/{id}', [BeritaPublikController::class, 'show'])->name('berita.showpublik');
Route::get('/kontak', [kontakPublikController::class, 'index'])->name('kontak.publik');
Route::get('/galeripustaka', [GaleriPustakaPublikController::class, 'index'])->name('galeripustakapublik');



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

    //prestasi
    Route::get('/prestasi/create', [PrestasiController::class, 'create'])->name('prestasi.create');
    Route::post('/prestasi', [PrestasiController::class, 'store'])->name('prestasi.store');
    Route::get('/prestasi', [PrestasiController::class, 'index'])->name('prestasi.index');
    Route::get('/prestasi/{id}/edit', [PrestasiController::class, 'edit'])->name('prestasi.edit');
    Route::put('/prestasi/{id}', [PrestasiController::class, 'update'])->name('prestasi.update');
    Route::delete('/prestasi/{id}', [PrestasiController::class, 'destroy'])->name('prestasi.destroy');

    // Galeri
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');    
    Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');            
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');              
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
    Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit'])->name('galeri.edit');
    Route::put('/galeri/{id}', [GaleriController::class, 'update'])->name('galeri.update');

    
    // ektrakurikuler
    Route::get('/ekstrakurikuler/create', [EkstrakurikulerController::class, 'create'])->name('ekstrakurikuler.create');
    Route::post('/ekstrakurikuler', [EkstrakurikulerController::class, 'store'])->name('ekstrakurikuler.store');
    Route::get('/ekstrakurikuler', [EkstrakurikulerController::class, 'index'])->name('ekstrakurikuler.index');
    Route::get('/ekstrakurikuler/{id}/edit', [EkstrakurikulerController::class, 'edit'])->name('ekstrakurikuler.edit');
    Route::put('/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'update'])->name('ekstrakurikuler.update');
    Route::delete('/ekstrakurikuler/{id}', [EkstrakurikulerController::class, 'destroy'])->name('ekstrakurikuler.destroy');

    // berita
    Route::get('/berita', [BeritaController::class, 'index'])->name('berita.index');
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'create'])->name('berita.edit');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::get('/berita/{id}', [BeritaController::class, 'show'])->name('berita.show');

    //siswaguru
    Route::get('create', [SiswaGuruController::class, 'create'])->name('siswaguru.create');
    Route::post('siswa/store', [SiswaGuruController::class, 'storeSiswa'])->name('siswa.store');
    Route::delete('siswa', [SiswaGuruController::class, 'destroySiswa'])->name('siswa.destroy');

    Route::post('guru/store', [SiswaGuruController::class, 'storeGuru'])->name('guru.store');
    Route::get('guru', [SiswaGuruController::class, 'indexGuru'])->name('siswaguru.index');
    Route::get('guru/{id}/edit', [SiswaGuruController::class, 'editGuru'])->name('guru.edit');
    Route::put('guru/{id}', [SiswaGuruController::class, 'updateGuru'])->name('guru.update');
    Route::delete('guru/{id}', [SiswaGuruController::class, 'destroyGuru'])->name('guru.destroy');

    // Kontak Sekolah
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
    Route::get('/contact/create', [ContactController::class, 'create'])->name('contact.create'); // untuk create dan edit
    Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
    Route::put('/contact/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('/contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

    // Galeri pustaka
    Route::get('galeripustaka', [GaleriPustakaController::class, 'index'])->name('galeripustaka.index');
    Route::get('galeripustaka/create', [GaleriPustakaController::class, 'create'])->name('galeripustaka.create');
    Route::post('galeripustaka', [GaleriPustakaController::class, 'store'])->name('galeripustaka.store');
    Route::get('galeripustaka/{id}/edit', [GaleriPustakaController::class, 'edit'])->name('galeripustaka.edit');
    Route::put('galeripustaka/{id}', [GaleriPustakaController::class, 'update'])->name('galeripustaka.update');
    Route::delete('galeripustaka/{id}', [GaleriPustakaController::class, 'destroy'])->name('galeripustaka.destroy');

});


require __DIR__.'/auth.php';
