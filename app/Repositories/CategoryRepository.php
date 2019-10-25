<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository {
    public function all(){
        return Category::all();
    }
}