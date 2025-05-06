<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departement=Departement::all();
        return view('departements.index', compact('departement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('departements.create');
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
        $departement= Departement::create([
            'name' =>$request->name,

        ]);
        session()->flash('success','Le département a été bien enregistrer ');
        return redirect('departements');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departement=Departement::findOrFail($id);
        return view('dashboard\tasks\show',compact('departement'));
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
        $departement=Departement::findOrfail($id);
        return view('departements.index', compact('departement'));
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

            $departement=Departement::findOrfail($id);
            $departement->name=$request->name;
            $departement->save();
        
        session()->flash('success','Le département a été modifier avec succès ');
        return redirect('departements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $departement=Departement::findOrfail($id);
        $departement->delete();
        session()->flash('success','Le département a été supprimer avec succès');
        return redirect('departements');
    }
}
