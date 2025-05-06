<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contrat;
class RechercheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contrat=Contrat::all();
        return view('recherche.index', compact('contrat'));
    }
    // public function filter(Request $request)
    // {
    //     $status = $request->input('status'); // Récupérer la valeur du statut envoyée par le bouton
    
    //     // Effectuez la logique de filtrage en fonction du statut
    //     // Par exemple, si vous avez une table "items" avec une colonne "status"
    //     $contrat = Contrat::where('status', $status)->get();
    
    //     return view('recherche.index', ['items' => $contrat]);
    // }
    // public function filter(Request $request)
    // {
    //     $status = $request->input('status'); // Récupérer la valeur du statut envoyée par le bouton
    
    //     if ($status) {
    //         // Effectuez la logique de filtrage en fonction du statut
    //         // Par exemple, si vous avez une table "contrats" avec une colonne "status"
    //         $contrat = Contrat::where('status', $status)->get();
    //     } else {
    //         // Rediriger vers la page d'index si aucun statut n'est sélectionné
    //         return redirect()->route('recherche.index');
    //     }
    
    //     return view('recherche.index', compact('contrat'));
    // }
    
    public function filter(Request $request)
{
    $status = $request->input('status'); // Récupérer la valeur du statut envoyée par le bouton
    $startDate = $request->input('start_date');
    $endDate = $request->input('end_date');

    $query = Contrat::query();

    if ($status) {
        // Filtrer par statut
        $query->where('status', $status);
    }

    if ($startDate && $endDate) {
        // Filtrer par plage de dates
        $query->whereBetween('created_at', [$startDate, $endDate]);
    }

    // Exécuter la requête
    $contrat = $query->get();

    return view('recherche.index', compact('contrat'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
 


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
