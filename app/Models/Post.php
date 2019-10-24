<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){
        return $this->belongsTo('App\Models\Category');
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
}
