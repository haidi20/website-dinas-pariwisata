<?php

namespace App\Http\Controllers\Sitemanager;

use App\Web\Models\Post\Post;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

class BreakingNewsController extends BaseController
{
    public function index()
    {
        return $posts = Post::where('breaking_news', 0)->where('type', 'post')->get();
        $breaking_news = Post::where('breaking_news', 1)->get();
        return view('sitemanager.breaking_news.index', compact('posts','breaking_news'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if(!$post){
            return 'not found';
        }

        $post->breaking_news = $post->breaking_news == 1 ? 0 : 1;
        $post->save();

        return $post;
    }
}
