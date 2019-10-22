<?php

namespace App\Repositories;

class FileManagerRepository {

    public function insertImage(){
        if(request()->hasFile('image')){
            $files = request()->file('image');
            // @unlink(public_path('storages/' . request('image')->getClientOriginalName));
            $extension      = $files->getClientOriginalExtension();
            $fileName       = str_random(8) . '.' . $extension;
            $files->move("images/pemerintah", $fileName);

            return $fileName;
        }else{
            return 'Empty Image';
        }
    }
    
}