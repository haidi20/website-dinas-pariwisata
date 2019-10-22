<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository {

    public function all(){
        return Post::all();
    }

    public function postsLimit($limit){
        return Post::take($limit)->get();
    }

    public function firstPost(){
        return Post::first();
    }

}