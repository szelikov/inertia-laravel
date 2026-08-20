<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Page;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PasswordController;

Route::get('/', function () {
    return Inertia::render('Home');
});

Route::middleware('content.visibility')->group(function () {
    Route::get('/{page:slug}', PageController::class)
        ->middleware('password.protect')
        ->name('page');

    Route::get('/protected/{type}/{slug}', [PasswordController::class, 'show'])
        ->middleware('password.protect')
        ->name('password.form');

    Route::post('/protected/{type}/{slug}', [PasswordController::class, 'check'])
        ->name('password.check');
});
