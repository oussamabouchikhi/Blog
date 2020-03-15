<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    // when usin Mass Assignment in controller 
    // we select properties which will be passed for security reasons
    protected $fillable = ['name'];
}
