<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Slim;

class Photo extends Model
{
    //
    protected $uploads = 'storage/';
    protected $fillable = ['file'];
    public function getFileAttribute($photo){
      return $this->uploads . $photo;
    }

    public static function upload($image){
    	$name = time().$image['output']['name'];
        $data = $image['output']['data'];
        $save = Slim::saveFile($data, $name, 'storage/');
        $photo = Photo::create(['file'=>$name]);
        
        return $photo->id;
    }

    public static function remove($file, $photo_id){
    	unlink(public_path() ."/". $file);
        $de = Photo::findOrFail($photo_id);
        $de->delete();
    }
}
