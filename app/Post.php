<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Category;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['title', 'description', 'content', 'image', 'category_id'];

    /**
     * Get the category of this post.
     * ! Note that category is an attribute not a function on call we'll do ->category without ()
     */
    public function category() {

        // This Post belongs to one category
        return $this->belongsTo(Category::class);

    }
}
