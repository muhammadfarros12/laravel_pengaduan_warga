<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Dashboard\Home;
use App\Livewire\Guest\AllComplaints;
use App\Livewire\Guest\ComplaintForm;
use App\Livewire\Guest\Statistica;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');

Route::get('/home2', Home::class)->name('home2');
Route::get('/guest/complaint-form', ComplaintForm::class)->name('guest.complaint.form');
Route::get('/guest/all-complaint', AllComplaints::class)->name('guest.all.complaint');
Route::get('/guest/statistics', Statistica::class)->name('guest.statistics');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
