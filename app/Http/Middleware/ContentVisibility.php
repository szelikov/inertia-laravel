<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Contracts\ContentPresentable;
use Illuminate\Database\Eloquent\Model;

final class ContentVisibility
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        foreach ($request->route()->parameters() as $param) {
            if (!($param instanceof Model) || !method_exists($param, 'presenter')) {
                continue;
            }

            $presenter = $param->presenter();

            if (!$presenter instanceof ContentPresentable) {
                continue;
            }

            if (!$presenter->isVisible()) {
                abort(404);
            }
        }

        return $next($request);
    }
}
