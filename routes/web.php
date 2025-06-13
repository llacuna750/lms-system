<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SubjectController;
// use App\Http\Controllers\CourseController;
// use App\Http\Controllers\UserController;
// use App\Http\Controllers\ReportController;
// use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware(['auth', 'role:admin'])->group(function () {                    // { 8TH update    
    Route::resource('subjects', SubjectController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('users', UserController::class);
    Route::get('/reports/all', [ReportController::class, 'allRecords']);
});

Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/my-courses', [TeacherController::class, 'courses']);
});

Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/my-enrollments', [StudentController::class, 'enrollments']);
});                                                                              // 8TH update   } 


require __DIR__.'/auth.php';
