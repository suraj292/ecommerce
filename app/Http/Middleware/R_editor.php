<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class R_editor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (session('admin') != 'admin'){
            return response()->view('partial.admin.401', [], '401');
        }
        return $next($request);
    }
}
