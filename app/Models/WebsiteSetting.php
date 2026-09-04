<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebsiteSetting extends Model
{

    use HasFactory;

    protected $fillable = [

        'brand_name',
        'description',
        'location',
        'address_noida',
        'address_jaipur',
        'phone_1',
        'phone_2',
        'email',
        'logo',
        'logo_white',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
