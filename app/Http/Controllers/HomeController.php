<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Star;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

         $this->middleware('auth', ['only' => 'index']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard');
    }

     /**
     * Show the lists of stars.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show()
    {
         $firstStar = Star::all()->take(1); // première star dans la base de données
         $stars = Star::all();
        return view('stars', compact('stars', 'firstStar'));
    }
}
