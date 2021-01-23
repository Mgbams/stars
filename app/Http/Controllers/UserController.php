<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Repositories\RoleRepository;
use Illuminate\Support\Facades\Hash;
use File;

// Models
use App\User;
use App\Models\RoleUser;

class UserController extends Controller
{

    private $userRepository;
    private $roleRepository;

    public function __construct(UserRepository $userRepository, RoleRepository $roleRepository)
    {   
        //Initialiser l'attribut
        $this->userRepository   =  $userRepository; 
        $this->roleRepository   =  $roleRepository; 
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $users = $this->userRepository->paginateUsers(5); // 5 contents per page
        //return the view containing the lists of users

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $roles = $this->roleRepository->getAllRoles();

        //returns a view with form to create a user
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
         // Form validation
        $this->validate($request, [
            'name'                  => 'required',
            'email'                 => 'required|unique:users|email',
            'roles'                 => 'required',
            'image'                 => 'image|mimes:jpeg,png,jpg,gif',
            'password'              => 'min:8|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:8',
        ]);

        // Formatting the inputs
        $userName   =   ucwords(strtolower($request->name));
        $email      =   strtolower($request->email);

        // Instantiate an object of a model
        $user       = new User;
        $roleUser   = new RoleUser;

        // Check if a profile image has been uploaded
        if ($request->has('image')) {

            $file = $request->file('image');

            // Get image name
            $fileName = $file->getClientOriginalName();

            // Make the image name based on current timestamp and image name 
            $uniqueFileName = $name =  time().'_'.$fileName;

            // Enregistrer les données dans la base de données
           
            $user->name =  $userName;
            $user->email = $email;
            $user->password = Hash::make($request->password);
            $user->photo = $uniqueFileName;

            $user->save();

            if($user) { // Si les données ont été correctement enregistrées dans la table users

                 // Créez un chemin de fichier où l'image sera stockée
                $destinationPath = public_path().'/images/users/'.$user->id.'/';
                $file->move($destinationPath, $uniqueFileName);

                //Enregistrer des données dans la table role_users
                 $roleUser->user_id = $user->id;
                 $roleUser->role_id = $request->roles;

                 $roleUser->save();
            }
        } else {

            $user->name =  $userName;
            $user->email = $email;
            $user->password = Hash::make($request->password);
            $user->photo = 'avatar1.png';

            $user->save();
            
            if($user) {// Si les données ont été correctement enregistrées dans la base de données

                //Enregistrer des données dans la table role_users
                $roleUser->user_id = $user->id;
                $roleUser->role_id = $request->roles;

                $roleUser->save();
            } 
        }
        
        //rediriger sur la page show
        return redirect()->route('users.show', $user->id)->with('success', 'Votre formulaire a été soumis avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
        // view user by id
        $user = $this->userRepository->viewById($id);
      
        return view('admin.users.profile', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Obtenir l'utilisateur par identifiant pour le modifier

        $user  = $this->userRepository->editSingleUserById($id);

        $roles = $this->roleRepository->getAllRoles();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'unique:users,email,'.$request->user_id,
            'roles'=>'required'
        ]);

        // Formatting the inputs
        $userName      =    strtolower($request->name);
        $email     =    strtolower($request->email);

        // Vérifiez si une image de profil a été téléchargée
        if ($request->has('image')) {

            $file = $request->file('image');

            // Get image name
            $fileName = $file->getClientOriginalName();

            // Créer le nom de l'image en fonction de l'horodatage actuel et du nom de l'image
            $uniqueFileName = $name =  time().'_'.$fileName;

            // Enregistrer les données dans la base de données
           
             $form_data = array(
                'name'              =>  $userName,
                'email'             =>  $email,
                'photo'             =>  $uniqueFileName,
             );

            // mettre à jour la base de données où id est égal à user_id
            
            $user = $this->userRepository->updateUserById($request->user_id, $form_data);

             // Mettre à jour le rôle de l'utilisateur
             $role_data = array(
                'role_id'          =>   $request->roles,
             );

            $this->roleRepository->updateUserRoleById($request->user_id,  $role_data);

            if($user) { // Si les données ont été correctement enregistrées dans la base de données

                 // Créez un chemin de fichier où l'image sera stockée
                $destinationPath = public_path().'/images/users/'.$request->user_id.'/';
                $file->move($destinationPath, $uniqueFileName);
            }
        } else { // Si l'image n'a pas été modifiée
             $form_data = array(
                'name'           =>  $userName,
                'email'          =>  $email,
             );

            // mettre à jour la base de données où id est égal à user_id
            
            $user = $this->userRepository->updateUserById($request->user_id, $form_data);

            // Mettre à jour le rôle de l'utilisateur
             $role_data = array(
                'role_id'          =>   $request->roles,
             );
            $this->roleRepository->updateUserRoleById($request->user_id,  $role_data);
        }

        //rediriger sur la page show
        return redirect()->route('users.show', $id)->with('success', 'Vos données ont été mises à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Supprimer un utilisateur par identifiant
        $data = $this->userRepository->deleteUserById($id); // utiliser la requête du repository

        $data->delete();

        $folderPath = public_path('images/users/'.$id);
        File::deleteDirectory($folderPath); // Supprimer l'image correspondante

        return redirect()->route('users.index')->with('success', 'Vos données ont été supprimés avec succès.');

    }
}
