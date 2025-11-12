<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Dashboard\Home;
use App\Livewire\Dashboard\Users;
use App\Livewire\Guest\AllComplaints;
use App\Livewire\Guest\ComplaintForm;
use App\Livewire\Guest\Statistica;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/complaint-form', ComplaintForm::class)->name('guest.complaint.form');
Route::get('/', AllComplaints::class)->name('guest.all.complaint');
Route::get('/statistics', Statistica::class)->name('guest.statistics');

Route::prefix('admin')->middleware(['auth'])->group(function () {
    Route::get('/', Home::class)->name('admin.dashboard');
    Route::get('/users', Users::class)->name('admin.users');

});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
