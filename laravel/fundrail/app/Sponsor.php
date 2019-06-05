<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsor extends Model
{
    protected $table = 'project_sponsors';
    protected $hidden = [
        'packageId',
    ];

    public function user() {
        return $this->hasOne(User::class);
    }
}
