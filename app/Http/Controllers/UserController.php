<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use Barryvdh\DomPDF\Facade\Pdf; // 16th update UserController : add exportALL() and update route Add Routes to it, in users view + pdf_all,pdf_single update index + show() method + route

class UserController extends Controller
{
    public function index()
    {
        // Admin: list all users
        $users = User::paginate(10);
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required|in:admin,teacher,student',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role' => $request->role,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully');
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,teacher,student'
        ]);

        $user->update($request->only(['name', 'email', 'role']));

        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }

    // 16th update UserController : add exportALL() and update route Add Routes to it, in users view + pdf_all,pdf_single update index + show() method + route
    public function exportAll()
    {
        $users = User::all();
        $pdf = Pdf::loadView('users.pdf_all', compact('users'));
        return $pdf->download('all-users.pdf');
    }

    // 16th update UserController : add exportALL() and update route Add Routes to it, in users view + pdf_all,pdf_single update index + show() method + route
    public function export(User $user)
    {
        $pdf = Pdf::loadView('users.pdf_single', compact('user'));
        return $pdf->download('user-' . $user->id . '.pdf');
    }

    // 16th update UserController : add exportALL() and update route Add Routes to it, in users view + pdf_all,pdf_single update index + show() method + route
    public function show(User $user)
    {
        return redirect()->route('users.index');
    }
}