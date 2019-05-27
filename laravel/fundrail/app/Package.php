<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'title', 'description', 'credit_amount', 'project_id',
    ];
    public function sponsors()
    {
        return $this->belongsToMany('App\User', 'project_sponsors', 'id', 'user_id');
    }
}
