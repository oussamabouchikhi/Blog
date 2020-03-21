<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;

class Profile extends Model
{
    protected $fillable = [
        'user_id', 'about', 'image', 'facebook', 'instagram'
    ];

    public function user()
    {
        # This profile belongs to one user
        return $this->belongsTo(User::class, 'users_id');
        // return $this->belongsTo('App\User','user_id'); from stack overflow
    }
}
