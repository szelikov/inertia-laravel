<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class WritingSettings extends Settings
{

    public static function group(): string
    {
        return 'writing';
    }
}