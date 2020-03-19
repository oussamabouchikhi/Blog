<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    
    public function index()
    {
        return view('users.index')->with('users', User::all());
    }


    /** Make a normal user(writer) as an Admin */
    public function makeAdmin(User $user)
    {
        $user->role = 'admin';
        $user->save();
        return redirect(route('users.index'));
    }

    /** Get User Profile */
    public function prof(User $user)
    {
        $profile = $user->profile;
        return view('users.profile', ['user' => $user, 'profile' => $profile]);
    }
}
