<?php

namespace App\Repositories;

use App\Models\Gallery;

class GalleryRepository 
{
    // image
    public function allImage(){
        return Gallery::where('type', 'image')->paginate(10);
    }

    public function imageLimit($limit){
        return Gallery::where('type', 'image')->limit($limit)->get();
    }

    // end image

    //video

    public function allVideo(){
        // return DB::table()
    }

    public function limitVideo(){

    }

    public function firstVideo(){
        return Gallery::where('type', 'video')->first();
    }
}