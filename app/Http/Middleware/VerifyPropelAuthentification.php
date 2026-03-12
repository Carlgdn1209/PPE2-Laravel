<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifyPropelAuthentification
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $utilisateur = $request->session()->get('utilisateur');
        
if (!(is_object($utilisateur) && get_class($utilisateur) == 'App\Http\Model\Utilisateur')) {
            return redirect()->route('r-accueil');
        }
        return $next($request);
    }
    
    
}
