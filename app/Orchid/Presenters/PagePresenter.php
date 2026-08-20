<?php

declare(strict_types=1);

namespace App\Orchid\Presenters;

final class PagePresenter extends BaseContentPresenter
{
    public function contentUrl(): string
    {
        $settings = 'default';//Setting::get('pages.url_mode', 'default');

        return match ($settings) {
            'default' => route('page', $this->model->slug),
            'info' => "/info/{$this->model->slug}",
            'custom' => $this->model->meta['custom_url'] ?? route('page', $this->model->slug),
        };
    }
}
