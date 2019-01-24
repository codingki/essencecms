<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;

class Post extends Model implements ViewableContract
{
    //
    protected $fillable = [
        'user_id', 'category_id', 'photo_id', 'title', 'body', 'slug', 'status', 'tags'
    ];

    use Sluggable;
    use Viewable;

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
