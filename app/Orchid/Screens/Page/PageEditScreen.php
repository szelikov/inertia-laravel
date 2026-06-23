<?php

declare(strict_types=1);

namespace App\Orchid\Screens\Page;

use App\Models\Page;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;
use App\Orchid\Layouts\Page\PageEditLayout;
use App\Orchid\Layouts\Common\SeoLayout;
use App\Orchid\Layouts\Common\ContentLayout;
use Orchid\Support\Color;
use Orchid\Support\Facades\Toast;
use Illuminate\Support\Str;

class PageEditScreen extends Screen
{
    public $page;
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(Page $page): iterable
    {
        return [
            'page' => $page,
        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->page->exists ? 'Edit: ' . $this->page->title : 'Create Page';
    }

    /**
     * Display header description.
     */
    public function description(): ?string
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
            Button::make(__('Remove'))
                ->icon('bs.trash3')
                ->confirm(__('Once the page is deleted, all of its resources and data will be permanently deleted.'))
                ->method('remove')
                ->canSee($this->page->exists),

            Button::make(__('Save'))
                ->icon('bs.check-circle')
                ->method('save'),
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
            Layout::block(PageEditLayout::class)
                ->title(__('Basic Information'))
                ->vertical()
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->canSee($this->page->exists)
                        ->method('save')
                ),
            Layout::block(new ContentLayout('page'))
                ->title(__('Content'))
                ->vertical()
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->canSee($this->page->exists)
                        ->method('save')
                ),
            Layout::block(new SeoLayout('page'))
                ->title(__('SEO Metadata'))
                ->vertical()
                ->commands(
                    Button::make(__('Save'))
                        ->type(Color::BASIC)
                        ->icon('bs.check-circle')
                        ->canSee($this->page->exists)
                        ->method('save')
                ),
        ];
    }

    public function save(Page $page)
    {
        $data = request()->get('page');
        // TODO. Create a polymorphic `MetaData` model and `meta_data` table
        // $page->fill(request()->get('seo'))->save();

        if (empty($data['slug']) && !empty($data['title'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $page->fill($data)->save();

        Toast::info('Page saved');

        return redirect()->route('platform.content.pages');
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
