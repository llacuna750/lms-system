<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\Enrollment;  // { 9TH update

class ReportController extends Controller
{

    public function allRecords()
    {
        $enrollments = Enrollment::with(['user', 'course'])->get();
        $pdf = Pdf::loadView('subjects.pdf_all', compact('enrollments'));
        return $pdf->download('enrollment-report.pdf');
    }
}

// 9TH update } 