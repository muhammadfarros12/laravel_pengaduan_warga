<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Dashboard\Home;
use App\Livewire\Dashboard\Laporan;
use App\Livewire\Dashboard\LaporanUpdate;
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

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/', Home::class)->name('admin.dashboard');
    Route::get('/users', Users::class)->name('admin.users');
    Route::get('/complaints', Laporan::class)->name('admin.complaints');
    Route::get('/complaints/{id}/edit', LaporanUpdate::class)->name('admin.complaints.update');
});

Route::prefix('user')->middleware(['auth', 'isUser'])->group(function () {
    Route::get('/', App\Livewire\User\UserDashboard::class)->name('user.dashboard');
    Route::get('/complaint-form', App\Livewire\User\CreateReport::class)->name('user.form.complaint');
    Route::get('/complaints', App\Livewire\User\UserLaporan::class)->name('user.complaints');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
