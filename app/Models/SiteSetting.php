<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $guarded = [];

    public static function get(string $key, ?string $locale = null, $default = null)
    {
        $locale = $locale ?: (app()->getLocale() ?: 'en');
        $row = static::where('key', $key)->first();
        if (! $row) return $default;
        $val = $row->{'value_' . $locale} ?? null;
        return $val !== null && $val !== '' ? $val : ($row->value_en ?? $default);
    }

    public static function all_grouped(): array
    {
        return static::all()->groupBy('group')->toArray();
    }
}
