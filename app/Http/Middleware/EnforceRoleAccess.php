<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnforceRoleAccess
{
    public function handle(Request $request, Closure $next)
    {
        $path = trim($request->path(), '/');

        // Exclude login/logout routes and assets
        $excludedPrefixes = [
            'login', 'logout', 'register', 'password', 'api', '_debugbar', 'storage', 'build', 'css', 'js', 'favicon.ico', 'robots.txt'
        ];

        foreach ($excludedPrefixes as $prefix) {
            if ($path === $prefix || str_starts_with($path, $prefix . '/')) {
                return $next($request);
            }
        }

        // If user is not authenticated and trying to access /admin, redirect to shared login
        if (!Auth::check() && (str_starts_with($path, 'admin') || $request->is('admin'))) {
            return redirect()->guest(url('/login'));
        }

        // If user is authenticated
        if (Auth::check()) {
            $user = Auth::user();

            // If user is admin and trying to access non-admin pages, redirect to /admin
            if ($user->is_admin && !str_starts_with($path, 'admin')) {
                return redirect('/admin');
            }

            // If user is NOT admin and trying to access admin pages, abort or redirect
            if (!$user->is_admin && str_starts_with($path, 'admin')) {
                return redirect('/');
            }
        }

        return $next($request);
    }
}
