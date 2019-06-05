<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'images';
    protected $fillable = ['path', 'title'];

    public function imageProject()
    {
        return $this->belongsTo('App\ImageProject');
    }
}
