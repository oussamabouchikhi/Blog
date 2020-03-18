<?php

namespace App\Http\Middleware;

use App\Category;

use Closure;

class checkCategory
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
        *  Since category field is required, if a user tries to add a new post
        *   & there is no category he will get an error
        *  so we use this middleware to tell the user he must add a category before
        *  adding a post then it will redirect him to categories page.
        */
        $categoryCount = Category::all()->count(); // returns number of categories
        if ($categoryCount == 0) {
            
            session()->flash('error', 'You need first to add a category');
            return redirect(route('categories.index'));

        }

        // run request normally
        return $next($request);
    }
}
