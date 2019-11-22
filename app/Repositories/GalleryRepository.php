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
        $gallery = Gallery::where('type', 'image');
        $gallery = $gallery->limit($limit);
        $gallery = $gallery->skip(request('skip'));
        $gallery = $gallery->get();
        
        return $gallery;
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

    public function baseSlugVideo($slug = null)
    {
        $video = Gallery::where('type', 'video')->where('slug', $slug);

        $video->increment('read');

        return $video->first();
    }

    public function withoutThisVideo($id = null, $limit = null)
    {
        return Gallery::where('type', 'video')->where('id', '!=', $id)->limit($limit)->get();
    }
}