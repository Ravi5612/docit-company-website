<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'service';
    protected $fillable = [

        'title',
        'slug',
        'image',
        'image_2',
        'description',
        'overview',
        'status'
    ];
}
