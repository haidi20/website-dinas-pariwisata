<?php 
namespace App\Web\Models\Post;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Lang;
// use Yangqi\Htmldom\Htmldom;
use Sunra\PhpSimple\HtmlDomParser;
use Session;

class Post extends Model
{
    protected $appends = [
        'url_slug', 'small_preview', 'preview', 'gotolink',
        'preview_popular_post', 'color_category', 'long_date', 
        'viewed', 'display_category_name', 'show_title', 'link_category',
        'show_title', 'preview_first_post', 'preview_three_post', 'show_limit_title',
        'preview_last_post'
    ];

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
        return $query->where('type', $type)->where('status', 1);
    }

	public function scopeSlug($query, $slug)
	{
		return $query->where('slug', $slug);
	}

    public function scopeCategory($query, $id)
    {
        return $query->where('category_id', $id);
    }

    public function scopeThis($query, $id)
    {
        return $query->where('id', $id);
    }

    public function scopeTags($query, $tag)
    {
        return $query->where('tags', 'LIKE', '%'.$tag.'%');
    }

    public function scopePopular($query)
    {
        return $query->orderBy('read', 'DESC');
    }

    public function scopeNew($query)
    {
        return $query->orderBy('created_at', 'DESC');
    }

    public function scopeNotThisPost($query, $id)
    {
        if(!is_null($id)){
            $id = (array) $id;
            return $query->whereNotIn('id', $id);
        }
    }

    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'DESC');
    }

    public function scopeRandom($query)
    {
        return $query->orderByRaw('RAND()');
    }

    public function menu()
    {
        return $this->belongsTo('App\Web\Models\Menu');
    }

    public function category()
    {
        return $this->belongsTo('App\Web\Models\Post\Category');
    }

    public function file()
    {
        return $this->morphOne('App\Web\Models\File', 'ref');
    }

    public function author()
    {
        return $this->belongsTo('App\Web\Models\User');
    }

    public function getShowTitleAttribute()
    {
        return ucwords($this->title);
    }

    public function getShowLimitTitleAttribute()
    {
        return ucwords(word_limit($this->title, 5));
    }

    public function getShowLimitTitleLargeAttribute()
    {
        return ucwords(word_limit($this->title, 8));
    }

    public function getDisplayAuthorAttribute()
    {
        if($this->author)
        {
            return $this->author->name;
        }
    }

    public function getDisplayLimitContentAttribute()
    {
        return str_limit($this->content, 40);
    }

    public function getDisplayLimitContentLargeAttribute()
    {
        return str_limitt($this->content, 200);
    }

    public function getDisplayMenuNameAttribute()
    {
        if($this->menu)
        {
            return $this->menu->name;
        }
    }

    public function getDisplayMenuCaptionAttribute()
    {
        if($this->menu)
        {
            return $this->menu->caption;
        }
    }

    public function getThumbnailAttribute()
    {
        if($this->imageInContent){
            return head( (array) $this->imageInContent);
        }else{
            return 'http://placehold.it/300x300';
        }
    }

    public function getImageInContentAttribute()
    {
        $html = HtmlDomParser::str_get_html($this->content);
        return array_pluck($html->find('img'), 'src');
    }

    public function preview($width=null, $height=null, $link=false, $typeImage=null)
    {
        if( is_object($this->file) ){
            if($width || $height){
                $url = image_fit($this->file->id, (int) $width, $height);
                $style = 'style="min-height: ' . $height .'px"';
            }else{
                $url = asset('storages/image/'.$this->file->name);
            }
        }else{
            if($this->imageInContent){
                $url = head( (array) $this->imageInContent);
            }else{
                if($width || $height){
                    $url = 'http://placehold.it/' . $width . 'x' . $height;
                }else{
                    $url = 'http://placehold.it/1000x800';
                }
            }
        }

        if($link) return $url;

        $loading = asset('images/loading.gif');

        $src = $typeImage ? $loading : $url;

        return '<img 
                    src="'.$src.'"
                    class="img-responsive lazy '.$typeImage.'" 
                    alt=""
                    data-src="'.$url.'"
                    href="'.$this->gotolink.'"
                >';
    }

    public function getPreviewUrlAttribute()
    {
        return $this->preview(0, 0, true);
    }

    public function getSmallPreviewAttribute()
    {
        return $this->preview(90, 60);
    }

    public function getMiddlePreviewAttribute()
    {
        return $this->preview(60, 40);
    }

    public function getLargePreviewAttribute()
    {
        return $this->preview(60, 40);
    }


    public function getPreviewAttribute()
    {
        return $this->preview(480, 480);
    }

    public function getPreviewOriginalAttribute()
    {
        return $this->preview();
    }

    public function getPreviewSingleSlideAttribute()
    {
        return $this->preview(1200, 760, false, true);
    }

    public function getPreviewSingleSpecialAttribute()
    {
        return $this->preview(1200, 940, false);
    }

    public function getPreviewSingleAttribute()
    {
        return $this->preview(1200, 760);
    }

    public function getPreviewSimilarAttribute()
    {
        return $this->preview(457, 286);
    }

    public function getPreviewSidebarAttribute()
    {
        return $this->preview(300, 250);
    }

    public function getPreviewHeaderAttribute()
    {
        return $this->preview(1200, 760, false, 'preview-header');
    }

    public function getPreviewHeaderSliderAttribute()
    {
        return $this->preview(1200, 760, false, 'preview-header-slider');
    }

    public function getPreviewPopularPostAttribute()
    {
        return $this->preview(1200, 760, false, 'preview-popular-post');
    }

    public function getPreviewFirstPostAttribute()
    {
        return $this->preview(1200, 760, false, 'preview-first-post');
    }

    public function getPreviewThreePostAttribute()
    {
        return $this->preview(1200, 760, false, 'preview-three-post');
    }

    public function getPreviewLastPostAttribute()
    {
        return $this->preview(1200, 760, false, 'preview-last-post');
    }

    public function getPreviewRightSidePostAttribute()
    {
        return $this->preview(1200, 760, false, 'preview-right-side-post');
    }

    public function getPreviewRightSidePostTwoAttribute()
    {
        return $this->preview(1200, 760, false, 'preview-right-side-post-two');
    }

    public function getPreviewRightSidePopularPostAttribute()
    {
        return $this->preview(1200, 760, false, 'preview-right-side-popular-post');
    }

    public function getPreviewFooterPostAttribute()
    {
        return $this->preview(1200, 760, false, 'preview-footer-post');
    }

    public function getDisplayCategoryNameAttribute()
    {
        if($this->category)
        {
            return $this->category->name;
        }
    }

    public function getIdCategoryAttribute()
    {
        if($this->category)
        {
            return $this->category->id;
        }
    }

    public function getCategoryBadgeAttribute()
    {
        if( ! $this->category ) return false;
        if( ! $this->category->color){
            $category = $this->category->slug;
            $keyColor = 'sm.category.badge.color.' . $category;
            $color = Session::get($keyColor, function() use ($keyColor){
                $generate = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                Session::put($keyColor, $generate);
                return $generate;
            });
        }else{
            $generate = sprintf($this->category->color);
            Session::put($this->category->color, $generate);
            $color = $generate;
        }

        $template = '<span class="label label-default" style="background-color:%s">%s :</span>';

        return sprintf($template, $color, $this->category->name);
    }

    public function getColorCategoryAttribute()
    {
        if($this->category)
        {
            return $this->category->color;
        }
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

    public function getUrlSlugAttribute()
    {
        $category = $this->category;
        $prefix = '';
        if($this->type == 'post'){
            $prefix = $category ? $category->slug : '?';
            $slug = url($prefix, [$this->slug]);
        }else{
            $slug = $this->slug;
        }

        return url($slug);
    }

    public function getLongDateAttribute()
    {
        return years_old($this->created_at);
    }

    public function getDetailDateTimeAttribute()
    {
        return $this->created_at->format('d M Y h:i');
    }

    public function getFormatDateAttribute()
    {
        return format_date($this->created_at, 1, ' ');
    }

    public function getFormatTimeAttribute()
    {
        return format_time($this->created_at, true);
    }

    public function getFormatDateCompleteAttribute()
    {
        return format_date($this->created_at, 1, ' ', false, true);
    }

    public function getViewedAttribute()
    {
        $icon = fa('eye');
        $text = 'kali dilihat';
        return sprintf('%s %s %s', $icon, $this->read, $text);
    }

    public function getCommentCountAttribute()
    {
        return graphApi('facebook', $this->url, 'comment_count', fa('comment')).' Comments';
    }

    public function getTotalCountAttribute()
    {
        return graphApi('facebook', $this->url, 'total_count', fa('heart'));
    }

    public function getGotolinkAttribute()
    {
        return url('post', [$this->display_category_name, $this->slug]);
    }

    public function getLinkCategoryAttribute()
    {
        return url('post', [$this->display_category_name]);
    }

}
