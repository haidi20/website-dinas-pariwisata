<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = ['name'];
    
    public function post(){
        return $this->hasMany('App\Models\Post');
    }

    public function getCountPostAttribute(){
        if($this->post){
            return $this->post->count();
        }
    }
}
