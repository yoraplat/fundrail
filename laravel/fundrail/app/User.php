<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
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

    const ADMIN_TYPE = 1;
    const USER_TYPE = 2;
    const GUEST_TYPE = 3;
    
    public function isAdmin()    {        
        return $this->role_type === self::ADMIN_TYPE;    
    }

    public function sponsoredProjects()
    {
        return $this->belongsToMany('App\Project', 'project_sponsors');
    }

    public function sponsored_user() {
        return $this->belongsTo(Sponsor::class, 'user_id');
    }
}
