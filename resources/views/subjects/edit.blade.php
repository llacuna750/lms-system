@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Subject</h2>
    <form action="{{ route('subjects.update', $subject) }}" method="POST">
        @csrf @method('PUT')
        <div class="form-group">
            <label for="name">Subject Name</label>
            <input type="text" name="name" value="{{ $subject->name }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="code">Subject Code</label>
            <input type="text" name="code" value="{{ $subject->code }}" class="form-control" required>
        </div>
        <button class="btn btn-success mt-2">Update</button>
    </form>
</div>
@endsection