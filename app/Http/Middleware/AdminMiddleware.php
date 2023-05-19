<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, int $role): Response
    {
        if ($request->user()->role === $role) {
            return $next($request);
        }

        return back()->with('erreur', 'Seul les administrateur peuvent accéder à cette page');
    }

}
