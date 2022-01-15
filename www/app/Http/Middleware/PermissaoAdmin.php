<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Support\Facades\Auth;

class PermissaoAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $perfil = auth()->user()->perfil;

        if (intval($perfil) != 1) {
            return redirect()->route('clientes.index');
        }

        return $next($request);
    }
}
