<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\DashboardController;
use App\Models\Barang;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


// Route utama - redirect ke dashboard jika sudah login, ke login jika belum
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    // Langsung tampilkan halaman login
    return view('auth.login');
});
Route::get('/db-check', function () {
    try {
        \DB::connection()->getPdo();
        return 'Database connection successful!';
    } catch (\Exception $e) {
        return 'Connection failed: ' . $e->getMessage();
    }
})->name('db-check');

// Route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
// routes/web.php

Route::get('/run-migrate', function () {
    try {
        \Artisan::call('migrate', ['--force' => true]);
        return 'Migration ran successfully.';
    } catch (\Exception $e) {
        return 'Migration failed: ' . $e->getMessage();
    }
});

// Semua route yang perlu login
Route::middleware(['auth'])->group(function () {
    // Barang routes
    Route::get('/barang', [BarangController::class, 'index'])->name('barang.index');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/barang/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit'); 
    Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update'); 
    Route::delete('/barang/{id}', [BarangController::class, 'destroy'])->name('barang.destroy');
    Route::post('/barang/undo', [BarangController::class, 'undo'])->name('barang.undo');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/print-all', [DashboardController::class, 'printAll'])->name('dashboard.print-all');
    Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::post('/penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');
    Route::post('/penjualan/undo', [PenjualanController::class, 'undo'])->name('penjualan.undo');
});

require __DIR__.'/auth.php';
require __DIR__.'/profile.php';