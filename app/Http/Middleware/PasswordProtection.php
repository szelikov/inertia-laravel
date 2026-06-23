<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Contracts\PasswordProtectable;

final class PasswordProtection
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $params = $request->route()->parameters();

        foreach ($params as $param) {
            if ($param instanceof PasswordProtectable) {
                $password = $param->getPasswordForProtection();
                $url = $param->presenter()->protectedUrl();

                if (empty($password)) {
                    continue;
                }

                if ($password) {
                    $key = "password_access.{$param->getIdForPassword()}";

                    if (!$request->session()->get($key)) {
                        if ($request->header('X-Inertia')) {
                            return Inertia::location($url);
                        }

                        return redirect()->to($url);
                    }
                }
            }
        }

        return $next($request);
    }
}
