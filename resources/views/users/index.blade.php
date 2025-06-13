@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Users</h2>
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">Add New User</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th width="280px">Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ ucfirst($user->role) }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this user?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                    <a href="{{ route('users.export', $user->id) }}" class="btn btn-sm btn-secondary">PDF</a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4" class="text-center">No users found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{ $users->links() }}

    <a href="{{ route('users.exportAll') }}" class="btn btn-outline-dark mb-3">Export All as PDF</a>
</div>
@endsection