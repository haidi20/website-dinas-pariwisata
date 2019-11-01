<?php

namespace App\Http\Controllers\Sitemanager;

use App\Models\Post;
use Illuminate\Http\Request;
// use App\Http\Controllers\Controller;

class BreakingNewsController extends BaseController
{
    public function index()
    {
        $posts = Post::select('id','title')->where('breaking_news',0)->where('type', 'post')->get();
        $breaking_news = Post::select('id','title')->where('breaking_news',1)->get();
        return view('sitemanager.breaking_news.index', compact('posts','breaking_news'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if(!$post){
            return response()->json([
                'msg' => 'post not found'
            ], 404);
        }

        $post->breaking_news = $request->input('breaking_news');
        $post->save();

        return response()->json(['post' => $post]);
    }
}
