<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\RoleUser;
use App\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        //dd(array_key_exists('file', $data));
        if (array_key_exists('file', $data)) {
            $file = $data['file'];

            // Get image name
            $fileName = $file->getClientOriginalName();

            // Make the image name based on current timestamp and image name 
            $uniqueFileName = time().'_'.$fileName;

            // Enregistrer les données dans la base de données
            $user = User::create([
                'name'          => $data['name'],
                'email'         => $data['email'],
                'password'      => Hash::make($data['password']),
                'photo'         => $uniqueFileName
            ]);

            if($user) { // Si l'utilisateur ont été correctement enregistrées dans la base de données

                 // Créez un chemin de fichier où l'image sera stockée
                $destinationPath = public_path().'/images/users/'.$user->id.'/';
                $file->move($destinationPath, $uniqueFileName);

                // Assign roles to user
                 $role = Role::where('name', 'user')->first(); // Sélectionnez le rôle de l'utilisateur
                $user_id    = $user->id;

                //Obtenez l'ID d'un rôle utilisateur. Par défaut, un utilisateur enregistré a un rôle d'utilisateur
                $role_id    = $role['id'];
                
                //stocker l'ID utilisateur et l'ID de rôle dans la table role_users
                RoleUser::create([
                    'user_id' => $user_id,
                    'role_id' =>  $role_id,
                ]);
            }
        } else {
             $user = User::create([
                'name'          => $data['name'],
                'email'         => $data['email'],
                'password'      => Hash::make($data['password']),
                'photo'         => "avatar1.png"
            ]);

            if ($user) {
                $role = Role::where('name', 'user')->first(); // Sélectionnez le rôle de l'utilisateur
                $user_id    = $user->id;

                //Obtenez l'ID d'un rôle utilisateur. Par défaut, un utilisateur enregistré a un rôle d'utilisateur
                $role_id    = $role['id'];
                
                //stocker l'ID utilisateur et l'ID de rôle dans la table role_users
                RoleUser::create([
                    'user_id' => $user_id,
                    'role_id' =>  $role_id,
                ]);
            }

        }

        return $user;
    }
}
