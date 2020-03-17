<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Post;

class Category extends Model
{

    // when usin Mass Assignment in controller 
    // we select properties which will be passed for security reasons
    protected $fillable = ['name'];
    
    /**
     * Get all the posts for this category.
     * ! Note that posts is an attribute not a function on call we'll do ->posts without ()
     */
    public function posts()
    {
        // This Category has many posts
        return $this->hasMany(Post::class);
    }
}
