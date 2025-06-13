@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Enrollment</h2>
    <form action="{{ route('enrollments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input type="text" name="student_name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="course_id">Course</label>
            <select name="course_id" class="form-control" required>
                @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }} ({{ $course->code }})</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subject_id">Subject</label>
            <select name="subject_id" class="form-control" required>
                @foreach($subjects as $subject)
                <option value="{{ $subject->id }}">{{ $subject->name }} ({{ $subject->code }})</option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-primary mt-2">Enroll</button>
    </form>
</div>
@endsection