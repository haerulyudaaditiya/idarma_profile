<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if (!Auth::check()) {
            return redirect('/login');
        }

        if (!in_array($user->role, $roles)) {
            return match ($user->role) {
                'admin' => redirect()->route('dashboard'),
                'user' => redirect()->route('beranda'),
                default => redirect('/'),
            };
        }

        return $next($request);
    }
}
?>
