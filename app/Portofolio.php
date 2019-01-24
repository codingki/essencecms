<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use CyrildeWit\EloquentViewable\Viewable;
use CyrildeWit\EloquentViewable\Contracts\Viewable as ViewableContract;
class Portofolio extends Model implements ViewableContract
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
        'slug'
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

    public function photo (){
    	return $this->belongsTo('App\Photo');
    }
    public function thumbnail_image (){
        return $this->belongsTo('App\Photo', 'thumbnail');
    }
}

