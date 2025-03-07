<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [CandidateController::class, 'index'])->middleware(['auth', 'verified'])->name('candidates.index');
Route::get('/candidates/create', [CandidateController::class, 'create'])->middleware(['auth', 'verified'])->name('candidates.create');
Route::get('/candidates/{candidate}/edit', [CandidateController::class, 'edit'])->middleware(['auth', 'verified'])->name('candidates.edit');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
