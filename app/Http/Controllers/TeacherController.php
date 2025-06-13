<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function courses()
    {
        $teacher = Auth::user();
        $courses = $teacher->courses; // assuming relation
        return view('teachers.courses', compact('courses'));
    }
}
