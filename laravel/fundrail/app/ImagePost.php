<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagePost extends Model
{
    protected $table = 'image_posts';
    protected $fillable = ['post_id', 'image_id'];
}
