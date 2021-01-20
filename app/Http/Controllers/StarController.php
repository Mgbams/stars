<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Star;

class StarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stars = Star::paginate(5); // 5 contents per page
        //return the view containing the lists of stars
        return view('admin.stars.index', compact('stars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //returns a view with form to create a star
        return view('admin.stars.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //dd($request->file('image')->getClientOriginalName());

         // Form validation
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Check if a profile image has been uploaded
        if ($request->has('image')) {

            $file = $request->file('image');

            // Get image name
            $fileName = $file->getClientOriginalName();

            // Make the image name based on current timestamp and image name 
            $uniqueFileName = $name =  time().'_'.$fileName;

            // Enregistrer les données dans la base de données
            $star = Star::create(
                [
                    'nom'           =>  $request->nom,
                    'prenom'        => $request->prenom,
                    'image'         =>  $uniqueFileName,
                    'description'   => $request->description,
                ]
            );

            if($star) { // Si les données ont été correctement enregistrées dans la base de données

                 // Créez un chemin de fichier où l'image sera stockée
                $destinationPath = public_path().'/images/'.$star->id.'/';
                $file->move($destinationPath, $uniqueFileName);
            }
        }
        
        return back()->with('success', 'Your form has been submitted.');
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
        // Obtenir l'utilisateur par identifiant pour le modifier
        $star= Star::where('id', $id)->first();
        return view('admin.stars.edit', compact('star'));
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
            'nom' => 'required',
            'prenom' => 'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Vérifiez si une image de profil a été téléchargée
        if ($request->has('image')) {

            $file = $request->file('image');

            // Get image name
            $fileName = $file->getClientOriginalName();

            // Créer le nom de l'image en fonction de l'horodatage actuel et du nom de l'image
            $uniqueFileName = $name =  time().'_'.$fileName;

            // Enregistrer les données dans la base de données
           
             $form_data = array(
                'nom'           =>  $request->nom,
                'prenom'        => $request->prenom,
                'image'         =>  $uniqueFileName,
                'description'   => $request->description,
             );

             $star = Star::whereId($request->star_id)->update($form_data); // update database where id equals star_id

            if($star) { // Si les données ont été correctement enregistrées dans la base de données

                 // Créez un chemin de fichier où l'image sera stockée
                $destinationPath = public_path().'/images/'.$request->star_id.'/';
                $file->move($destinationPath, $uniqueFileName);
            }
        }
        
        return back()->with('success', 'Vos données ont été mises à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Supprimer l'étoile par identifiant
        $data = Star::findOrFail($id);
        $data->delete();

        //$destinationPath = public_path().'/images/'.$id;
        //File::deleteDirectory(public_path('/images/'.$id));

        return redirect()->route('stars.index')->with('success', 'Vos données ont été supprimés avec succès.');
    }
}
