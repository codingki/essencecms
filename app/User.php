<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id' ,'is_active' ,'name', 'email', 'password', 'photo_id', 'bio', 'facebook', 'instagram', 'twitter', 'linkedin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */

    public function isActive(){
        if ($this->is_active == 1) {
            return true;
        }else{
            return false;    
        }
        
    }
    public function isAdmin(){
        if ($this->role->name == "administrator") {
            return true;
        }else{
            return false;    
        }
        
    }

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role(){
        return $this->belongsTo('App\Role');
    }

    public function photo(){
        return $this->belongsTo('App\Photo');
    }

    public function posts(){
        return $this->hasMany('App\Post');
    }

    
}
