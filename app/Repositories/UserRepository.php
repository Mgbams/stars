<?php

namespace App\Repositories;

use App\User;
use Illuminate\Support\Facades\DB;

class UserRepository
{
    /**
        * get all roles from database
        * @return collection
    */

    public function getAllUsers()
    {
        $user = User::all();

        return $user;
    }


    /**
        * Update a user by its id
        *
        * @param int
        * @return collection
    */

    public function updateUserById($id, $form_data)
    {
        $user = User::whereId($id)->update($form_data);

        return $user;
    }

    
    /**
        * Edit a single user by its id
        *
        * @param int
        * @return collection
    */

    public function editSingleUserById($id)
    {
        $user = User::where('id', $id)->first();

        return $user;
    }


    /**
        * View a single user by its id
        *
        * @param int
        * @return collection
    */

    public function viewById($id)
    {
         $user = DB::table('role_users')
                    ->join('roles', 'role_users.role_id', '=', 'roles.id')
                    ->join('users', 'role_users.user_id', '=', 'users.id')
                    ->select('users.name', 'users.email', 'users.created_at', 'users.photo', 'users.id', 'roles.name as roleName')
                    ->where('users.id', '=', $id)
                    ->first();
        return $user;
    }
    
    /**
        * paginate user received from database
        *
        * @param int
        * @return collection
    */

    public function paginateUsers($number)
    {
        $user = DB::table('role_users')
                    ->join('roles', 'role_users.role_id', '=', 'roles.id')
                    ->join('users', 'role_users.user_id', '=', 'users.id')
                    ->select('users.name', 'users.email', 'users.created_at', 'users.photo', 'users.id', 'roles.name as roleName')
                    ->paginate($number);
        
        return $user;
    }

    /**
        * Delete a user by its id
        *
        * @param int
        * @return collection
    */

    public function deleteUserById($id)
    {
        $user = User::findOrFail($id);

        return $user;
    }

    /**
        * get authenticated user role
        *
        * @param int
        * @return collection
    */

       public function getAuthenticatedUserRole($id)
    {
         $user = DB::table('role_users')
                    ->join('roles', 'role_users.role_id', '=', 'roles.id')
                    ->join('users', 'role_users.user_id', '=', 'users.id')
                    ->select('roles.name as roleName')
                    ->where('users.id', '=', $id)
                    ->first();
        return $user;
    }

}
