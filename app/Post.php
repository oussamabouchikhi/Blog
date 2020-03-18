<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Category;
use App\Tag;

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

    /**
     * Get the tags of this post.
     * ! Note that tags is an attribute not a function on call we'll do ->category without ()
     */
    public function tags() {

        // This Post belongs to many tags
        return $this->belongsToMany(Tag::class);

    }

    /**
     * Determine if a post a tag or not
     * Note: laravel send data from database as Collection
     */
    public function hasTag($tagId) {

        /**
         * toArray(): converts a collection to an array
         * pluck(): to specify which column of tags table we want to get
         * in_array: is a php function to find an item in an array
         */
        
        return in_array($this->tags->pluck('id')->toArray());

    }
}
