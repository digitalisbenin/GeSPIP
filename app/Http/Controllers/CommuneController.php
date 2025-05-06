<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Commune;
use App\Models\Departement;

class CommuneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $commune=Commune::all();
        $departement=Departement::all();
        return view('commune.index', compact('commune','departement'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('commune.index');
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
            'name'=>'required|string',
            'departement_id'=>'required',
        ]);
        $commune= Commune::create([
            'name' =>$request->name,
            'departement_id'=>$request->departement_id,
        ]);
        session()->flash('success','La commune a été bien enregistrer ');
        return redirect('communes');
    }

    public function stores(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required|string',
            'departement_id'=>'required',
        ]);
        $commune= Commune::create([
            'name' =>$request->name,
            'departement_id'=>$request->departement_id,
        ]);
        session()->flash('success','La commune a été bien enregistrer ');
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

        $commune=Commune::findOrFail($id);
        return view('dashboard\tasks\show',compact('commune'));
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
        $commune=Commune::findOrfail($id);
        return view('dashboard\tasks\edit',compact('commune'));
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
            'name'=>'required|string',
            'departement_id'=>'required',
        ]);

            $commune=Commune::findOrfail($id);
            $commune->name=$request->name;
            $commune->departement_id=$request->departement_id;
            $commune->save();
        ;
        session()->flash('success','La commune a été modifier avec succès ');
        return redirect('communes');
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
        $commune=Commune::findOrfail($id);
        $commune->delete();
        session()->flash('success','La commune a été supprimer avec succès');
        return redirect('communes');
    }
}
