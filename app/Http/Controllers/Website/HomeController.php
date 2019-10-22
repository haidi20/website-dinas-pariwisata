<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// repositories
use App\Repositories\PostRepository;

class HomeController extends Controller
{
    public function __construct(PostRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function index()
    {
        return view('website.home.index');
    }

    public function post()
    {
        $firstPost          = $this->postRepo->firstPost();
        $postsLimitSix      = $this->postRepo->postsLimit(7);
        $postsLimitThree    = $this->postRepo->postsLimit(3);

        // return response()->json($posts);
        return compact('firstPost', 'postsLimitSix', 'postsLimitThree');
    }
}
