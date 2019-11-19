<?php

namespace App\Repositories;

use App\Web\Models\Post\Comment;

class CommentRepository {
    public function all(){
        return Comment::active()->get();
    }
}