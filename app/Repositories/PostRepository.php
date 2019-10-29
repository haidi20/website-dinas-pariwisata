<?php

namespace App\Repositories;

use App\Web\Models\Post\Post;

class PostRepository {

    public function all(){
        return Post::type('post')->all();
    }

    public function limit($limit){
        return Post::type('post')->take($limit)->get();
    }

    public function first(){
        return Post::type('post')->first();
    }

    public function last($limit = null){
        return Post::type('post')->orderBy('created_at', 'desc')->limit($limit)->get();
    }

    public function popular($limit = null){
        return Post::type('post')->orderBy('read', 'desc')->limit($limit)->get();
    }
    
    public function breakingNews(){
        return Post::type('post')->where('breaking_news', 1)->get();
    }

    public function baseSlug($slug){
        return Post::type('post')->where('slug', $slug)->first();
    }

    public function baseCategory($category, $limit = null){
        return Post::type('post')->where('category_id', $category)->limit($limit)->get();
    }


}