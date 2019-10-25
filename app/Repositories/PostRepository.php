<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository {

    public function all(){
        return Post::all();
    }

    public function limit($limit){
        return Post::take($limit)->get();
    }

    public function first(){
        return Post::first();
    }

    public function last($limit = null){
        return Post::orderBy('created_at', 'desc')->limit($limit)->get();
    }

    public function popular($limit = null){
        return Post::orderBy('read', 'desc')->limit($limit)->get();
    }
    
    public function breakingNews(){
        return Post::where('breaking_news', 1)->get();
    }

    public function baseSlug($slug){
        return Post::where('slug', $slug)->first();
    }

    public function baseCategory($category, $limit = null){
        return Post::where('category_id', $category)->limit($limit)->get();
    }


}