<?php

namespace App\Repositories;

use App\Web\Models\Post\Comment;

class CommentRepository {
    public function all()
    {
        return Comment::active()->get();
    }

    public function limit($limit, $post_id)
    {
        return Comment::active()->basePost($post_id)->limit($limit)->get();
    }

    public function show($limit, $post_id)
    {
        $comment = Comment::skip(request('skip'))->basePost($post_id)->limit($limit)->get();

        $comment = $comment->map(function($item){
            $item->detail_date_time = 'keren';

            return $item;
        });

        return $comment;
    }
}