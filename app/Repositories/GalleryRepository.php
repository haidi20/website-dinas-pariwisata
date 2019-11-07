<?php

namespace App\Repositories;

use App\Web\Models\Gallery;

class GalleryRepository 
{
    // image
    public function allImages()
    {
        return Gallery::where('type', 'image')->get();
    }

    public function paginateImages($limit = null)
    {
        return Gallery::where('type', 'image')->paginate($limit);
    }

    public function limitImages($limit)
    {
        return Gallery::where('type', 'image')->limit($limit)->get();
    }

    // end image

    //video

    public function allVideos($limit = null)
    {
        return Gallery::where('type', 'video')->paginate($limit);
    }

    public function limitVideos($limit = null)
    {
        return Gallery::where('type', 'video')->limit($limit)->get();
    }

    public function firstVideo()
    {
        return Gallery::where('type', 'video')->first();
    }
}