<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    public function __construct()
    {

    }

    public function index()
    {
        return view('website.image.index');
    }
}
