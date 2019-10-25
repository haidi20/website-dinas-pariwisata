<?php

namespace App\Repositories;

use App\Models\Gallery;

class GalleryRepository 
{
    // image
    public function allImages(){
        return Gallery::where('type', 'image')->paginate(10);
    }

    public function limitImages($limit){
        return Gallery::where('type', 'image')->limit($limit)->get();
    }

    // end image

    //video

    public function allVideos(){
        // return DB::table()
    }

    public function limitVideos(){

    }

    public function firstVideo(){
        return Gallery::where('type', 'video')->first();
    }
}