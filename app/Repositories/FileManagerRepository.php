<?php

namespace App\Repositories;

class FileManagerRepository {

    public function actionImage($nameOldImage = null, $method = null){
        if($method = "delete"){
            if(file_exists(public_path('images/' . $nameOldImage))){
                @unlink(public_path('images/' . $nameOldImage));
            }
        }

        if(request()->hasFile('image')){
            @unlink(public_path('images/' . $nameOldImage));
            $extension      = request()->file('image')->getClientOriginalExtension();
            $fileName       = str_random(8) . '.' . $extension;
            request()->file('image')->move("images/", $fileName);
            return $fileName;    
        }
    }
}