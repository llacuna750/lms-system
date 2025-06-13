@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Course</h2>
    <form action="{{ route('courses.update', $course) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label for="name">Course Name</label>
            <input type="text" name="name" value="{{ $course->name }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="code">Course Code</label>
            <input type="text" name="code" value="{{ $course->code }}" class="form-control" required>
        </div>
        <button class="btn btn-success mt-2">Update</button>
    </form>
</div>
@endsection