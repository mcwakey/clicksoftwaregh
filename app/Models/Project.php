<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $guarded = [];
    protected $casts = [
        'features_en' => 'array',
        'features_fr' => 'array',
        'technologies' => 'array',
        'gallery' => 'array',
        'is_featured' => 'boolean',
        'completion_date' => 'date',
    ];
}
