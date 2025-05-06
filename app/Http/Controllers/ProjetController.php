<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\TypeProjet;
use Illuminate\Http\Request;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_projet=TypeProjet::all();
        $projet=Projet::all();
        return view('projet.index', compact('projet','type_projet'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.tasks.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request,[
            'titre_projet'=>'required|string',
            'intituler_projet'=>'required|string',
            'cout_global'=>'required',


        ]);
        $projet= Projet::create([
            'titre_projet' =>$request->titre_projet,
            'intituler_projet' =>$request->intituler_projet,
            'cout_global' =>$request->cout_global,
            'type_projet_id' =>$request->type_projet_id,


        ]);
        session()->flash('success','Le projet a été bien enregistrer');
        return redirect('projets');
    }

    public function stores(Request $request)
    {

        $this->validate($request,[
            'titre_projet'=>'required|string',
            'intituler_projet'=>'required|string',
            'cout_global'=>'required',


        ]);
        $projet= Projet::create([
            'titre_projet' =>$request->titre_projet,
            'intituler_projet' =>$request->intituler_projet,
            'cout_global' =>$request->cout_global,
            'type_projet_id' =>$request->type_projet_id,


        ]);
        session()->flash('success','Le projet a été bien enregistrer');
        return redirect('activites-create');
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
        $projet=Projet::findOrFail($id);
        return view('dashboard\tasks\show',compact('projet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projet=Projet::findOrFail($id);
        return view('dashboard\tasks\show',compact('projet'));
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
        $this->validate($request,[
            'titre_projet'=>'required|string',
            'intituler_projet'=>'required|string',
            'cout_global'=>'required',

        ]);

            $projet=Projet::findOrfail($id);
            $projet->titre_projet=$request->titre_projet;
            $projet->intituler_projet=$request->intituler_projet;
            $projet->cout_global=$request->cout_global;
            $projet->type_projet_id=$request->type_projet_id;
            $projet->save();
        ;
        session()->flash('success','Le projet a été modifier avec succès ');
        return redirect('projets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $projet=Projet::findOrfail($id);
        $projet->delete();
        session()->flash('success','Le projet a été supprimer avec succès');
        return redirect('projets');
    }
}
