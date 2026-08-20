<?php

declare(strict_types=1);

namespace App\Orchid\Layouts\Page;

use App\Models\Page;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Components\Cells\Boolean;
use Orchid\Screen\Components\Cells\DateTimeSplit;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Radio;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Layouts\Table;
use Orchid\Screen\TD;

class PageListLayout extends Table
{
    /**
     * @var string
     */
    protected $target = 'pages';

    /**
     * @return TD[]
     */
    protected function columns(): array
    {
        return [
            TD::make('title', __('Title'))
                ->sort()
                ->filter(Input::make())
                ->render(fn (Page $page) => Link::make($page->title)
                    ->route('platform.content.pages.edit', $page->id)),

            TD::make('slug', 'Slug'),

            TD::make('is_visible', 'Visibility')
                ->sort()
                ->filter(Radio::make()->options([
                    null   => 'All',
                    1 => 'Visible',
                    0 => 'Not Visible',
                ]))
                ->usingComponent(Boolean::class, true: 'Visible', false: 'Hidden'),

            TD::make('published_at', 'Published')
                ->cantHide()
                ->usingComponent(DateTimeSplit::class)
                ->filter(DateTimer::make())
                ->align(TD::ALIGN_RIGHT)
                ->sort(),

            TD::make('created_at', __('Created'))
                ->usingComponent(DateTimeSplit::class)
                ->align(TD::ALIGN_RIGHT)
                ->defaultHidden()
                ->sort(),

            TD::make('updated_at', __('Last edit'))
                ->usingComponent(DateTimeSplit::class)
                ->align(TD::ALIGN_RIGHT)
                ->sort(),

            TD::make(__('Actions'))
                ->align(TD::ALIGN_CENTER)
                ->width('100px')
                ->render(fn (Page $page) => DropDown::make()
                    ->icon('bs.three-dots-vertical')
                    ->list([
                        Link::make(__('Edit'))
                            ->route('platform.content.pages.edit', $page->id)
                            ->icon('bs.pencil'),

                        Button::make(__('Delete'))
                            ->icon('bs.trash3')
                            ->confirm(__('Once the page is deleted, all of its resources and data will be permanently deleted.'))
                            ->method($page->id . '/remove'),
                    ])),
        ];
    }
}
