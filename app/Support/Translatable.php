<?php

namespace App\Support;

class Translatable
{
    public static function get($model, string $field): string
    {
        if (! $model) return '';
        $locale = app()->getLocale() ?: 'en';
        $value = $model->{$field . '_' . $locale} ?? null;
        if (! $value) {
            $value = $model->{$field . '_en'} ?? '';
        }
        return is_array($value) ? '' : (string) ($value ?? '');
    }

    public static function array($model, string $field): array
    {
        if (! $model) return [];
        $locale = app()->getLocale() ?: 'en';
        $value = $model->{$field . '_' . $locale} ?? null;
        if (empty($value)) {
            $value = $model->{$field . '_en'} ?? null;
        }
        if (is_string($value)) {
            $decoded = json_decode($value, true);
            if (is_array($decoded)) return $decoded;
            return array_values(array_filter(array_map('trim', preg_split('/\r?\n/', $value))));
        }
        return is_array($value) ? $value : [];
    }
}
