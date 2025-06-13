@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Create Subject</h2>
    <form action="{{ route('subjects.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Subject Name</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="code">Subject Code</label>
            <input type="text" name="code" class="form-control" required>
        </div>
        <button class="btn btn-primary mt-2">Save</button>
    </form>
</div>
@endsection