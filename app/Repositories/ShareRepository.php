<?php

namespace App\Repositories;

use App\Models\Share;

class ShareRepository{
    public function all(){
        return Share::all();
    }
}

