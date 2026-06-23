<?php

declare(strict_types=1);

namespace App\Support\Traits;

use App\Enums\ProtectedType;
use App\Models\Page;

trait PasswordProtection
{
    public function getIdForPassword(): int
    {
        return $this->id;
    }

    public function getPasswordForProtection(): ?string
    {
        return $this->password;
    }

    public function getSlugForPassword(): string
    {
        return $this->slug;
    }

    public function getPasswordType(): ProtectedType
    {
        return match (static::class) {
            Page::class => ProtectedType::Page,
            // \App\Models\Article::class => ProtectedType::Article,
            default => throw new \Exception("Model not supported for password protection"),
        };
    }
}
