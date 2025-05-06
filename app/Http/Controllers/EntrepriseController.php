<?php

namespace App\Http\Controllers;

use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $entreprise=Entreprise::all();
        return view('entreprise.index', compact('entreprise'));
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
        //
        $this->validate($request,[
            'name'=>'required|string',
            'phone'=>'required',
        ]);
        $entreprise= Entreprise::create([
            'name' =>$request->name,
            'phone' =>$request->phone,

        ]);
        session()->flash('success',"L'entreprise a été bien enregistrer");
        return redirect('entreprises');
    }
    public function stores(Request $request)
    {
        //
        $this->validate($request,[
            'name'=>'required|string',
            'phone'=>'required',
        ]);
        $entreprise= Entreprise::create([
            'name' =>$request->name,
            'phone' =>$request->phone,

        ]);
        session()->flash('success',"L'entreprise a été bien enregistrer");
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
        $entreprise=Entreprise::findOrFail($id);
        return view('dashboard\tasks\show',compact('entreprise'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $entreprise=Entreprise::findOrFail($id);
        return view('entreprise.index',compact('entreprise'));
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
            'phone'=>'required',

        ]);

            $entreprise=Entreprise::findOrfail($id);
            $entreprise->name=$request->name;
            $entreprise->phone=$request->phone;
            $entreprise->save();
        ;
        session()->flash('success',"L'entreprise a été modifier avec succès");
        return redirect('entreprises');
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
        $entreprise=Entreprise::findOrfail($id);
        $entreprise->delete();
        session()->flash('success',"L'entreprise a été supprimer avec succès");
        return redirect('entreprises');
    }
}
