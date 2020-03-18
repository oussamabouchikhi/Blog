<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use Illuminate\Http\TagRequest;
use App\Tag;

class TagsController extends Controller
{
    /**
     * Display a listing of the Tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display index(tags page) with all tags in database
        return view('tags.index')->with('tags', Tag::all());
    }

    /**
     * Show the form for creating a new Tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tags.create');
    }

    /**
     * Store a newly created tag in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TagRequest $request)
    {
        // [Mass assignment] IF we have a lot of columns every one will get its equivalant value from request
        Tag::create($request->all());

        // Flash message
        session()->flash('success', 'Tag created successfully');

        return redirect(route('tags.index'));
    }

    /**
     * Display the specified tag.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified tag.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        // we can just use create.blade.php form to edit tags
        return view('tags.create')->with('tag', $tag);
    }

    /**
     * Update the specified tag in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {

        $category->update([
            'name' => $request->name
        ]);

        // Flash message
        session()->flash('success', 'Tag updated successfully');

        return redirect(route('tags.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect(route('tags.index'));
    }
}
