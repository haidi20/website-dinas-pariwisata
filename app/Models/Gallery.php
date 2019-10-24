<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    //
    protected $fillable = ['name','type','link'];

    public function getDateAttribute(){
        return $this->created_at->format('d M Y');
    }

    public function getThumbnailAttribute(){
        parse_str( parse_url( $this->link, PHP_URL_QUERY ), $code );
        return "https://img.youtube.com/vi/".$code['v']."/0.jpg";
    }
}
