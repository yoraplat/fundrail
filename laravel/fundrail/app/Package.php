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
        return $this->hasMany(Sponsor::class, 'package_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class);
    }
}
