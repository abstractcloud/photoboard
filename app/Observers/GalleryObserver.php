<?php

namespace App\Observers;

use App\Models\Gallery;

class GalleryObserver
{
    public function created(Gallery $gallery)
    {
        $gallery->private = 0;
        $gallery->save();
    }
}
