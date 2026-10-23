<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ?string $role = null): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu untuk mengakses panel admin.');
        }

        $user = Auth::user();

        if ($role === 'superadmin' && $user->role !== 'admin') {
            abort(403, 'Akses terbatas hanya untuk Super Admin.');
        }

        if (!$user->isEditor()) {
            abort(403, 'Anda tidak memiliki hak akses ke panel admin.');
        }

        return $next($request);
    }
}
