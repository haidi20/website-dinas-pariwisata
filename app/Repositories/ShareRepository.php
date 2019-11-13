<?php

namespace App\Repositories;

use App\Web\Models\Media;

class ShareRepository{
    public function all(){
        return Media::where('status', 1)->get();
    }
}

