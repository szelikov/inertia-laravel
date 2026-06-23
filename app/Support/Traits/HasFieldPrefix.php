<?php

namespace App\Support\Traits;

use Orchid\Screen\Field;
use Illuminate\Support\Str;

trait HasFieldPrefix
{
    /**
     * Add the prefix to each field name.
     *
     * @param Field[] $fields
     *
     * @return Field[]
     */
    protected function addPrefix(array $fields): array
    {
        return collect($fields)
            ->each(fn(Field $field) => $field->set('name', Str::finish($this->prefix, '.') . $field->get('name')))
            ->all();
    }
}
