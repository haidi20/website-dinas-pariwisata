<?php 
namespace App\Web\Models;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
	public $timestamps = false;
	protected $table = 'social_media';
	
	public function scopeSorted($query, $by='id', $sort='ASC')
	{
		return $query->orderBy($by, $sort);
	}

	public function scopeSearch($query, $by, $key)
    {
        return $query->where($by, 'LIKE', '%'.$key.'%');
    }	
}