<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Enums\ProtectedType;

interface PasswordProtectable
{
    public function getPasswordType(): ProtectedType;

    public function getPasswordSlug(): string;

    public function presenter(): ContentPresentable;
}
