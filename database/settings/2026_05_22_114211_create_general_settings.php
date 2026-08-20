<?php

declare(strict_types=1);

use Spatie\LaravelSettings\Migrations\SettingsMigration;

return new class extends SettingsMigration
{
    public function up(): void
    {
        $this->migrator->add('general.site_name', 'Laravel');
        $this->migrator->add('general.timezone', 'Europe/Madrid');
        $this->migrator->add('general.admin_email', 'admin@laravel.test');
        $this->migrator->add('general.logo', null);
    }
};
