<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SimulatorController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.login');
})->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [HomeController::class, 'index'])->name('home.index');

    Route::prefix('simulator')->name('sim.')->group(function () {
        Route::get('/', [SimulatorController::class, 'index'])->name('index');
        Route::get('/form', [SimulatorController::class, 'forms'])->name('form');
        Route::get('/form/show/{report_id}', [SimulatorController::class, 'showForm'])->name('show');
        Route::post('/form/update', [SimulatorController::class, 'updateForm'])->name('update');

        Route::post('/form', [SimulatorController::class, 'store'])->name('store');
    });
});

require __DIR__ . '/auth.php';
