<?php

namespace App\Models;

use App\Contracts\PasswordProtectable;
use App\Contracts\ContentPresentable;
use App\Orchid\Presenters\PagePresenter;
use App\Enums\ProtectedType;
use App\Support\Traits\PasswordProtection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Filters\Types\Like;
use Orchid\Filters\Types\Where;
use Orchid\Filters\Types\WhereDate;
use Orchid\Filters\Types\WhereDateStartEnd;
use Orchid\Screen\AsSource;

#[Fillable(['title', 'slug', 'content', 'password', 'is_visible', 'published_at', 'meta'])]
#[Hidden(['password'])]
class Page extends Model implements PasswordProtectable
{
    use AsSource, Filterable, HasFactory, PasswordProtection;
    // use SoftDeletes;

    protected $table = 'pages';

    protected $fillable = [
        'title', 'slug', 'content', 'password', 'is_visible', 'published_at', 'meta', 'updated_at',
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'meta' => 'array',
    ];
    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
           'id'         => Where::class,
           'title'      => Like::class,
           'slug'       => Like::class,
           'published_at' => WhereDate::class,
           'updated_at' => WhereDateStartEnd::class,
           'created_at' => WhereDateStartEnd::class,
    ];

    public function getPasswordType(): ProtectedType
    {
        return ProtectedType::Page;
    }

    public function getPasswordSlug(): string
    {
        return $this->slug;
    }

    public function presenter(): PagePresenter
    {
        return new PagePresenter($this);
    }
}
