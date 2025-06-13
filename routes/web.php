<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\CourseController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;

use App\Http\Controllers\HomeController; // 12th add home.blade.php

use App\Http\Controllers\EnrollmentController; // 14th update the RoleMiddleware & add web

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

// 8TH update
Route::middleware(['auth', 'role:admin'])->group(function () {                      // { 8TH update`
    Route::resource('subjects', SubjectController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('users', UserController::class)->except(['show']); // 16th update UserController : add exportALL() and update route Add Routes to it, in users view + pdf_all,pdf_single update index + show() method + route
    Route::get('/reports/all', [ReportController::class, 'allRecords'])->name('reports.all');

    // 16th update UserController : export routes for users
    Route::get('/users/export/all', [UserController::class, 'exportAll'])->name('users.exportAll');
    Route::get('/users/{user}/export', [UserController::class, 'export'])->name('users.export');
});

// Teacher-only routes
Route::middleware(['auth', 'role:teacher'])->group(function () {
    Route::get('/my-courses', [TeacherController::class, 'courses'])->name('teacher.courses');
});

// Student-only routes
Route::middleware(['auth', 'role:student'])->group(function () {
    Route::get('/my-enrollments', [StudentController::class, 'enrollments'])->name('student.enrollments'); // original call
    // Removed duplicate EnrollmentController route
});

// 14th update the RoleMiddleware & add web 
Route::middleware(['auth', 'role:admin,teacher'])->group(function () {
    // Shared access to enrollments for admin and teacher
    Route::resource('enrollments', EnrollmentController::class);  // moved here properly
}); // 8TH update   } 

Route::get('/home', [HomeController::class, 'index'])->middleware(['auth'])->name('home');   // 12th add home.blade.php

// 14th update the RoleMiddleware/ReportController/Usercontroller & add web and add folder users index,create,edit
Route::middleware(['auth'])->group(function () {
    // PDF Export Routes
    Route::get('/subjects/export/all', [SubjectController::class, 'exportAll'])->name('subjects.exportAll');
    Route::get('/subjects/{subject}/export', [SubjectController::class, 'export'])->name('subjects.export');
});

require __DIR__ . '/auth.php';
