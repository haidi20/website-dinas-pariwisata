<?php 
namespace App\Web\Models;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
	public function scopeSorted($query, $by='id', $sort='ASC')
	{
		return $query->orderBy($by, $sort);
	}

	public function scopeSearch($query, $by, $key)
    {
        return $query->where($by, 'LIKE', '%'.$key.'%');
    }

    public function scopePublished($query)
    {
        return $query->where('status', 1);
    }

	public function scopeType($query, $type)
    {
        return $query->where('type', $type);
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

    public function getAvatarAttribute()
    {
        return asset('avenger/assets/demo/avatar/administrator.png');
    }
}