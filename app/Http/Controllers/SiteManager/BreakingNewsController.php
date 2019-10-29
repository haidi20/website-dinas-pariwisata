<?php

namespace App\Http\Controllers\Sitemanager;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BreakingNewsController extends Controller
{
    public function index()
    {
        return view('sitemanager.breaking_news.index');
    }
}
