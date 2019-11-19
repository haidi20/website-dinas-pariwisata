<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Website\BaseWebsiteController as BaseController;

use App\Models\Post;

use App\Repositories\PostRepository;
use App\Repositories\ShareRepository;
use App\Repositories\CommentRepository;

use App\Web\Models\Post\Category;

class PostController extends BaseController
{
    public function __construct(
        Request $request,
        PostRepository $postRepo,
        ShareRepository $shareRepo,
        CommentRepository $commentRepo
    ){
        $this->request      = $request;
        $this->postRepo     = $postRepo;
        $this->shareRepo    = $shareRepo;
        $this->commentRepo  = $commentRepo;
    }

    public function index($category = null){
        $posts  = $this->postRepo->filter(3, 'all', null, $category);

        return $this->view('website.post.index', compact('posts'));
    }

    public function detail($category, $slug){

        $dataCategory = Category::where('name', $category)->first();

        $post       = $this->postRepo->baseSlug($slug);
        $shares     = $this->shareRepo->all();
        $comments   = $this->commentRepo->all();
        $suggests   = $this->postRepo->baseCategory($dataCategory->id, $post->id, $limit = 6);
        
        $tags       = $this->postRepo->tags($post->id);

        return $this->view('website.post.detail', compact(
            'post', 'shares', 'suggests', 'tags', 'comments'
        ));
    }
}
