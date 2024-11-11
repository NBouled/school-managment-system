<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use \App\Enum\UserRole;
use \App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


// Routes admin
Route::middleware(['auth', 'verified','checkUserRole:'.UserRole::ADMIN->value ])
    ->prefix('admin')
    ->group(function () {

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::resource('users', UserController::class);

});


Route::get('/teacher/dashboard', function () {
    return view('teacher.dashboard');
})->middleware(['auth', 'verified','checkUserRole:'.UserRole::TEACHER->value ])->name('teacher.dashboard');

Route::get('/student/dashboard', function () {
    return view('student.dashboard');
})->middleware(['auth', 'verified','checkUserRole:'.UserRole::STUDENT->value ])->name('student.dashboard');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
