<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if($request->header('role') != $role) {
            return response()->json([
                'error' =>  'Invalid role!'
            ],
            401);
        }
        return $next($request);

        // if($role === 'admin') {
        //     // if user isAdmin do all
        //     return 'Permissão total!';
        // } else {
        //     // else is permitted role access
        // }
        // return $next($request);
    }
}
