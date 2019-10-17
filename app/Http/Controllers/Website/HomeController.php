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
}
