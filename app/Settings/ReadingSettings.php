<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class ReadingSettings extends Settings
{

    public static function group(): string
    {
        return 'reading';
    }
}