<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class RouteRestrictions
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return $next($request);
        }

        /** @var User $user */
        $user = Auth::user();

        // Prevent banned users from accessing the platform
        if ($user->status === 'banned') {
            Auth::logout();
            abort(403, 'Your account has been banned from the platform.');
        }

        // Prevent suspended users from accessing the platform
        if ($user->status === 'suspended') {
            Auth::logout();
            abort(403, 'Your account has been suspended. Please contact support.');
        }

        // Prevent admin/seller/moderator from accessing client home page
        if ($request->route()->named('home') && $user->hasRole(['admin', 'seller', 'moderator'])) {
            abort(403, 'Admin users cannot access client home page.');
        }

        // Only clients can access cart operations
        if (str_starts_with($request->route()->getName(), 'cart.') && !$user->hasRole('client')) {
            abort(403, 'Access denied. Client role required for cart operations.');
        }

        return $next($request);
    }
}
