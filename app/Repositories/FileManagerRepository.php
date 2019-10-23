<?php

namespace App\Repositories;

class FileManagerRepository {

    public function insertImage(String $name){
        if(request()->hasFile('image')){
            $files = request()->file('image');
            // @unlink(public_path('storages/' . request('image')->getClientOriginalName));
            $extension      = $files->getClientOriginalExtension();
            $fileName       = $name . '.' . $extension;
            $files->move("images", $fileName);

            return $fileName;
        }else{
            return 'Empty Image';
        }
    }

    public function updateImage(String $newName, String $lastName){
        if(request()->hasFile('image')){
            if(file_exists(public_path('images/' . $lastName))){
                @unlink(public_path('images/' . $lastName));
                $files = request()->file('image');
                $extension      = $files->getClientOriginalExtension();
                $fileName       = $newName . '.' . $extension;
                $files->move("images", $fileName);
                return $fileName;
            }
        }else{
            if(file_exists(public_path('images/' . $lastName))){
                $newName    = $newName.'.'.@pathinfo(public_path('images/' . $lastName), PATHINFO_EXTENSION);
                @rename(public_path('images/' . $lastName), public_path('images/' . $newName));
                return $newName;
            }
        }
    }
    
    public function deleteImage(String $name){
        if(file_exists(public_path('images/' . $name))){
            @unlink(public_path('images/' . $name));
        }
    }
}