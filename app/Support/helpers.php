<?php

if (! function_exists('translated')) {
    function translated($model, string $field): string
    {
        return \App\Support\Translatable::get($model, $field);
    }
}

if (! function_exists('translated_array')) {
    function translated_array($model, string $field): array
    {
        return \App\Support\Translatable::array($model, $field);
    }
}
