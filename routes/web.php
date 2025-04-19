<?php

use App\Http\Controllers\BarangController;

Route::get('/', [BarangController::class, 'index']);
Route::post('/barang', [BarangController::class, 'store']);
Route::delete('/barang/{id}', [BarangController::class, 'destroy']);
Route::post('/barang/{id}/undo', [BarangController::class, 'undo']);
