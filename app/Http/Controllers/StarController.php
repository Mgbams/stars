<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Star;
use App\Repositories\StarRepository;
use File;
use Purifier;

class StarController extends Controller
{
    private $starRepository;

    public function __construct(StarRepository $starRepository)
    {
        $this->starRepository =  $starRepository; //Initialiser l'attribut
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stars = $this->starRepository->paginateStars(5); // 5 contents per page
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
         // Form validation
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'description'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);

        // Formatting the inputs
        $nom = ucwords(strtolower($request->nom));
        $prenom = ucwords(strtolower($request->prenom));

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
                    'nom'           =>  $nom,
                    'prenom'        =>  $prenom,
                    'image'         =>  $uniqueFileName,
                    'description'   =>  Purifier::clean($request->description), //filter input with purifier
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

        $star = $this->starRepository->editSingleStarById($id);

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
            'description'=>'required'
        ]);

        // Formatting the inputs
        $nom        = ucwords(strtolower($request->nom));
        $prenom     = ucwords(strtolower($request->prenom));

        // Vérifiez si une image de profil a été téléchargée
        if ($request->has('image')) {

            $file = $request->file('image');

            // Get image name
            $fileName = $file->getClientOriginalName();

            // Créer le nom de l'image en fonction de l'horodatage actuel et du nom de l'image
            $uniqueFileName = $name =  time().'_'.$fileName;

            // Enregistrer les données dans la base de données
           
             $form_data = array(
                'nom'           =>  $nom,
                'prenom'        =>  $prenom,
                'image'         =>  $uniqueFileName,
                'description'   =>  Purifier::clean($request->description), //filter input with purifier
             );

            // mettre à jour la base de données où id est égal à star_id
            
            $star = $this->starRepository->updateStarById($request->star_id, $form_data);

            if($star) { // Si les données ont été correctement enregistrées dans la base de données

                 // Créez un chemin de fichier où l'image sera stockée
                $destinationPath = public_path().'/images/'.$request->star_id.'/';
                $file->move($destinationPath, $uniqueFileName);
            }
        } else { // Si l'image n'a pas été modifiée
             $form_data = array(
                'nom'           =>  $nom,
                'prenom'        =>  $prenom,
                'description'   =>  $request->description
             );

            // mettre à jour la base de données où id est égal à star_id
            
            $star = $this->starRepository->updateStarById($request->star_id, $form_data);
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
        // Supprimer un star par identifiant
        $data = $this->starRepository->deleteStarById($id); // utiliser la requête du repository
        $data->delete();

        $folderPath = public_path('images/'.$id);
        File::deleteDirectory($folderPath); // Supprimer l'image correspondante

        return redirect()->route('stars.index')->with('success', 'Vos données ont été supprimés avec succès.');
    }
}
