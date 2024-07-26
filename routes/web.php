<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/print-pdf', [DashboardController::class, 'printPdf'])->name('print-pdf');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::post('/dashboard/store', [DashboardController::class, 'store'])->name('store');
Route::get('/editResume', [DashboardController::class, 'edit'])->name('resume.edit');
Route::post('/editResume/update', [DashboardController::class, 'update'])->name('resume.update');
Route::get('/viewResume', [DashboardController::class, 'view'])->name('resume.view');




Route::get('/resume', function () {
    return view('resume');
})->middleware(['auth', 'verified'])->name('resume');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
