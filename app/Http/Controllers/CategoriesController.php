<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // display index(categories page) with all categories in database
        return view('categories.index')->with('categories', Category::all());
    }

    /**
     * Show the form for creating a new categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created categories in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        
        // valid if we don't have much columns
        // $categ = new Category();
        // $categ->name = $request->name;

        // [Mass assignment] IF we have a lot of columns every one will get its equivalant value from request
        Category::create($request->all());

        // Flash message
        session()->flash('success', 'Category created successfully');

        return redirect(route('categories.index'));

    }

    /**
     * Display the specified categories.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified categories.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        // we can just use create.blade.php form to edit categories
        return view('categories.create')->with('category', $category);
    }

    /**
     * Update the specified categories in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        // method 1
        // $category->name = $request->name;
        // $category->save();
        // method 2
        $category->update([
            'name' => $request->name
        ]);

        // Flash message
        session()->flash('success', 'Category updated successfully');

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified categories from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
