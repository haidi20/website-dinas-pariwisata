<?php

namespace App\Repositories;

use App\Web\Models\Post\Category;

class CategoryRepository {
    public function all(){
        return Category::all();
    }
}