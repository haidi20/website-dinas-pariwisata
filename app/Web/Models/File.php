<?php 
namespace App\Web\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
	protected $casts = [
        'attribute' => 'array'
    ];

    protected $appends = ['url'];

    public function scopeField($query, $field)
    {
        $query->where('field', $field);
    }

    public function scopeUnattachment($query)
    {
        $query->where('ref_id', 0);
        $query->where('ref_type', '');
    }

    public function getUrlAttribute()
    {
        return url($this->full_path);
    }

    public function getFullPathAttribute()
    {
        return $this->path . '/' . $this->name;
    }

    public function getMimeAttribute()
    {
        return array_get($this->attribute, 'mime');
    }

    public function getOriginalNameAttribute()
    {
        return array_get($this->attribute, 'name');
    }

    public function getClassAttribute()
    {
        if(str_is('image/*', $this->mime)){
            return 'image';
        }else{
            return 'file';
        }
    }

    public function fileable()
    {
        return $this->morphTo(null, 'ref_type', 'ref_id');
    }
}