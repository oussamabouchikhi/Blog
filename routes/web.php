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

// Admin routes (only admins can access these routes)
Route::middleware(['auth' => 'admin'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('/users', 'UsersController@index')->name('users.index');
    Route::post('/users/{user}/make-admin', 'UsersController@makeAdmin')->name('users.make-admin');
});

// User profile
Route::middleware(['auth'])->group(function () {
    Route::get('/users/{user}/profile', 'UsersController@prof')->name('users.prof');
    Route::post('/users/{user}/profile', 'UsersController@update')->name('users.update');
});