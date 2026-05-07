<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = [];
    protected $casts = [
        'benefits_en' => 'array',
        'benefits_fr' => 'array',
        'is_featured' => 'boolean',
    ];
}
