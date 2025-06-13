<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function enrollments()
    {
        $student = Auth::user();
        $enrollments = $student->enrollments; // assuming relation
        return view('students.enrollments', compact('enrollments'));
    }
}
