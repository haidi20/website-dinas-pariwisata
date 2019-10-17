<?php

namespace App\Repositories;

use App\Models\Post;

class PostRepository {

    public function all(){
        return Post::all();
    }

}