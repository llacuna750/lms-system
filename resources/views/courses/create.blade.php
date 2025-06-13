@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Course</h2>
    <form action="{{ route('courses.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Course Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="code">Course Code</label>
            <input type="text" name="code" class="form-control" required>
        </div>
        <button class="btn btn-primary mt-2">Save</button>
    </form>
</div>
@endsection