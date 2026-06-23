<?php

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

class PermalinksSettings extends Settings
{

    public static function group(): string
    {
        return 'permalinks';
    }
}