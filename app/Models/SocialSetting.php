<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialSetting extends Model
{

    use HasFactory;
    protected $fillable = [

        'facebook_url',
        'instagram_url',
        'twitter_url',
        'linkedin_url',
        'is_active'
    ];
}



