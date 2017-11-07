<?php

namespace App\Http\Middleware;

use Closure;

class Authentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
        if (!auth()->check()) return redirect()->route('admin.auth.login');
        return auth()->user()->can($request->route()->getName())
            ? $next($request)
            : ($request->ajax()
                ? failed('无权进行此操作！')
                : response()->view('admin.errors.unauthentication'));
    }
}
