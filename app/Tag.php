<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Tag extends Model
{
    // create method use mass assignment
    // So when using Mass Assignment in controller 
    // we select properties which will be passed for security reasons
    protected $fillable = ['name'];

    public function posts() {
        /** Get the posts of this tag */

        // This Tag belongs to many posts
        return $this->belongsToMany(Post::class);

    }
    
}
