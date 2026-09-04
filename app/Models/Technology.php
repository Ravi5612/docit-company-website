<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
   protected $fillable = [

        'name',
        'slug',
        'image',
        'image_2',
        'description',
        'overview',
        'status'
    ];
}
