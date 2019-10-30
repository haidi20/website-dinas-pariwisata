<?php

namespace App\Http\Controllers\Sitemanager;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BreakingNewsController extends Controller
{
    public function index()
    {
        $posts = Post::select('id','title')->where('breaking_news',0)->get();
        $breaking_news = Post::select('id','title')->where('breaking_news',1)->get();
        return view('sitemanager.breaking_news.index', compact('posts','breaking_news'));
    }

    public function update(Request $request, $id)
    {
        return 'update breaking news bisa';

        $post = Post::find($id);

        if(!$post){
            return response()->json([
                'msg' => 'post not found'
            ], 404);
        }

        $input = $request->input('breaking_news');

        $post->breaking_news = $input;
        $post->save();

        return response()->json(['post' => $post, 'input' => $input]);
    }
}
