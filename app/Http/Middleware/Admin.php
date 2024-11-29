<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user() || !auth()->user()->isAdmin()) {
            \Log::info('User  is not admin, redirecting to dashboard.');
            return redirect()->route('dashboard');
        }
    
        return $next($request);
    }
    

    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('admin.index'); 
    }
}
