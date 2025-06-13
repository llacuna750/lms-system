<?php

// Let's begin with SubjectController.php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::paginate(10);
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        return view('subjects.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:subjects'
        ]);

        // Subject::create($request->all());

        Subject::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return redirect()->route('subjects.index')->with('success', 'Subject added');
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required|unique:subjects,code,' . $subject->id
        ]);

        $subject->update($request->all());
        return redirect()->route('subjects.index')->with('success', 'Subject updated');
    }

    public function destroy(Subject $subject)
    {
        $subject->delete();
        return redirect()->route('subjects.index')->with('success', 'Subject deleted');
    }

    // Export All Subjects to PDF
    public function exportAll()
    {
        $subjects = Subject::all();
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('subjects.pdf_all', compact('subjects'));
        return $pdf->download('all-subjects.pdf');
    }

    // Export Single Subject to PDF
    public function export(Subject $subject)
    {
        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('subjects.pdf_single', compact('subject'));
        return $pdf->download('subject-' . $subject->id . '.pdf');
    }
}
