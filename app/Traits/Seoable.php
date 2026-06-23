<?php

declare(strict_types=1);

namespace App\Traits;

trait Seoable
{
    public function getMetaAttribute(?array $value): array
    {
        return $value ?? [];
    }

    public function getSeoTitleAttribute(): string
    {
        return $this->meta['title'] ?? $this->title;
    }

    public function getSeoDescriptionAttribute(): ?string
    {
        return $this->meta['description'] ?? null;
    }

    public function getSeoKeywordsAttribute(): ?string
    {
        return $this->meta['keywords'] ?? null;
    }

    public function getSeoRobotsAttribute(): ?string
    {
        return $this->meta['robots'] ?? null;
    }

    public function getSeoCanonicalAttribute(): ?string
    {
        return $this->meta['canonical'] ?? null;
    }

    public function getSeoImageAttribute(): ?string
    {
        return $this->meta['image'] ?? null;
    }
}
