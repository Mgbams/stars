<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\RoleRepository;
use App\Models\Role;

class RoleController extends Controller
{
    private $roleRepository;

    public function __construct(RoleRepository $roleRepository)
    {   
        //Initialiser l'attribut
        $this->roleRepository   =  $roleRepository; 
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $roles = $this->roleRepository->paginateRoles(5); // 5 contents per page
        //return the view containing the lists of users

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        // Form validation
        $this->validate($request, [
            'name'  => 'required',
        ]);

        // Formatting the inputs
        $roleName   =   strtolower($request->name);

        // Instantiate an object of role model
        $role  = new Role;

        $role->name =   $roleName;
        $role->save();

        //rediriger sur la page show
        return redirect()->route('roles.index')->with('success', 'Le rôle a été créé avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         // Supprimer un role par identifiant
        $data = $this->roleRepository->deleteRoleById($id); // utiliser la requête du repository

        $data->delete();

        return redirect()->route('roles.index')->with('success', 'Le rôle a été supprimé avec succès.');
    }
}
