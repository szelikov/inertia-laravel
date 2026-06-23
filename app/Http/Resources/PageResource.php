<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

final class PageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            $this->mergeWhen(
                $request->user()?->hasAccess('platform.content.pages'),
                [
                    'id' => $this->id,
                    'isVisible' => $this->is_visible,
                    'isPasswordProtected' => (bool)$this->password,
                ]
            ),
            'title' => $this->title,
            'content' => $this->content,
            'publishedAt' => $this->published_at,
            'url' => route('page', $this->slug),
            // 'metaData' => [], // TODO: Create Meta
            'author' => null,
        ];
    }
}
