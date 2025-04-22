<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TambahUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\PenyewaanController;
use App\Http\Controllers\DetailPesananController;
use App\Http\Controllers\TermsconditionsControllerController;
use App\Http\Controllers\TermsofuseControllerController;
use App\Http\Controllers\PrivacypolicyController;
use App\Http\Controllers\AppprivacyController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\TermsconditionsController;
use App\Http\Controllers\TermsofuseController;

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('user.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::resource('penyewaans', PenyewaanController::class);
    Route::get('/penyewaans/{penyewaan}/pembayaran', [PenyewaanController::class, 'showPembayaran'])->name('penyewaans.pembayaran');
    Route::post('/penyewaans/{penyewaan}/bayar', [PenyewaanController::class, 'bayar'])->name('penyewaans.bayar');

});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::resource('alats', AlatController::class);
    Route::get('/detail-pesanan', [DetailPesananController::class, 'index'])->name('detail-pesanan.index');
});

Route::get('/users', [TambahUserController::class, 'index'])->name('halaman.login');
Route::post('/users', [TambahUserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [TambahUserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [TambahUserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [TambahUserController::class, 'destroy'])->name('users.destroy');

Route::get('/katalog', [KatalogController::class, 'index'])->name('katalog.index');
Route::get('/katalog/{id}', [KatalogController::class, 'detail'])->name('katalog.detail');

Route::get('/terms-conditions', [TermsconditionsController::class, 'index'])->name('terms-conditions');
Route::get('/terms-of-use', [TermsofuseController::class, 'index'])->name('terms-of-use');
Route::get('/privacy-policy', [PrivacypolicyController::class, 'index'])->name('privacy-policy');
Route::get('/app-privacy', [AppprivacyController::class, 'index'])->name('app-privacy');
Route::get('/tentang-kami', [TentangKamiController::class, 'index'])->name('tentang-kami');
Route::get('/kontak', [KontakController::class, 'index'])->name('kontak');



require __DIR__ . '/auth.php';
