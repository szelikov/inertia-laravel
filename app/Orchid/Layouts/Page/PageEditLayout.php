<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Page;

use Orchid\Screen\Field;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Switcher;
use Orchid\Screen\Fields\TextArea;
use Orchid\Screen\Layouts\Rows;

final class PageEditLayout extends Rows
{
    /**
     * @return list<Field>
     */
    public function fields(): array
    {
        return [
            Input::make('page.title')
                ->slug('slug')
                ->title('Title')
                ->horizontal()
                ->required(),

            Input::make('page.slug')
                ->horizontal()
                ->title('Slug'),

            Input::make('page.password')
                ->horizontal()
                ->title('Password (optional)'),

            Switcher::make('page.is_visible')
                ->title('Visible')
                ->horizontal()
                ->sendTrueOrFalse(),

            DateTimer::make('page.published_at')
                ->horizontal()
                ->title('Publish date'),
        ];
    }
}
