<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\Http\Requests\PostRequest;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index')->with('posts', Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        Post::create([
            'title' => $request->title ,
            'description' => $request->description ,
            'content' => $request->content ,
            'image' => $request->image->store('images', 'public')
        ]);

        session()->flash('success', 'post created successfully');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

       // Post::all(); get untrashed posts
       // Post::withTrashed(); get all post even trashed ones
       // Post::onlyTrashed(); get only trashed posts

        $post = Post::withTrashed()->where('id', $id)->first();

        if ($post->trashed()) { // if this post was trashed

            // Storage::delete($post->image); // delete post image from storage file
            Storage::disk('public')->delete($post->image); // delete post image from storage file
            $post->forceDelete(); // delete it permanentely
            session()->flash('success', 'post deleted successfully');

        } else {

            $post->delete(); // Move this post to trash
            session()->flash('success', 'post moved to trash successfully');

        }

        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     */
    public function trash()
    {
        // get trashed or soft deleted posts
        $trashed = Post::onlyTrashed()->get();

        // send trashed posts data to posts.index view
        // to reuse its table to display trashed posts
        return view('posts.index')->withPosts($trashed);
    }    
}
