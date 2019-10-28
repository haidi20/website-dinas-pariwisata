<?php

namespace App\Web\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function post()
    {
        return $this->hasMany('App\Web\Models\Post\Post', 'author_id');
    }

    public function gallery()
    {
        return $this->hasMany('App\Web\Models\Gallery', 'author_id');
    }
    
    public function getDisplayLevelAttribute()
    {
        return config('sitemanager.level.'.$this->level);
    }
}
