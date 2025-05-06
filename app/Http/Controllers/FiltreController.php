<?php

namespace App\Http\Controllers;
use App\Models\Contrat;
use Illuminate\Http\Request;

class FiltreController extends Controller
{
    public function toutesActivites(){
        $contrat=Contrat::all();
        return view('filtre.toutes', compact('contrat')); 
    }
    public function activitesEnCours(){
        $contrat=Contrat::where('status','En cours')->get();
        return view('filtre.encours', compact('contrat')); 
    }
    public function activitesNonDemarre(){
        $contrat=Contrat::where('status','Non démarré')->get();
        return view('filtre.nondemarre', compact('contrat')); 
    }
    public function activitesArchevrees(){
        $contrat=Contrat::where('status','Terminer')->get();
        return view('filtre.archevre', compact('contrat')); 
    }
    public function activitesSuspendues(){
        $contrat=Contrat::where('status','Suspendues')->get();
        return view('filtre.suspendues', compact('contrat')); 
    }
    public function activitesEnSouffrances(){
        $contrat=Contrat::where('status','En difficulté')->get();
        return view('filtre.souffrances', compact('contrat')); 
    }
    public function activitesAbandonnees(){
        $contrat=Contrat::where('status','Abandonnées')->get();
        return view('filtre.abandonnees', compact('contrat')); 
    }
    public function activitesParNature(){
        $contrat=Contrat::all();
        return view('filtre.nature', compact('contrat')); 
    }
    public function activitesParProjet(){
        $contrat=Contrat::all();
        return view('filtre.projet', compact('contrat')); 
    }
    public function activitesParEntreprise(){
        $contrat=Contrat::all();
        return view('filtre.entreprise', compact('contrat')); 
    }
    public function activitesParLocalite(){
        $contrat=Contrat::all();
        return view('filtre.localite', compact('contrat')); 
    }
    public function activitesParPeriode(){
        $contrat=Contrat::all();
        return view('filtre.periode', compact('contrat')); 
    }
}
