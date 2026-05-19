<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Page;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::get('/{page:slug}', PageController::class)->name('page');

