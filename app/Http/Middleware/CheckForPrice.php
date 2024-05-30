<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session as FacadesSession;
use Symfony\Component\HttpFoundation\Response;

class CheckForPrice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->url('hotel/pay')
         OR $request->url('hotel/success')) {
            if(FacadesSession::get('price') == 0) {
                return abort('403');
            } 
        }
        return $next($request);
    }
}
