<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\StarRepository;
use App\Models\Star;
use App\User;

class HomeController extends Controller
{
    private $starRepository;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StarRepository $starRepository)
    {
        $this->starRepository =  $starRepository; //Initialiser l'attribut
        $this->middleware('auth', ['only' => 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $usersCount = User::all()->count();
        $starsCount = Star::all()->count();

        return view('admin.dashboard', compact('starsCount', 'usersCount'));
    }

     /**
     * Show the lists of stars.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
         $firstStar = $this->starRepository->getFirstStar(); // première star dans la base de données

         $stars =  $this->starRepository->getAllStars();

        return view('stars', compact('stars', 'firstStar'));
    }
}
