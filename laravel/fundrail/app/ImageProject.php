<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImageProject extends Model
{
    protected $table = 'image_projects';
    protected $fillable = ['project_id', 'image_id'];
}
