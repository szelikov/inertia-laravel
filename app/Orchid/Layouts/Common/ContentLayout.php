<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Common;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\Quill;
use Orchid\Screen\Layouts\Rows;
use App\Support\Traits\HasFieldPrefix;

class ContentLayout extends Rows
{
    use HasFieldPrefix;

    public function __construct(
        private readonly string $prefix,
    ) {}

    /**
     * Get the fields elements to be displayed.
     *
     * @return Field[]
     */
    protected function fields(): iterable
    {
        return $this->addPrefix([
            Quill::make('content'),
        ]);
    }

}
