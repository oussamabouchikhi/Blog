<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// import the storage facade
use Illuminate\Support\Facades\Storage;

use App\Post;
use App\Category;
use App\Tag;
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
        // return the crate view and pass all categories & tags to it
        return view('posts.create')->with('categories', Category::all())->with('tags', Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $post = Post::create([
            'title' => $request->title ,
            'description' => $request->description ,
            'content' => $request->content ,
            'category_id' => $request->categoryID ,
            'image' => $request->image->store('images', 'public'),
            'user_id' => $request->user_id
        ]);

        if ($request->tags) { // if user choosed tags
            // attach post with its tags(array)
            $post->tags()->attach($request->tags);
        }

        session()->flash('success', 'post created successfully');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $user = $post->user; // get post user
        $profile = $user->profile; // get post user_profile
        // return single post page with the post info, user and all categories
        return view('posts.show')->with('post', $post)->with('categories', Category::all())->with('profile', $profile)->with('user', $user);
    }
  
    /**
     * Show the form for editing the specified post.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // we'll be using the same create form to edit posts
        return view('posts.create', ['post' => $post, 'categories' => Category::all(), 'tags' => Tag::all()]);
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

        if ($request->tags) {
            // sync (attach + detach) add a tag if selected or remove it if not
            $post->tags()->sync($request->tags);
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
