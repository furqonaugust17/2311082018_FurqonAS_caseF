<?php

use App\Http\Controllers\ReservasiController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('reservasi.index');
});
Route::get('reservasi/trashed', [ReservasiController::class, 'trashed'])->name('reservasi.trashed');
Route::post('reservasi/restore/{id}', [ReservasiController::class, 'restore'])->name('reservasi.restore');
Route::resource('reservasi', ReservasiController::class);
