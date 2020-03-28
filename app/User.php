<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Profile;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** check if user is admin or not */
    public function isAdmin() {
        
        return $this->role == 'admin';
    }

    /** get user Gravatar (Globally Recognized Avatar) */
    public function getGravatar()
    {
       
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return 'http://gravatar.com/avatar/$hash';
    }

    /** Determine if the user has a profile picture or not using Regular Expression */
    public function hasImage()
    {
        if (preg_match('/profile-pictures/', $this->profile->image, $match)) {
            # contains /profile-pictures/ means image is stored in this folder
            return true;
        } else {
            return false;
        }
    }

    /** Get user profile picture */
    public function getImage()
    {
        return $this->profile->image;
    }


    public function profile()
    {
        // use App\Profile;  dont forget to use the Profile Model up
        // This User has one profile
        return $this->hasOne(Profile::class);
    }
}
