@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Subjects</h2>
    <a href="{{ route('subjects.create') }}" class="btn btn-primary mb-2">Add Subject</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subjects as $subject)
            <tr>
                <td>{{ $subject->name }}</td>
                <td>{{ $subject->code }}</td>
                <td>
                    <a href="{{ route('subjects.edit', $subject) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('subjects.destroy', $subject) }}" method="POST" style="display:inline;">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('subjects.export', $subject) }}" class="btn btn-sm btn-secondary">PDF</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $subjects->links() }}
    <a href="{{ route('subjects.exportAll') }}" class="btn btn-success mt-2">Export All as PDF</a>
</div>
@endsection