<?php

namespace App\Http\Middleware;

use App\Perfis\Perfil;
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

        if (intval($perfil) != Perfil::PERFIS['admin']) {
            return redirect()->route('clientes.index');
        }

        return $next($request);
    }
}
