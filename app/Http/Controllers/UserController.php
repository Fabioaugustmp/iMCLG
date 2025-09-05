<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Company; // Import the Company model
use App\Http\Requests\UserRequest;
use App\User as AppUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        return view('users.index');
    }

    public function listAllUsers()
    {
        $users = User::all();

        return view('users.users', [
            'users' => $users
        ]);
    }

    public function listUser(User $user)
    {
        $companies = Company::all(); // Fetch all companies
        return view("users.users-update", [
            'user' => $user,
            'companies' => $companies
        ]);
        
    }

    public function showForm()
    {
        $companies = Company::all(); // Fetch all companies
        return view('users.users-create', compact('companies'));
    }

    public function addUser(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed',
            'company_id' => 'nullable|exists:companies,id', // Validate company_id
            'role' => 'required|in:admin,manager,user', // Validate role
        ]);

        $data = $request->only(['name', 'email', 'password', 'company_id', 'role']); // Include company_id and role

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        return redirect()
            ->route('users');
    }

    public function updateUser(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id, // Unique email, ignoring current user's email
            'company_id' => 'nullable|exists:companies,id',
            'role' => 'required|in:admin,manager,user',
        ]);

        $data = $request->only(['name', 'company_id', 'role']);

        // Only update password if it's provided
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'required|confirmed',
            ]);
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('users')->with('success', 'User updated successfully.');
    }
}

