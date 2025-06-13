<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\User;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class EnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $enrollments = Enrollment::with(['user', 'course', 'subject'])->paginate(10);
        return view('enrollments.index', compact('enrollments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('role', 'student')->get();
        $courses = Course::all();
        $subjects = Subject::all();
        return view('enrollments.create', compact('users', 'courses', 'subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'course_id' => 'required',
            'subject_id' => 'required',
        ]);

        Enrollment::create([
            'user_id' => $request->user_id,
            'course_id' => $request->course_id,
            'subject_id' => $request->subject_id,
            'created_by' => Auth::id()
        ]);

        return redirect()->route('enrollments.index')->with('success', 'Enrollment successful.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Enrollment $enrollment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enrollment $enrollment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enrollment $enrollment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enrollment $enrollment)
    {
        $enrollment->delete();
        return redirect()->route('enrollments.index')->with('success', 'Enrollment deleted.');
    }

    public function exportAll()
    {
        $enrollments = Enrollment::with(['user', 'course', 'subject'])->get();
        $pdf = Pdf::loadView('enrollments.pdf_all', compact('enrollments'));
        return $pdf->download('all-enrollments.pdf');
    }

    public function export(Enrollment $enrollment)
    {
        $pdf = Pdf::loadView('enrollments.pdf_single', compact('enrollment'));
        return $pdf->download('enrollment-' . $enrollment->id . '.pdf');
    }
}
