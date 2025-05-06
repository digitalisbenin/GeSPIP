<?php

namespace App\Http\Controllers;

use App\Models\ModeExecution;
use Illuminate\Http\Request;

class ModeExecutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modeExecution=ModeExecution::all();
        return view('mode_execution.index', compact('modeExecution'));
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
        $this->validate($request,[
            'name'=>'required|string',
        ]);
        $modeExecution= ModeExecution::create([
            'name' =>$request->name,

        ]);
        session()->flash('success'," Le mode d'execution a été bien enregistrer");
        return redirect('mode-executions');
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
        $this->validate($request,[
            'name'=>'required|string',

        ]);

            $modeExecution=ModeExecution::findOrfail($id);
            $modeExecution->name=$request->name;
            $modeExecution->save();
        ;
        session()->flash('success',"Le mode d'execution a été modifier avec succès");
        return redirect('mode-executions');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $modeExecution=ModeExecution::findOrfail($id);
        $modeExecution->delete();
        session()->flash('success',"Le mode d'execution a été supprimer avec succès");
        return redirect('mode-executions');
    }
}
