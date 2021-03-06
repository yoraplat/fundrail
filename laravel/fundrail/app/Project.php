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

    public function sponsors() {
        return $this->hasManyThrough('App\Sponsor', 'App\Package', 'project_id', 'package_id', 'id', 'id');
    }

    public function images() {
        return $this->hasMany('App\ImageProject', 'image_id');
    }


    public function packages() {
        return $this->hasMany('App\Package', 'project_id', 'id');
    }


    // public function images() {
    //     return $this->hasManyThrough('App\Image', 'App\ImageProject', 'project_id', 'id', 'id', 'image_id');
    // }

    public function project_images() 
    {
        return $this->hasManyThrough(Image::class, ImageProject::class, "project_id", "id", "id", "id");
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
}
