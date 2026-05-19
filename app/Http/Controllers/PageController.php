<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
use Inertia\Inertia;
use App\Http\Resources\PageResource;

final class PageController extends Controller
{
    public function __invoke(Page $page)
    {
        return Inertia::render('Page', [
            'page' => new PageResource($page),
        ]);
    }
}
