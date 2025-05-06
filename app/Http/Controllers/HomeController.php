<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activite;
use App\Models\Contrat;
use App\Models\Projet;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activite=Activite::all();
        $contrat=Contrat::all();
        $projet=Projet::all();
        return view('home',compact('activite','contrat','projet'));
    }
}
