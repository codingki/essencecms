<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $fillable = [
        'title',
        'photo_id',
        'thumbnail',
        'description',
        'month',
        'category',
        'instagram',
        'twitter',
        'facebook',
        'linkedin',
        'youtube',
        'website',
        'photos',
        'video',
    ];

    public function photo (){
    	return $this->belongsTo('App\Photo');
    }
    public function thumbnail (){
        return $this->belongsTo('App\Photo');
    }
}

