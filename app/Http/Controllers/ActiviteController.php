<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Commune;
use App\Models\Departement;
use App\Models\Entreprise;
use App\Models\ModeExecution;
use App\Models\NatureActivite;
use App\Models\Projet;
use App\Models\TypeProjet;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $type_projet=TypeProjet::all();
        $activite=Activite::all();
        $entreprise=Entreprise::all();
        $commune=Commune::all();
        $nature_activite=NatureActivite::all();
        $mode_execution=ModeExecution::all();
        $projet=Projet::all();
        return view('activite.index', compact('activite','entreprise','commune','nature_activite','mode_execution','projet','type_projet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departement=Departement::all();
        $type_projet=TypeProjet::all();
        $activite=Activite::all();
        $entreprise=Entreprise::all();
        $commune=Commune::all();
        $nature_activite=NatureActivite::all();
        $mode_execution=ModeExecution::all();
        $projet=Projet::all();
        return view('activite.create', compact('activite','entreprise','commune','nature_activite','mode_execution','projet','type_projet','departement'));
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
        $this->validate($request,[
            'titre_activite'=>'required',
            'cout_activite'=>'required',
            'dure_execution'=>'required',
            'nature_activite_id'=>'required',
            'projet_id'=>'required',
            //'commune_id'=>'required',
           // 'entreprise_id'=>'required',
            'mode_execution_id'=>'required',
        ]);
        $activite= Activite::create([
            'titre_activite' =>$request->titre_activite,
            'cout_activite' =>$request->cout_activite,
            'dure_execution' =>$request->dure_execution,
            'nature_activite_id' =>$request->nature_activite_id,
            'projet_id'=>$request->projet_id,
            'commune_id'=>$request->commune_id,
            'entreprise_id'=>$request->entreprise_id,
            'mode_execution_id'=>$request->mode_execution_id,
        ]);
        session()->flash('success',"L'activité a été bien enregistrer");
        return redirect('activites');
    }
    public function stores(Request $request)
    {
        //
        $this->validate($request,[
            'titre_activite'=>'required',
            'cout_activite'=>'required',
            'dure_execution'=>'required',
            'nature_activite_id'=>'required',
            'projet_id'=>'required',
            //'commune_id'=>'required',
           // 'entreprise_id'=>'required',
            'mode_execution_id'=>'required',
        ]);
        $activite= Activite::create([
            'titre_activite' =>$request->titre_activite,
            'cout_activite' =>$request->cout_activite,
            'dure_execution' =>$request->dure_execution,
            'nature_activite_id' =>$request->nature_activite_id,
            'projet_id'=>$request->projet_id,
            'commune_id'=>$request->commune_id,
            'entreprise_id'=>$request->entreprise_id,
            'mode_execution_id'=>$request->mode_execution_id,
        ]);
        session()->flash('success',"L'activité a été bien enregistrer");
        return redirect('contrats-create');
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
        $activite=Activite::findOrFail($id);
        return view('show',compact('activite'));
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
        $activite=Activite::findOrfail($id);
        return view('edit',compact('activite'));
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
        $this->validate($request,[
            'titre_activite'=>'required',
            'cout_activite'=>'required',
            'dure_execution'=>'required',
            'nature_activite_id'=>'required',
            'projet_id'=>'required',
            'commune_id'=>'required',
            'entreprise_id'=>'required',
            'mode_execution_id'=>'required',
        ]);

            $activite=Activite::findOrfail($id);
            $activite->titre_activite=$request->titre_activite;
            $activite->cout_activite=$request->cout_activite;
            $activite->dure_execution=$request->dure_execution;
            $activite->nature_activite_id=$request->nature_activite_id;
            $activite->projet_id=$request->projet_id;
            $activite->commune_id=$request->commune_id;
            $activite->entreprise_id=$request->entreprise_id;
            $activite->mode_execution_id=$request->mode_execution_id;

            $activite->save();
        
        session()->flash('success',"L'activité a été modifier avec succès");
        return redirect('activites');
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
        $activite=Activite::findOrfail($id);
        $activite->delete();
        session()->flash('success',"L'activité a été supprimer avec succès");
        return redirect('activites');
    }
}
