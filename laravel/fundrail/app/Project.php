<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Project extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'intro', 'content',
    ];

    public function packages() {
        return $this->hasMany('App\Package');

    }   

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
