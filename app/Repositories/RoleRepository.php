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
     
}
