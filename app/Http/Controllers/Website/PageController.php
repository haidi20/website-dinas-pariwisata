<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Website\BaseWebsiteController as BaseController;

use App\Web\Models\Menu;

class PageController extends BaseController
{
    public function index($page)
    {
        $checkLink = Menu::where('link', 'page/'.$page)->first();

        if(!$checkLink) abort(404);

        return 'ada';
    }
}
