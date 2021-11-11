<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckInactivo
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        //Logica para mirar si el usuario está inactivo
        if(auth()->check() && (auth()->user()->Estado == 2)){
            //inactivar inicio de sesión
           Auth::logout();
           //invalidar la sesión
           $request->session()->invalidate();
            //volver a generar el token
            $request->session()->regenerateToken();

            // retornar el login

            return redirect()->route('login')->with('error' ,'Usted está actualmente inactivado');
        }
        return $next($request);
    }
}
