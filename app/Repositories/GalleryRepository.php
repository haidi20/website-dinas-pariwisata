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
        $images = Gallery::where('type', 'image');
        $images = $images->limit($limit);
        $images = $images->skip(request('skip'));
        $images = $images->get();
        
        return $images;
    }

    public function countImages()
    {
        return Gallery::where('type', 'image')->count();
    }

    // end image

    //video

    public function allVideos($limit = null)
    {
        return Gallery::where('type', 'video')->paginate($limit);
    }

    public function limitVideos($limit = null)
    {
        $videos = Gallery::where('type', 'video');
        $videos = $videos->limit($limit);
        $videos = $videos->skip(request('skip'));
        $videos = $videos->get();
        
        return $videos;
    }

    public function countVideos()
    {
        return Gallery::where('type', 'video')->count();
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