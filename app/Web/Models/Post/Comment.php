<?php

namespace App\Web\Models\Post;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }

    public function scopeBasePost($query, $post_id)
    {
        return $query->where('post_id', $post_id);
    }

    public function scopeSearch($query, $by, $key)
    {
        return $query->where($by, 'LIKE', '%'.$key.'%');
    }

    public function getReviewTextAttribute()
    {
        return word_limit($this->text, 28);
    }
}