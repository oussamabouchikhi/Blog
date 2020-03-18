<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// auth middleware checks if the user is authenticated or not
// if not user can't access this routes categories, posts, create... he will be redirected to login page
Route::group(['middleware' => 'auth'], function() {
    // Define all categories routes
    Route::resource('/categories', 'CategoriesController');

    // Define all tags routes
    Route::resource('/tags', 'TagsController');

    // Define all posts routes
    Route::resource('/posts', 'PostsController');

    // trashed posts route
    Route::get('/trash', 'PostsController@trash')->name('trash.index');

    // Restore trashed posts route
    Route::get('/trash/{id}', 'PostsController@restore')->name('trash.restore');
});



