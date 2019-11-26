<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Website\BaseWebsiteController as BaseController;

// repositories
use App\Repositories\PostRepository;
use App\Repositories\GalleryRepository;
use App\Repositories\CategoryRepository;

class HomeController extends BaseController
{
    public function __construct(
        PostRepository $postRepo,
        GalleryRepository $galleryRepo,
        CategoryRepository $categoryRepo
    ){
        $this->postRepo     = $postRepo;
        $this->galleryRepo  = $galleryRepo;
        $this->categoryRepo  = $categoryRepo;
    }

    public function index()
    {
        // $image              = $this->galleryRepo->limitImages(5);
        
        $firstPost          = $this->postRepo->first();
        $lastPosts          = $this->postRepo->last($limit = 6);
        $categories         = $this->categoryRepo->all();
        // $popularPosts       = $this->postRepo->popular($limit = 6);
        $limitSixPosts      = $this->postRepo->limit(7);
        $limitThreePosts    = $this->postRepo->limit(3);
        $breakingNewsPosts  = $this->postRepo->breakingNews();


        return $this->view('website.home.index', compact(
            'limitSixPosts', 'breakingNewsPosts', 'categories',
            'firstPost', 'limitThreePosts', 'limitSixPosts', 'lastPosts'
        ));
    }

    public function popularPosts()
    {
        return $this->postRepo->popular($limit = 6);
    }

    public function newPosts()
    {
        $firstPost          = $this->postRepo->first();
        $limitThreePosts    = $this->postRepo->limit(3);

        return response()->json(compact('firstPost', 'limitThreePosts'));
    }

    public function galleries()
    {
        return $this->galleryRepo->limitImages(5);
    }

    public function latestPosts()
    {
        return $this->postRepo->last($limit = 6);
    }
}
