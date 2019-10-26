<?php

namespace App\Http\Controllers\SiteManager;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = DB::table('posts')->orderBy('posts.created_at');
        $posts = $posts->get();

        $posts = $posts->map(function($post){
           $post->category = Category::where('id', $post->category_id)->first();

           return $post;
        });

        return $this->sendResponse($posts->toArray(), "Posts retrieved successfully.");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }

    /**
     * Display list of Breaking news unselected
     * 
     * @return \Illuminate\Http\Response
     */
    public function unSelected(){
        $unSelected = DB::table('posts')->select('id','title')->where('breaking_news',0)->get();
        return $this->sendResponse($unSelected->toArray(), "Breaking news un-selected retrieved successfully.");
    }

    /**
     * Display list of Breaking news selected
     * 
     * @return \Illuminate\Http\Response
     */
    public function selected(){
        $unSelected = DB::table('posts')->select('id','title')->where('breaking_news',1)->get();
        return $this->sendResponse($unSelected->toArray(), "Breaking news selected retrieved successfully.");
    }

    /**
     * Change Status Breaking News of Post
     * 
     * @param id
     * @param  \Illuminate\Http\Request  $request
     */
    public function changeStatus(Request $request, $id){
        $input = $request->all();
        
        $post = Post::find($id);
        
        if(is_null($post)){
            return $this->sendError('post not found.');
        }else{
            $post->breaking_news = $input['breaking_news'];
            $post->save();
        }

        return $this->sendResponse($post->toArray(), "Posts updated successfully.");
    }
}
