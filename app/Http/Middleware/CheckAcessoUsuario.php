<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Controller;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAcessoUsuario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $chaveAcesso = $request->route()->uri();
        if(!Controller::checkAcesso($chaveAcesso)){
            // die(!Controller::checkAcesso('4'));
            return redirect()->route('page404');
        }
        return $next($request);
    }
}
