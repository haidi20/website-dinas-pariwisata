<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Website\BaseWebsiteController as BaseController;

use App\Models\Post;

use App\Repositories\PostRepository;
use App\Repositories\ShareRepository;

class PostController extends BaseController
{
    public function __construct(
        Request $request,
        PostRepository $postRepo,
        ShareRepository $shareRepo
    ){
        $this->request      = $request;
        $this->postRepo     = $postRepo;
        $this->shareRepo    = $shareRepo;
    }

    public function index($category = null){
        $posts  = $this->postRepo->filter(3, 'all', null, $category);

        return $this->view('website.post.index', compact('posts'));
    }

    public function detail($slug){

        $post       = $this->postRepo->baseSlug($slug);
        $shares     = $this->shareRepo->all();
        $suggests   = $this->postRepo->baseCategory($post->category_id, $limit = 6);
        
        $tags       = $this->postRepo->tags($post->id);

        return $this->view('website.post.detail', compact(
            'post', 'shares', 'suggests', 'tags'
        ));
    }
}
