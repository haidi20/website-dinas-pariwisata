<?php

namespace App\Http\Controllers\Website;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Repositories\PostRepository;
use App\Repositories\MediaRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\CategoryRepository;

class BaseWebsiteController extends Controller
{
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
        $this->postRepo     = \App::make(PostRepository::class);
        $this->mediaRepo    = \App::make(MediaRepository::class);
        $this->galleryRepo  = \App::make(GalleryRepository::class);
        $this->categoryRepo = \App::make(CategoryRepository::class);

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
            4 => (object) [
                'name' => 'footerMedsos',
                'data' => $this->mediaRepo->all()
            ],
            5 => (object) [
                'name' => 'footerCategories',
                'data' => $this->categoryRepo->all()
            ],
            6 => (object) [
                'name' => 'footerImages',
                'data' => $this->galleryRepo->limitImages(6),
            ],
            7 => (object) [
                'name' => 'footerPosts',
                'data' => $this->postRepo->limit(3),
            ],
        ];
    }
}
