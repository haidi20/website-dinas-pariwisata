<?php 
namespace App\Web\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;

use Image;

class Gallery extends Model
{
    protected $fillable = ['caption', 'type'];
    protected $appends = ['url', 'preview_original', 'preview', 'small_preview', 'thumbnail', 'gallery_tags', 'url_edit', 'url_delete'];

    public function scopeSorted($query, $by='id', $sort='ASC')
    {
        return $query->orderBy($by, $sort);
    }

    public function scopeSearch($query, $by, $key)
    {
        return $query->where($by, 'LIKE', '%'.$key.'%');
    } 

    public function scopeType($query, $type)
    {
        return $query->where('type', $type);
    }   

    public function scopeSlug($query, $slug)
    {
        return $query->where('slug', $slug);
    }   
    
    public function scopeLatest($query)
    {
        return $query->orderBy('id', 'DESC');
    }

    public function scopeNotThisGallery($query, $id)
    {
        if(!is_null($id)){
            $id = (array) $id;
            return $query->whereNotIn('id', $id);
        }
    }

    public function scopeRandom($query)
    {
        return $query->orderByRaw('RAND()');
    }

    public function image()
    {
        return $this->morphOne('App\Web\Models\File', 'ref');
    }

    public function author()
    {
        return $this->belongsTo('App\Web\Models\User');
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
            if($width || $height){
                $url = 'http://placehold.it/' . $width . 'x' . $height;
            }else{
                $url = 'http://placehold.it/250x180';
            }
            $style = '';
        }

        if($link) return $url;

        return '<img src="'.$url.'" class="img-responsive" data-url-edit="'.$this->url_edit.'" data-url-delete="'.$this->url_delete.'" data-category="'.$this->type.'">';
    }

    public function getFormatTagsAttribute()
    {
        $tags = [];
        foreach(explode(',', $this->tags) as $subitem){
            if($subitem){
                $tags[] = $subitem;
            }
        }

        return $tags;
    }

    public function getGalleryTagsAttribute()
    {
        //return implode(' ', $tags);
        return json_encode($this->format_tags);
    }

    public function getDisplayGalleryTagsAttribute()
    {
        if(count($this->format_tags)){
            return fa('tags').' '.implode(', ', $this->format_tags);
        }
    }

    public function getClassAttribute()
    {
        return str_replace(',', ' ', $this->tags);
    }

    public function getUrlAttribute()
    {
        if( is_object($this->image) ){
            return url($this->image->path, $this->image->name);
        }else{
            if($this->type == 'video'){
                if($this->link){
                    return url($this->type, [$this->slug]);
                }
            }else{
                return 'http://placehold.it/350x350';
            }
        }
    }

    public function getYoutubePreviewAttribute()
    {
        parse_str( parse_url( $this->link, PHP_URL_QUERY ), $my_array_of_vars );
        $vid = $my_array_of_vars['v'];
        $embed_url = str_replace('watch?v=', 'embed/', $this->link);

        if(empty($vid)) {
            return false;
        } else {
            return '<iframe width="100%" height="500" src="'.$embed_url.'" allowfullscreen></iframe>';
        }
    }

    public function getPreviewUrlAttribute()
    {
        return $this->preview(0, 0, true);
    }

    public function getPreviewOriginalAttribute()
    {
        return $this->preview();
    }

    public function getLargePreviewAttribute()
    {
        return $this->preview(800, 600);
    }
    
    public function getPreviewAttribute()
    {
        return $this->preview(400, 300);
    }

    public function getSmallPreviewAttribute()
    {
        return $this->preview(310, 200);
    }

    public function getPreviewSideBarAttribute()
    {
        return $this->preview(300, 250);
    }

    public function getPreviewTagAttribute()
    {
        return $this->preview(150, 120);
    }

    public function getYoutubePictureAttribute()
    {
        return $this->preview(0, 0, false, true);
    }

    public function getThumbnailAttribute()
    {
        return $this->preview(200, 200, true);
    }

    public function getUrlEditAttribute()
    {
        return url('sitemanager', ['gallery', 'edit', $this->type, $this->id]);
    }

    public function getUrlDeleteAttribute()
    {
        return url('sitemanager', ['gallery', 'delete', $this->type, $this->id]);
    }

    public function getFormatDateAttribute()
    {
        return format_date($this->created_at, 1, ' ');
    }

    public function getFormatTimeAttribute()
    {
        return format_time($this->created_at, true);
    }

    public function getViewedAttribute()
    {
        $icon = '&nbsp; '.fa('eye');
        $text = 'kali dilihat';
        return sprintf('%s %s %s', $this->read, $text, $icon);
    }
}