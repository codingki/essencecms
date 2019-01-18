<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $fillable = [
        'name',
        'client',
        'photo_id',
        'body',
    ];

    public function photo (){
    	return $this->belongsTo('App\Photo');
    }
}
