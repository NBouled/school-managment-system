<?php

use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
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

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::resource('users', UserController::class);
        Route::resource('courses', CourseController::class);
});

// Routes teacher
Route::get('/teacher/dashboard', function () {
    return view('teacher.dashboard');
})->middleware(['auth', 'verified','checkUserRole:'.UserRole::TEACHER->value ])->name('teacher.dashboard');




Route::middleware(['auth', 'verified','checkUserRole:'.UserRole::STUDENT->value ])
    ->prefix('student')
    ->group(function () {

        Route::get('/dashboard', [\App\Http\Controllers\Student\DashboardController::class, 'index'])->name('student.dashboard');
        Route::get('/courses', [\App\Http\Controllers\Student\CourseController::class, 'index'])->name('student.courses');
        Route::get('/courses/{course}', [\App\Http\Controllers\Student\CourseController::class, 'show'])->name('student.courses.show');

        Route::post('/courses/{course}/student/{student}/enroll', [\App\Http\Controllers\Student\CourseController::class, 'enroll'])->name('student.courses.enroll');
    });





//// Routes students
//Route::get('/student/dashboard', function () {
//    return view('student.dashboard');
//
//
//})->middleware(['auth', 'verified','checkUserRole:'.UserRole::STUDENT->value ])->name('student.dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
