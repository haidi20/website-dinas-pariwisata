<?php

namespace App\Repositories;

use App\Models\Media;

class MediaRepository {
    public function all(){
        return Media::all();
    }
}