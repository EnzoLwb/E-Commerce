<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Support\Facades\Redirect;
class EmailVerification
{
    public function handle($request, Closure $next)
    {
        if (! $request->user() || ! $request->user()->verified)
        {
            return $request->expectsJson()
                ? abort(403, 'Your email address is not verified.')
                : Redirect::route('verification.notice');
        }

        return $next($request);
    }
}
