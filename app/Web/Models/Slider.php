<?php 
namespace App\Web\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

    protected $appends = ['preview'];

    public function image()
    {
        return $this->morphOne('App\Web\Models\File', 'ref');
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('id', 'DESC');
    }
    
    public function scopePublished($query)
    {
        return $query->whereStatus(1);
    }

    public function getStatusLabelAttribute()
    {
        $template = '<span class="label label-%s">%s</span>';

        switch($this->status){
            default:
                $label = 'info';
                $status = 'Published';
                break;
            case 0:
                $label = 'warning';
                $status = 'Drafted';
                break;
        }

        return sprintf($template, $label, $status);
    }

    public function getUrlAttribute()
    {
        if( is_object($this->image) ){
            return url($this->image->path, $this->image->name);
        }else{
            return 'http://placehold.it/848x282';
        }
    }

    public function preview($width=null, $height=null, $link=false)
    {
        if( is_object($this->image) ){
            if($width || $height){
                $url = image_fit($this->image->id, (int)$width, $height);
                $style = 'style="min-height: ' . $height .'px"';
            }else{
                $url = asset('storages/image/'.$this->image->name);
                $style = '';
            }
        }else{
            $url = 'http://placehold.it/' . $width . 'x' . $height;
            $style = '';
        }

        if($link) return $url;

        return '<img src="'.$url.'" class="img-responsive" alt="">';
    }

    public function getThumbnailAttribute()
    {
        return $this->preview(800, 600);
    }

    public function getLargePreviewAttribute()
    {
    	return $this->preview(1800, 1400);
    }

    public function getPreviewAttribute()
    {
    	return $this->preview(800, 400);
    }

    public function getPreviewFitAttribute()
    {
    	return $this->preview(300, 200, true);
    }

    public function getPreviewUrlAttribute()
    {
    	return $this->preview(0, 0, true);
    }

}