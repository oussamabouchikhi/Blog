<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class WelcomeController extends Controller
{
    public function index()
    {
        // return welcome view with all posts
        return view('welcome', [
            'posts' => Post::all()
        ]);
    }
}
