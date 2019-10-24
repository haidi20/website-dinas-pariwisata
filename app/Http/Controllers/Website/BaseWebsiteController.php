<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Repositories\PostRepository;
use App\Repositories\GalleryRepository;

class BaseWebsiteController extends Controller
{
    public function __construct(
        PostRepository $postRepo,
        GalleryRepository $galleryRepo
    ){
        $this->postRepo     = $postRepo;
        $this->galleryRepo  = $galleryRepo;
    }

    public function view($file, $data = false){
        foreach ($this->share() as $index => $item) {
            $data[$item->name] = $item->data;
        }

        if($data){
            return view($file, (array) $data);
        }else{
            return view($file);
        }
    }

    public function share(){
        return [
            0 => (object) [
                'name' => "rightSideVideo",
                'data' => $this->galleryRepo->firstVideo(),
            ], 
            1 => (object) [
                'name' => "rightSidePosts",
                'data' => $this->postRepo->limit(3),
            ],
            2 => (object) [
                'name' => "rightSideRecentPosts",
                'data' => $this->postRepo->last($limit = 5),
            ],
            3 => (object) [
                'name' => "rightSidePopularPosts",
                'data' => $this->postRepo->popular($limit = 5),
            ],
        ];
    }
}
