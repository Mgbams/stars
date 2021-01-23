<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Repositories\UserRepository;

class LoginController extends Controller
{
    private $userRepository;

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated($request, $user) {
        $userRole =  $this->userRepository->getAuthenticatedUserRole($user->id);
       
        if($userRole->roleName === 'admin') {
            //Si le rôle est == admin, redirigez l'utilisateur vers le tableau de bord
            return redirect('/dashboard'); 
        } else {
            //Sinon redirigez l'utilisateur vers la Page d'accueil
             return redirect('/');
        }
    }
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
         //Initialiser l'attribut
        $this->userRepository   =  $userRepository; 

        $this->middleware('guest')->except('logout');
    }
}
