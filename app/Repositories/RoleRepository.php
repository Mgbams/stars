<?php

namespace App\Repositories;

use App\Models\Role;
use App\Models\RoleUser;
use Illuminate\Support\Facades\DB;

class RoleRepository
{
    /**
        * get all roles from database
        * @return collection
    */

    public function getAllRoles()
    {
        $roles = Role::pluck('name', 'id');

        return $roles;
    }


    /**
        * Update a user Role by its id
        *
        * @param int
        * @return collection
    */

    public function updateUserRoleById($user_id, $role_data)
    {
        $userRole = RoleUser::where('user_id', $user_id)->update($role_data);

        return $userRole;
    }   
    
    /**
        * paginate roles received from database
        *
        * @param int
        * @return collection
    */

    public function paginateRoles($number)
    {
        $roles = Role::paginate($number);
        
        return $roles;
    }

     /**
        * Delete a role by its id
        *
        * @param int
        * @return collection
    */

    public function deleteRoleById($id)
    {
        $role = Role::findOrFail($id);

        return $role;
    }

     /**
        * Update a role by its id
        *
        * @param int
        * @return collection
    */

    public function updateRoleById($id, $form_data)
    {
        $role = Role::where('id', $id)->update($form_data);

        return $role;
    }
}
