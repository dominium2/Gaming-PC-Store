<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display the admin dashboard.
     */
    public function dashboard()
    {
        $users = User::all(); // Fetch all users
        $news = News::all(); // Fetch all news posts
        return view('admin.admin-dashboard', compact('users', 'news'));
    }

    /**
     * Create a new user.
     */
    public function create(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'address' => 'required|string|max:255',
            'is_admin' => 'required|in:0,1', // Validate is_admin to accept only 0 or 1
            'birthday' => 'required|date|before_or_equal:today', // Validate birthday
        ]);

        User::create([
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'is_admin' => $request->is_admin, // Save the is_admin value directly
            'birthday' => $request->birthday, // Save the birthday
        ]);

        return redirect()->route('admin.dashboard')->with('status', 'User created successfully.');
    }

    /**
     * Delete a user.
     */
    public function delete(Request $request)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);

        $user = User::findOrFail($request->user_id);

        // Prevent the admin from deleting themselves
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.dashboard')->with('error', 'You cannot delete yourself.');
        }

        $user->delete();

        return redirect()->route('admin.dashboard')->with('status', 'User deleted successfully.');
    }

    /**
     * Promote a user to admin.
     */
    public function promote(Request $request)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);
        $user = User::findOrFail($request->user_id);
        $user->is_admin = true;
        $user->save();

        return redirect()->route('admin.dashboard')->with('status', 'User promoted to admin.');
    }

    /**
     * Demote a user to normal user.
     */
    public function demote(Request $request)
    {
        $request->validate(['user_id' => 'required|exists:users,id']);

        $user = User::findOrFail($request->user_id);

        // Prevent the admin from demoting themselves
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.dashboard')->with('error', 'You cannot demote yourself.');
        }

        $user->is_admin = false; // Set is_admin to 0
        $user->save();

        return redirect()->route('admin.dashboard')->with('status', 'User demoted to normal user successfully.');
    }
}
