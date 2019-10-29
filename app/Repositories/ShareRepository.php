<?php

namespace App\Repositories;

use App\Web\Models\Media;

class ShareRepository{
    public function all(){
        return Media::where('type', 'share')->get();
    }
}

