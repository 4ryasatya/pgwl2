<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PointController;
use App\Http\Controllers\TabelController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\PolygonController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PolylineController;

Route::get('/', [PublicController::class, 'index']) -> name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('points', PointController::class);
Route::resource('polylines', PolylineController::class);
Route::resource('polygon', PolygonController::class);

Route::get('/map', [PointController::class, 'index'])
->middleware(['auth', 'verified'])
->name('map');

Route::get('/tabel', [TabelController::class, 'index'])
->middleware(['auth', 'verified'])
->name('tabel');

require __DIR__.'/auth.php';
