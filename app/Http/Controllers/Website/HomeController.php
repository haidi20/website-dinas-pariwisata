<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Website\BaseWebsiteController as BaseController;

// repositories
use App\Repositories\PostRepository;
use App\Repositories\GalleryRepository;

class HomeController extends BaseController
{
    public function __construct(
        PostRepository $postRepo,
        GalleryRepository $galleryRepo
    )
    {
        $this->postRepo = $postRepo;
        $this->galleryRepo = $galleryRepo;
    }

    public function index()
    {
        $image              = $this->galleryRepo->imageLimit(5);
        
        $firstPost          = $this->postRepo->first();
        $lastPosts           = $this->postRepo->last($limit = 6);
        $popularPosts        = $this->postRepo->popular($limit = 6);
        $limitSixPosts      = $this->postRepo->limit(7);
        $limitThreePosts    = $this->postRepo->limit(3);
        $breakingNewsPosts  = $this->postRepo->breakingNews();


        return $this->view('website.home.index', compact(
            'firstPost', 'limitSixPosts', 'limitThreePosts',
            'breakingNewsPosts', 'image', 'lastPosts', 'popularPosts'
        ));
    }
}
