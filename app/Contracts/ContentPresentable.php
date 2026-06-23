<?php

declare(strict_types=1);

namespace App\Contracts;

interface ContentPresentable
{
    public function contentUrl(): string;

    public function protectedUrl(): string;

    public function isVisible(): bool;
}
