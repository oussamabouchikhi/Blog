<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// import the storage facade
use Illuminate\Support\Facades\Storage;

use App\Post;
use App\Category;
use App\Http\Requests\PostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostsController extends Controller
{

    public function __contruct(){

        // This middleware runs only for create method
        $this->middleware('checkCategory')->only('create');
    }


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
        // return the crate view and pass all categories to it
        return view('posts.create')->with('categories', Category::all());
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
            'category_id' => $request->categoryID ,
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
    public function edit(Post $post)
    {
        // we'll be using the same create form to edit posts
        return view('posts.create')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        // get only this attributtes from request (this method adds some security)
        $data = $request->only(['title', 'description', 'content']);
        // if user has updated post image
        if ($request->hasFile('image')) {
            // Sqve the new image in images folder
            $image = $request->image->store('images', 'public');
            // delete the old image
            Storage::disk('public')->delete($post->image);
            // Add the new image to $data
            $data['image'] = $image;
        }
        // update post with this data
        $post->update($data);

        session()->flash('success', 'post updated successfully');

        return redirect(route('posts.index'));
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
    
    /**
     * Restore trashed posts from trash
     *
     */
    public function restore($id)
    {
        // get the post by its id then restore it
        Post::withTrashed()->where('id', $id)->restore();

        session()->flash('success', 'post restored successfully');

        return redirect(route('posts.index'));
        
    }  
}
