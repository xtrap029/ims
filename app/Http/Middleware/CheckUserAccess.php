<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;

class CheckUserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $permission) {
        $user = Auth::user();

        // Ensure user is logged in and has the required permission
        if (!$user || count(App::make('userAccess')($permission, $user->role)) === 0) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        return $next($request); // Continue to the next request handler
    }
}
