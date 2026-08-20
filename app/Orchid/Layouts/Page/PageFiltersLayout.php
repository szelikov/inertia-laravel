<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Page;

use Orchid\Screen\Layouts\Selection;

class PageFiltersLayout extends Selection
{
    /**
     * @return string[]|Filter[]
     */
    protected function filters(): array
    {
        return [];
    }
}
