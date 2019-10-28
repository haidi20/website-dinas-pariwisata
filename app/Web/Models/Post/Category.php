<?php
namespace App\Web\Models\Post;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
	protected $table = 'post_categories';
	protected $appends = ['action', 'total_post'];
	public $timestamps = false;

	public function scopeSlug($query, $name)
    {
        $query->whereSlug($name);
    }

    public function scopeGroup($query)
    {
        $query->groupBy('category_id');
    }

    public function posts()
    {
        return $this->hasMany('App\Web\Models\Post\Post');
    }

	public function getActionAttribute()
    {
        $id = $this->id;
        $caption = $this->name;
        $edit = '<a class="btn btn-success btn-xs" href="javascript:;" onclick="editCategory(this);" data-id="'.$id.'" data-caption="'.$caption.'"><i class="fa fa-pencil"></i> Edit</a>';
        $delete = '<a class="btn btn-danger btn-xs" onclick="deleteCategory(this);" href="javascript:;" data-id="'.$id.'" data-caption="'.$caption.'"><i class="fa fa-trash-o"></i> Delete</a>';

        return sprintf('%s %s', $edit, $delete);
    }

    public function getTotalPostAttribute()
    {
        if($this->posts()->count() > 0){
            return '('.$this->posts()->count().')';
        }
    }
}
