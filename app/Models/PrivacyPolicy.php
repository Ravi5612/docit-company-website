<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PrivacyPolicy extends Model
{
    use HasFactory;

    protected $fillable = [

        'main_title',
        'sub_title',
        'description_1',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];
}
