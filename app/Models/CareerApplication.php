<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CareerApplication extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'specialization',
        'designation',
        'department',
        'experience',
        'resume',
        'message',
        'ip_address',
    ];
}
