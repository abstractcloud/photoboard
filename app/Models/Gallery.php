<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Gallery extends Model
{
    protected $table = 'gallery';
    
    protected $fillable = [
        'title', 
        'description', 
        'preview', 
        'image',
        'path', 
        'private',
        'user_id', 
        
    ];
    
    public static function getGallery($id = null)
    {
        $userId = Auth::user()->id;
        $gallery = Gallery::where('user_id', $userId)->get();
        
        if(!is_null($id)) {
            $gallery = Gallery::where('user_id', $id)->where('private', 0)->get();
        }
        
        return $gallery;
    }
}
