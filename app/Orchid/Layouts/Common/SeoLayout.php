<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Common;

use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Orchid\Screen\Field;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;
use App\Support\Traits\HasFieldPrefix;

final class SeoLayout extends Rows
{
    use HasFieldPrefix;

    public function __construct(
        private readonly string $prefix,
    ) {}

    /**
     * @return list<Field>
     */
    protected function fields(): array
    {
        return $this->addPrefix([]); // TODO. Create a polymorphic `MetaData` model and `meta_data` table
        // return $this->addPrefix([
        //     Input::make('meta.title')
        //         ->type('text')
        //         ->max(255)
        //         ->horizontal()
        //         ->title(__('Meta Title'))
        //         ->placeholder(__('Title')),

        //     TextArea::make('meta.description')
        //         ->rows(5)
        //         ->max(500)
        //         ->horizontal()
        //         ->title(__('Meta Description'))
        //         ->placeholder(__('Description')),

        //     Input::make('meta.keywords')
        //         ->type('text')
        //         ->horizontal()
        //         ->title(__('Meta Keywords'))
        //         ->placeholder(__('comma, separated, keywords')),

        //     Input::make('meta.robots')
        //         ->type('text')
        //         ->horizontal()
        //         ->title(__('Meta Robots'))
        //         ->placeholder(__('index,follow')),

        //     Input::make('meta.canonical')
        //         ->type('url')
        //         ->horizontal()
        //         ->title(__('Canonical URL'))
        //         ->placeholder(__('https://example.com/page')),

        //     Input::make('meta.image')
        //         ->type('url')
        //         ->horizontal()
        //         ->title(__('Social Image URL'))
        //         ->placeholder(__('https://example.com/og-image.jpg')),
        // ]);
    }
}
