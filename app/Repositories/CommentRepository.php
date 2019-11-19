<?php

namespace App\Repositories;

use App\Web\Models\Post\Comment;

class CommentRepository {
    public function all()
    {
        return Comment::active()->get();
    }

    public function limit($limit)
    {
        return Comment::active()->limit($limit)->get();
    }

    public function show($limit)
    {
        $comment = Comment::skip(request('skip'))->limit($limit)->get();

        $comment = $comment->map(function($item){
            $item->detail_date_time = 'keren';

            return $item;
        });

        return $comment;
    }
}