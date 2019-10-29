<?php

namespace App\Repositories;

use App\Web\Models\Media;

class MediaRepository {
    public function allMedsos(){
        return Media::where('type', 'medsos')->get();
    }
}