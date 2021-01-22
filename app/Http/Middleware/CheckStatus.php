<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Support\Facades\DB;
use App\User;

class CheckStatus
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
        //Vérifiez si l'utilisateur est connecté
        if(Auth::check()) {
            //Obtenez le rôle de l'utilisateur à l'aide du générateur de requêtes
              $userStatus = DB::table('role_users')
                    ->join('roles', 'role_users.role_id', '=', 'roles.id')
                    ->join('users', 'role_users.user_id', '=', 'users.id')
                    ->where('users.id', '=', Auth::user()->id)
                    ->select('roles.name')
                    ->get();
            
            if ($userStatus) {
                //Si le rôle est 'user', redirigez vers la page d'accueil
                if ($userStatus[0]->name === 'user') {
                    return redirect()->route('stars.main.page');
                }
            }
        } else {
             // Si l'utilisateur n'est pas connecté redirigez vers la page d'accueil
            return redirect()->route('stars.main.page');
        }
        //Si le rôle est 'admin', redirigez vers la dashboard
        return $next($request);
    }
}
