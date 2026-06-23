<?php

declare(strict_types=1);

namespace App\Settings;

use Spatie\LaravelSettings\Settings;

final class GeneralSettings extends Settings
{
    public string $site_name;
    public string $timezone;
    public string $admin_email;
    public string $logo;

    public static function group(): string
    {
        return 'general';
    }
}