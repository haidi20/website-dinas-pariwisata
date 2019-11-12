<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Website\BaseWebsiteController as BaseController;

use App\Web\Models\Menu;

use App\Repositories\PostRepository;

class PageController extends BaseController
{
    public function __construct(PostRepository $postRepo)
    {
        $this->postRepo = $postRepo;
    }

    public function index($page)
    {

        $link = 'page/'.$page;
        $menu = Menu::where('link', $link)->first();
        if(!$menu) abort(404);

        $page = $this->postRepo->page($link);

        // jika belum di isi menu tersebut
        if($page){
            $view = 'index';
        }else{
            $view = 'empty';
        }

        return $this->view('website.page.'.$view, compact('page'));
    }
}
