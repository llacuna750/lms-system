@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Enrollment</h2>
    <form action="{{ route('enrollments.update', $enrollment) }}" method="POST">
        @csrf @method('PUT')

        <div class="form-group">
            <label for="student_name">Student Name</label>
            <input type="text" name="student_name" value="{{ $enrollment->student_name }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="course_id">Course</label>
            <select name="course_id" class="form-control" required>
                @foreach($courses as $course)
                <option value="{{ $course->id }}" {{ $enrollment->course_id == $course->id ? 'selected' : '' }}>
                    {{ $course->name }} ({{ $course->code }})
                </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="subject_id">Subject</label>
            <select name="subject_id" class="form-control" required>
                @foreach($subjects as $subject)
                <option value="{{ $subject->id }}" {{ $enrollment->subject_id == $subject->id ? 'selected' : '' }}>
                    {{ $subject->name }} ({{ $subject->code }})
                </option>
                @endforeach
            </select>
        </div>

        <button class="btn btn-success mt-2">Update</button>
    </form>
</div>
@endsection