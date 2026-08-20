<?php

declare(strict_types=1);

namespace App\Orchid\Presenters;

use Orchid\Support\Presenter;
use App\Contracts\ContentPresentable;
use App\Contracts\PasswordProtectable;

abstract class BaseContentPresenter extends Presenter implements ContentPresentable
{
    public function __construct(
        protected PasswordProtectable $model
    ) {}

    public function protectedUrl(): string
    {
        return route('password.form', [
            'type' => $this->model->getPasswordType()->value,
            'slug' => $this->model->getPasswordSlug(),
        ]);
    }

    public function isVisible(): bool
    {
        return true;
    }
}
