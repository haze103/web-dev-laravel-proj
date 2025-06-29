<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // Show all users
    public function index()
    {
        $users = User::all();
        return view('admin_access_user', ['users' => $users]);
    }

    // Store new user with RBAC and unique Super Admin enforcement
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|string|min:6|confirmed',
            'role'       => 'required|in:Super Admin,Admin,Sales Manager,Sales Representative',
            'status'     => 'required|in:Active,Inactive,Pending Accounts',
        ]);

        $currentUser = auth()->user();

        $allowedRoles = match ($currentUser->role) {
            'Super Admin' => ['Admin', 'Sales Manager', 'Sales Representative'],
            'Admin' => ['Sales Manager', 'Sales Representative'],
            'Sales Manager' => ['Sales Manager'],
            default => [],
        };

        if (!in_array($request->role, $allowedRoles)) {
            return redirect()->back()->withErrors(['You are not authorized to create a user with this role.']);
        }

        if ($request->role === 'Super Admin' && User::where('role', 'Super Admin')->exists()) {
            return redirect()->back()->withErrors(['Only one Super Admin is allowed.']);
        }

        User::create([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'password'   => Hash::make($request->password),
            'role'       => $request->role,
            'status'     => $request->status,
        ]);

        return redirect()->back()->with('success', 'User created successfully.');
    }

    // Edit user
    public function edit(User $user)
    {
        // dd($user);
        // $user = User::findOrFail($id);
        return view('admin_edit_user', compact('user'));
    }

    // Update user with RBAC restrictions
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name'  => 'required|string|max:255',
            'email'      => 'required|email|unique:users,email,' . $user->id,
            'role'       => 'required|in:Super Admin,Admin,Sales Manager,Sales Representative',
            'status'     => 'required|in:Active,Inactive,Pending Accounts',
        ]);

        $currentUser = auth()->user();

        $allowedRoles = match ($currentUser->role) {
            'Super Admin' => ['Admin', 'Sales Manager', 'Sales Representative'],
            'Admin' => ['Sales Manager', 'Sales Representative'],
            'Sales Manager' => ['Sales Manager'],
            default => [],
        };

        if (!in_array($user->role, $allowedRoles)) {
            return redirect()->back()->withErrors(['You are not authorized to edit this user.']);
        }

        if ($request->role === 'Super Admin' && $user->role !== 'Super Admin') {
            return redirect()->back()->withErrors(['You cannot upgrade users to Super Admin.']);
        }

        // Prevent downgrading the only Super Admin
        if (
            $user->role === 'Super Admin' &&
            $request->role !== 'Super Admin' &&
            User::where('role', 'Super Admin')->count() === 1
        ) {
            return redirect()->back()->withErrors(['Cannot downgrade the only Super Admin.']);
        }

        $user->update([
            'first_name' => $request->first_name,
            'last_name'  => $request->last_name,
            'email'      => $request->email,
            'role'       => $request->role,
            'status'     => $request->status,
        ]);

        return redirect()->back()->with('success', 'User updated successfully.');
    }

    // Delete user with RBAC protection
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $currentUser = auth()->user();

        $allowedRoles = match ($currentUser->role) {
            'Super Admin' => ['Admin', 'Sales Manager', 'Sales Representative'],
            'Admin' => ['Sales Manager', 'Sales Representative'],
            'Sales Manager' => ['Sales Manager'],
            default => [],
        };

        if (!in_array($user->role, $allowedRoles)) {
            return redirect()->back()->withErrors(['You are not authorized to delete this user.']);
        }

        if ($user->role === 'Super Admin') {
            return redirect()->back()->withErrors(['Super Admin account cannot be deleted.']);
        }

        // Prevent self-deletion
        if ($user->id === $currentUser->id) {
            return redirect()->back()->withErrors(['You cannot delete your own account.']);
        }

        $user->delete();

        return redirect()->back()->with('success', 'User deleted successfully.');
    }
}
