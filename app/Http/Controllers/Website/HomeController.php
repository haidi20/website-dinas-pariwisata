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
        $firstPost          = $this->postRepo->firstPost();
        $postsLimitSix      = $this->postRepo->postsLimit(7);
        $postsLimitThree    = $this->postRepo->postsLimit(3);


        return view('website.home.index', compact(
            'firstPost', 'postsLimitSix', 'postsLimitThree'
        ));
    }
}
