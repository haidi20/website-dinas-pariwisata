<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['category_id', 'author_id', 'title', 'image', 'slug', 'content', 'read', 'breaking_news'];
}
