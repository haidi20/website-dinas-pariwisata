<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'category_id', 
        'author_id', 
        'title', 
        'image', 
        'slug', 
        'content', 
        'read', 
        'breaking_news'
    ];
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo('App\Web\Models\Post\Category');
    }

    public function file()
    {
        return $this->morphOne('App\Web\Models\File', 'ref');
    }

    public function getNameCategoryAttribute(){
        if($this->category){
            return $this->category->name;
        }
    }

    public function getColorCategoryAttribute(){
        if($this->category){
            return $this->category->color;
        }
    }

    public function getDateAttribute(){
        return $this->created_at->format('d M Y');
    }

    public function getTimeAttribute(){
        return $this->created_at->format('H:i A');
    }

    public function getLimitContentAttribute(){
        return str_limit($this->content, 40);
    }

    public function getLimitContentLargeAttribute(){
        return str_limit($this->content, 200);
    }
}
