<?php 
namespace App\Web\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
	protected $appends = ['status_label', 'action_link', 'url'];
	protected $fillable = ['name', 'link', 'icon', 'parent', 'position', 'order', 'status', 'lock'];
	public $timestamps = false;

    public function scopeSorted($query)
    {
        return $query->orderBy('order')->orderBy('name')->orderBy('id');
    }

    public function scopeSearch($query, $by, $key)
    {
        return $query->where($by, 'LIKE', '%'.$key.'%');
    }   

	public function scopeActive($query)
    {
        return $query->whereStatus(1);
    }

	public function scopeIsParent($query, $id=0)
    {
        return $query->whereParentId($id);
    }

    public function child()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function getDisplayNameAttribute()
    {
        return $this->name;
    }

    public function getDisplayParentAttribute()
    {
        if(method_exists($this, 'display_parent')){
            $parent[] = object_get($this, 'display_parent');
        }
        $parent[] = object_get($this->parent, 'name');

        return implode(' / ', array_filter($parent)) ?: '';
    }

    public function getDisplayParentOfAttribute()
    {
        return implode(' / ', array_filter([$this->display_parent, $this->name]));
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
                $status = 'Draft';
                break;
        }

        return sprintf($template, $label, $status);
    }

    public function getDisplayActiveLinkAttribute()
    {

        switch ($this->active_link) {
            default:
                $icon = fa('link');
                break;

            case 0:
                $icon = fa('unlink');
                break;
        }

        return $icon;
    }

    public function getUrlAttribute()
    {
        return url($this->link);
    }

    public function getActionLinkAttribute()
    {
        $id = $this->id;
        $url = $this->url;
        $link = $this->link;
        $action = '<a class="btn btn-primary btn-sm text-right" href="javascript:;" onclick="addMenu(this);" data-id="'.$id.'" data-url="'.$url.'" data-link="'.$link.'">'.fa('link').'</a>';

        return sprintf('%s', $action);
    }

}