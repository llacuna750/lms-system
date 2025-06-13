<?php
// 12th add home.blade.php & HomeController updated the: partials.nav
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Subject;
use App\Models\Enrollment;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Basic counts for dashboard cards
        $courseCount = Course::count();
        $subjectCount = Subject::count();
        $enrollmentCount = Enrollment::count();

        // Data for Chart.js: Enrollments per course
        $chartLabels = Course::pluck('name');
        $chartData = Course::withCount('enrollments')->get()->pluck('enrollments_count');

        return view('home', compact('courseCount', 'subjectCount', 'enrollmentCount', 'chartLabels', 'chartData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
