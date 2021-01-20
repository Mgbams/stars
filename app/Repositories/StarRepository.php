<?php

namespace App\Repositories;

use App\Models\Star;

class StarRepository
{
    /**
        * get all stars from database
        * @return collection
    */

    public function getAllStars()
    {
        $star= Star::all();

        return $star;
    }

     /**
        * Get the first star from database
        * @return collection
    */

    public function getFirstStar()
    {
        $star= Star::all()->take(1);

        return $star;
    }

    /**
        * Delete a star by its id
        *
        * @param int
        * @return collection
    */

    public function deleteStarById($id)
    {
        $star = Star::findOrFail($id);

        return $star;
    }

    /**
        * Update a star by its id
        *
        * @param int
        * @return collection
    */

    public function updateStarById($id, $form_data)
    {
        $star = Star::whereId($id)->update($form_data);

        return $star;
    }

    
    /**
        * Edit a single star by its id
        *
        * @param int
        * @return collection
    */

    public function editSingleStarById($id)
    {
        $star= Star::where('id', $id)->first();

        return $star;
    }

    
    /**
        * paginate stars received from database
        *
        * @param int
        * @return collection
    */

    public function paginateStars($number)
    {
        $star= Star::paginate($number);

        return $star;
    }

}
