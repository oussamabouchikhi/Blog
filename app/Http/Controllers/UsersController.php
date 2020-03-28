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

    public function update(User $user, Request $request)
    {
        // get user profile(our defined method)
        $profile = $user->profile;
        // get all data coming from request [dd($request->all());]
        $data = $request->all();
        // if user updated his image
        if ($request->hasFile('image')) {
            # save image in a folder called profile-pictures
            $image = $request->image->store('profile-pictures', 'public');
            $data['image'] = $request->image;
        }
        // update profile with this image
        $profile->update($data);
        return redirect(route('home'));
    }
}
