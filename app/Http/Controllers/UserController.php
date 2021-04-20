<?php

namespace App\Http\Controllers;

use App\Models\User;
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
        return view("users.users-update", [
            'user' => $user
        ]);
        
    }

    public function showForm()
    {
        return view('users.users-create');
    }

    public function addUser(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed'
        ]);

        $data = $request->only(['name', 'email', 'password']);

        $data['password'] = bcrypt($data['password']);

        $user = User::create($data);

        return redirect()
            ->route('users');
    }
}
