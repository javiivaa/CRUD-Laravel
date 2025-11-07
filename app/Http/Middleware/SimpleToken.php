<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SimpleToken
{
    /**
     * Maneja la petición: si query param token!=demo redirige a /
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->query('token') !== 'demo') {
            return redirect('/')->with('error', 'Token middleware inválido');
        }

        return $next($request);
    }
}
