<?php 
namespace App\Web\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
	protected $fillable = ['key', 'value'];
    public $timestamps = false;

    public function scopeKey($query, $key)
    {
    	return $query->where('key', $key);
    }
}