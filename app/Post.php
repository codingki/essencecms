<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    //
    protected $fillable = [
        'user_id', 'category_id', 'photo_id', 'title', 'body', 'slug', 'status', 'tags'
    ];

    use Sluggable;

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function user (){
    	return $this->belongsTo('App\User');
    }

    public function photo (){
    	return $this->belongsTo('App\Photo');
    }

    public function category (){
    	return $this->belongsTo('App\Categories');
    }

}
