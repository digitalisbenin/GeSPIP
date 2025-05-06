<?php

namespace App\Http\Controllers;

use App\Models\Type_projet;
use App\Models\TypeProjet;
use Illuminate\Http\Request;
use TypeError;

class TypeProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_projet=TypeProjet::all();
        return view('type_projet.index', compact('type_projet'));
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
            'name'=>'required|string',

        ]);
        $type_projet= TypeProjet::create([
            'name' =>$request->name,


        ]);
        session()->flash('success','Le type projet a été bien enregistrer');
        return redirect('type-projets');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type_projet=TypeProjet::findOrFail($id);
        return view('dashboard\tasks\show',compact('type_projet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type_projet=TypeProjet::findOrFail($id);
        return view('dashboard\tasks\show',compact('type_projet'));
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
            'name'=>'required|string',


        ]);

            $type_projet=TypeProjet::findOrfail($id);
            $type_projet->name=$request->name;
            $type_projet->save();
        ;
        session()->flash('success','Le type projet a été modifier avec succès ');
        return redirect('type-projets');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type_projet=TypeProjet::findOrfail($id);
        $type_projet->delete();
        session()->flash('success','Le type projet a été supprimer avec succès');
        return redirect('type-projets');
    }
}
