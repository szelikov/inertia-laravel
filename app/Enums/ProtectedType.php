<?php

namespace App\Enums;

use App\Models\Page;

enum ProtectedType: string
{
    case Page = 'page';
    // case Article = 'article';

    public function modelClass(): string
    {
        return match ($this) {
            self::Page => Page::class,
            // self::Article => Article::class,
        };
    }
}
