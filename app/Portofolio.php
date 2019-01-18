<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $fillable = [
        'title',
        'logo',
        'description',
        'month',
        'category',
        'instagram',
        'twitter',
        'facebook',
        'linkedin',
        'youtube',
        'photos',
        'video',
    ];

    public function photo (){
    	return $this->belongsTo('App\Photo');
    }
}

