<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Website\BaseWebsiteController as BaseController;

class PostController extends BaseController
{
    public function __construct(){

    }

    public function index(){
        return view('website.post.index');
    }

    public function detail(){
        return view('website.post.detail');
    }
}
