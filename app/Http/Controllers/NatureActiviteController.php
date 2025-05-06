<?php

namespace App\Http\Controllers;


use App\Models\NatureActivite;
use Illuminate\Http\Request;

class NatureActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $natureActivite=NatureActivite::all();
        return view('nature_activite.index', compact('natureActivite'));
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
        $natureActivite= NatureActivite::create([
            'name' =>$request->name,


        ]);
        session()->flash('success','La nature activité a été bien enregistrer');
       
        return redirect('nature-activites');
    }
    public function stores(Request $request)
    {
        $this->validate($request,[
            'name'=>'required|string',

        ]);
        $natureActivite= NatureActivite::create([
            'name' =>$request->name,


        ]);
        session()->flash('success','La nature activité a été bien enregistrer');
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
        $natureActivite=NatureActivite::findOrFail($id);
        return view('dashboard\tasks\show',compact('nature_activite'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $natureActivite=NatureActivite::findOrFail($id);
        return view('dashboard\tasks\show',compact('natureActivite'));
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

            $natureActivite=NatureActivite::findOrfail($id);
            $natureActivite->name=$request->name;
            $natureActivite->save();
        ;
        session()->flash('success','La nature activité a été modifier avec succès ');
        return redirect('nature-activites');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $natureActivite=NatureActivite::findOrfail($id);
        $natureActivite->delete();
        session()->flash('success','La nature activite a été supprimer avec succès');
        return redirect('nature-activites');
    }
}
