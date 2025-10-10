<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Dashboard\Home;
use App\Livewire\Guest\AllComplaints;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home2', Home::class)->name('home2');
Route::get('/laporan', Home::class)->name('laporan');
Route::get('/guest', AllComplaints::class)->name('guest');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
