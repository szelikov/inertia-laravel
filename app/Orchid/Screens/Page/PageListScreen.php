<?php

namespace App\Orchid\Screens\Page;

use App\Models\Page;
use App\Orchid\Layouts\Page\PageListLayout;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use App\Orchid\Layouts\Page\PageFiltersLayout;
// use App\Orchid\Layouts\User\UserListLayout;
use Orchid\Support\Facades\Toast;

class PageListScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'pages' => Page::filters()->defaultSort('id', 'desc')->paginate(),
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Pages';
    }

    public function permission(): ?iterable
    {
        return [
            'platform.content.pages',
        ];
    }
    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Add'))
                ->icon('bs.plus-circle')
                ->href(route('platform.content.pages.create')),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            // TODO: Add Filters Form 
            // PageFiltersLayout::class,
            PageListLayout::class,

            // TODO: Add Quick Edit Modal form
            // Layout::modal('editPageModal', PageEditLayout::class)
            //     ->deferred('loadPageOnOpenModal'),
        ];
    }

    /**
     * @throws \Exception
     *
     * @return RedirectResponse
     */
    public function remove(Page $page)
    {
        $page->delete();

        Toast::info(__('Page was removed'));

        return redirect()->route('platform.content.pages');
    }
}
