<?php

namespace App\Http\Controllers;

use App\Models\Activite;
use App\Models\Commune;
use Illuminate\Http\Request;
use App\Models\Contrat;
use App\Models\Departement;
use App\Models\Entreprise;
use App\Models\ModeExecution;
use App\Models\NatureActivite;
use App\Models\Projet;
use App\Models\TypeProjet;
use Illuminate\Support\Facades\File;


class ContratController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function inde()
    {
        //
        $contrat=Contrat::where('status', 'En cours')->get();
        return view('contrat.inde', compact('contrat'));
    }
    public function index()
    {
        //
        $contrat=Contrat::all();
        return view('contrat.index', compact('contrat'));
    }
    public function indexes()
    {
        //
        $contrat=Contrat::where('status', '!=', 'Non démarré')->get();
        return view('contrat.indexes', compact('contrat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        // $nombreDeLignes = Contrat::count();
        // $nombre= 'P000'. $nombreDeLignes + 1 ;
        $dernierContrat = Contrat::latest('id')->first(); // Récupère le dernier contrat inséré
        $dernierNumero = $dernierContrat ? intval(substr($dernierContrat->numero, 1)) : 0; // Extraire le numéro (sans 'P')
        $nouveauNumero = 'A' . str_pad($dernierNumero + 1, 4, '0', STR_PAD_LEFT);
        $nombre= $nouveauNumero ;
        $activite=Activite::all();
        $entreprise=Entreprise::all();
        $commune=Commune::all();
        $nature_activite=NatureActivite::all();
        $mode_execution=ModeExecution::all();
        $projet=Projet::all();
        $departement=Departement::all();
        $type_projet=TypeProjet::all();

        return view('contrat.create',compact('activite','nombre','entreprise','commune','nature_activite','mode_execution','projet','type_projet','departement'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);

        $this->validate($request,[
            'titre_activite'=>'required',
            'cout_activite'=>'required',
            'dure_execution'=>'required',
            'description'=>'required',
            'nature_activite_id'=>'required',
            'projet_id'=>'required',
            //'commune_id'=>'required',
           // 'entreprise_id'=>'required',
            //'mode_execution_id'=>'required',
        ]);
        $activite= Activite::create([
            'titre_activite' =>$request->titre_activite,
            'cout_activite' =>$request->cout_activite,
            'description' =>$request->description,
            'dure_execution' =>$request->dure_execution,
            'nature_activite_id' =>$request->nature_activite_id,
            'projet_id'=>$request->projet_id,
            'departement'=>$request->departement,
            'commune'=>$request->commune,
            'arrondissement'=>$request->arrondissement,
            'commune'=>$request->commune,
            'ville'=>$request->ville,
            'coordonnéeGPS'=>$request->coordonnéeGPS,
            'mode_execution'=>$request->mode_execution,
            'entreprise'=>$request->entreprise,
            'phone_entreprise'=>$request->phone,
        ]);

        $activiteId=$activite->id;
        $this->validate($request,[

            'contrat'=>'nullable',


        ]);
        // $nombreDeLignes = Contrat::count();
        // $nombre= 'P000'. $nombreDeLignes + 1 ;
        $dernierContrat = Contrat::latest('id')->first(); // Récupère le dernier contrat inséré
$dernierNumero = $dernierContrat ? intval(substr($dernierContrat->numero, 1)) : 0; // Extraire le numéro (sans 'P')
$nouveauNumero = 'P' . str_pad($dernierNumero + 1, 4, '0', STR_PAD_LEFT);
        $contrat= Contrat::create([
            'numero'=>$nouveauNumero,
            'contrat'=>$request->contrat,
            'demarre'=>$request->demarre,
            'ref_contrat'=>$request->ref_contrat,
            'date_de_planification'=>$request->date_de_planification,
            'date_de_remise_site'=>$request->date_de_remise_site,
            'date_de_remise_site'=>$request->date_de_remise_site,
            'date_de_remise_site'=>$request->date_de_remise_site,
            'date_de_demarrage'=>$request->date_de_demarrage,

            'date_achev_pro'=>$request->date_achev_pro,


            'mode_execution'=>$request->mode_execution,
            'entreprise'=>$request->entreprise,
            'phone_entreprise'=>$request->phone,

            'activite_id'=>$activiteId,

            'user_id'=>auth()->user()->id,


        ]);



        session()->flash('success','Le contrat a été bien enregistrer ');
        return redirect('contrats');
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

        $contrat=Contrat::findOrFail($id);
        return view('dashboard\tasks\show',compact('contrat'));
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
        $activite=Activite::all();
        $contrat=Contrat::findOrfail($id);

        $commune=Commune::all();
        $nature_activite=NatureActivite::all();
        $mode_execution=ModeExecution::all();
        $projet=Projet::all();
        $departement=Departement::all();
        $type_projet=TypeProjet::all();

        return view('contrat.edit',compact('contrat','activite','commune','nature_activite','mode_execution','projet','departement','type_projet'));
    }

    public function edites($id)
    {
        //
        $activite=Activite::all();
        $contrat=Contrat::findOrfail($id);
        $commune=Commune::all();
        $nature_activite=NatureActivite::all();
        $mode_execution=ModeExecution::all();
        $projet=Projet::all();
        $departement=Departement::all();
        $type_projet=TypeProjet::all();

        return view('contrat.edites',compact('contrat','activite','commune','nature_activite','mode_execution','projet','departement','type_projet'));
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
        //dd($request);

        $this->validate($request,[
            'titre_activite'=>'required',
            'cout_activite'=>'required',
            'dure_execution'=>'required',
            'nature_activite_id'=>'required',
            'projet_id'=>'required',
           // 'commune_id'=>'required',
            'description'=>'required',
            //'mode_execution_id'=>'required',



        ]);
        $contrat=Contrat::findOrfail($id);

            $activite=Activite::findOrfail($contrat->activite_id);
            $activite->titre_activite=$request->titre_activite;
            $activite->cout_activite=$request->cout_activite;
            $activite->dure_execution=$request->dure_execution;
            $activite->nature_activite_id=$request->nature_activite_id;
            $activite->projet_id=$request->projet_id;
            $activite->description=$request->description;
            $activite->commune=$request->commune;
             $activite->ville=$request->ville;
             $activite->arrondissement=$request->arrondissement;
             $activite->departement=$request->departement;

         $activite->coordonnéeGPS=$request->coordonnéeGPS;
        //  $activite->mode_execution=$request->mode_execution;
        // $activite->entreprise=$request->entreprise;
        //  $activite->phone_entreprise=$request->phone;
         $activite->etat_chantier=$request->etat_chantier;
         $activite->annee_execution=$request->annee_execution;
            $activite->save();

            $activiteId=$activite->id;
        $this->validate($request,[

            'contrat'=>'nullable',
            //'ref_contrat'=>'required',
        ]);
        $contrat=Contrat::findOrfail($id);
        //$contrat->numero=$request->input('numero');
        $contrat->contrat=$request->input('contrat');
        $contrat->status=$request->input('status');
        $contrat->demarre=$request->input('demarre');
        $contrat->ref_contrat=$request->input('ref_contrat');
        $contrat->date_de_planification=$request->input('date_de_planification');
        $contrat->date_de_remise_site=$request->input('date_de_remise_site');
        $contrat->date_de_remise_site=$request->input('date_de_remise_site');
        $contrat->date_de_remise_site=$request->input('date_de_remise_site');
        $contrat->date_de_demarrage=$request->input('date_de_demarrage');

        $contrat->date_achev_pro=$request->input('date_achev_pro');


        // $contrat->localite=$request->input('localite');

        // $contrat->coordonnéeGPS=$request->input('coordonnéeGPS');
         $contrat->mode_execution=$request->input('mode_execution');
         $contrat->entreprise=$request->input('entreprise');
         $contrat->phone_entreprise=$request->input('phone');
        $contrat->activite_id= $activiteId;

        $contrat->save();



        session()->flash('success','Le contrat a été modifier avec succès');
        return redirect('contrats');
    }
    public function updates(Request $request, $id)
    {
        //
        $this->validate($request,[

            'contrat'=>'nullable',
            //'ref_contrat'=>'required',
        ]);


        $contrat=Contrat::findOrfail($id);


        if ($request->hasFile('pv1')) {
            $path='assets/uploads/PV1'.$contrat->pv_attachement1;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('pv1');
            $ext=$file->getClientOriginalExtension();
            $filename = 'PV1'.time().'.'.$ext;
            $file->move('assets/uploads/PV1',$filename);
            $contrat->pv_attachement1= $filename;
        }
        if ($request->hasFile('pv2')) {
            $path='assets/uploads/PV2'.$contrat->pv_attachement2;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('pv2');
            $ext=$file->getClientOriginalExtension();
            $filename = 'PV2'.time().'.'.$ext;
            $file->move('assets/uploads/PV2',$filename);
            $contrat->pv_attachement2= $filename;
        }
        if ($request->hasFile('pv3')) {
            $path='assets/uploads/PV3'.$contrat->pv_attachement3;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('pv3');
            $ext=$file->getClientOriginalExtension();
            $filename = 'PV3'.time().'.'.$ext;
            $file->move('assets/uploads/PV3',$filename);
            $contrat->pv_attachement3= $filename;
        }
        if ($request->hasFile('pv4')) {
            $path='assets/uploads/PV4'.$contrat->pv4_reception_technique;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('pv4');
            $ext=$file->getClientOriginalExtension();
            $filename = 'PV4'.time().'.'.$ext;
            $file->move('assets/uploads/PV4',$filename);
            $contrat->pv4_reception_technique= $filename;
        }
        if ($request->hasFile('pv5')) {
            $path='assets/uploads/PV5'.$contrat->pv5_reception_provisoire;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('pv5');
            $ext=$file->getClientOriginalExtension();
            $filename = 'PV5'.time().'.'.$ext;
            $file->move('assets/uploads/PV5',$filename);
            $contrat->pv5_reception_provisoire= $filename;
        }
         if ($request->hasFile('pv6')) {
            $path='assets/uploads/PV6'.$contrat->pv6_reception_definitive;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('pv6');
            $ext=$file->getClientOriginalExtension();
            $filename = 'PV6'.time().'.'.$ext;
            $file->move('assets/uploads/PV6',$filename);
            $contrat->pv6_reception_definitive= $filename;
        }
         if ($request->hasFile('fichier_contrat')) {
            $path='assets/uploads/contrat'.$contrat->fichier_contrat;
            if (File::exists($path)) {
                File::delete($path);
            }
            $file =$request->file('fichier_contrat');
            $ext=$file->getClientOriginalExtension();
            $filename = 'contrat'.time().'.'.$ext;
            $file->move('assets/uploads/contrat',$filename);
            $contrat->fichier_contrat= $filename;
        }
        //$contrat->numero=$request->input('numero');
        //$contrat->contrat=$request->input('contrat');
       // $contrat->ref_contrat=$request->input('ref_contrat');
        $contrat->date_de_planification=$request->input('date_de_planification');
        $contrat->date_de_remise_site=$request->input('date_de_remise_site');
        $contrat->date_de_remise_site=$request->input('date_de_remise_site');
        $contrat->date_de_remise_site=$request->input('date_de_remise_site');
        $contrat->date_de_demarrage=$request->input('date_de_demarrage');
        $contrat->niv_exe_phy_date_visit=$request->input('niv_exe_phy_date_visit');
        $contrat->niv_exe_fce_date_visit=$request->input('niv_exe_fce_date_visit');
        $contrat->montant_desc_deja_pay=$request->input('montant_desc_deja_pay');
        $contrat->montant_desc_a_pay=$request->input('montant_desc_a_pay');
        $contrat->date_achev_pro=$request->input('date_achev_pro');
        $contrat->date_achev_reel=$request->input('date_achev_reel');
        $contrat->date_recept_tech=$request->input('date_recept_tech');
        $contrat->lien_pv4=$request->input('lien_pv4');

        $contrat->date_recept_prov_chantier=$request->input('date_recept_prov_chantier');
       

        $contrat->date_recept_def_chantier=$request->input('date_recept_def_chantier');
        

        $contrat->duree_ret_accus=$request->input('duree_ret_accus');
        $contrat->cause_retard=$request->input('cause_retard');
        $contrat->solution=$request->input('solution');
        $contrat->appro_achantier=$request->input('appro_achantier');
        $contrat->qualite_travaux=$request->input('qualite_travaux');
        $contrat->difficulte=$request->input('difficulte');
        $contrat->autre_diff=$request->input('autre_diff');
        $contrat->attachement1=$request->input('attachement1');
        $contrat->date_attach1=$request->input('date_attach1');
        $contrat->montant_attach1=$request->input('montant_attach1');
        

        $contrat->attachement2=$request->input('attachement2');
        $contrat->date_attach2=$request->input('date_attach2');
        $contrat->montant_attach2=$request->input('montant_attach2');
       

        $contrat->attachement3=$request->input('attachement3');
        $contrat->date_attach3=$request->input('date_attach3');
        $contrat->montant_attach3=$request->input('montant_attach3');
       

        $contrat->nbre_empl_per=$request->input('nbre_empl_per');
        $contrat->nbre_empl_temp=$request->input('nbre_empl_temp');
        $contrat->annee_execution=$request->input('annee_execution');
        $contrat->personne_en_charge=$request->input('personne_en_charge');

        $contrat->etat_chantier=$request->input('etat_chantier');

       // $contrat->activite_id=$request->input('activite_id');

        $contrat->save();



        session()->flash('success','Le contrat a été modifier avec succès');
        return redirect('contratses');
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
        $task=Contrat::findOrfail($id);
        $task->delete();
        session()->flash('success','Le contrat a été supprimer avec succès');
        return redirect('contrats');
    }
}
