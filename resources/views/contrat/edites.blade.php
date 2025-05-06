@extends('layouts.app')
@extends('layouts.sidebar')


@section('content')
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm mb-3">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('dashboard/dist/img/G.png')}}" alt="G" class="brand-image img-circle elevation-3" style="opacity: .8" height="30px">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
  
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav me-auto">
  
            </ul>
            <h4 >
               Gestion et Suivi du Programme d'Investissements Publics du MDN  (GeSPIP)
            </h4>
            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
  
            </ul>
        </div>
    </div>
  </nav>
<div class="content-wrapper">
  <!-- Content Header (Page header) -->


  <div class="card">
      <div class="card-header">
          <h3 class="card-title text-uppercase ">suivi d'une activité démarrée </h3>
          {{--  <a type="button" href="{{ url('contrats-create') }}"
              class="btn btn-primary float-end">
              Enregistrer un contrat
          </a>  --}}
      </div>




  </div>
<div class="container">
  <div class="row">
    <div class="col-md-12">
        {{--  <h2>Suivi de l'activité:</h2>  --}}
      <form id="multi-step-form"action="{{ url('contrats/' . $contrat->id . '/updates')}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="step">
          <h2></h2>

          <div class="container">
            <div class="row text-lg border border-1 border-secondary ">
                <div class="col d-flex align-items-center mb-2">
                    <div class="col ">
                        <label for="" class="ml-3">N° d'ordre</label>
                        <input type="text" class="form-control form-control-lg ml-2" placeholder=""
                            name="numero" type_projet id="numero" aria-label=""
                            value="{{ $contrat->numero }}" disabled>
                    </div>
                    <div class="col">
                        <label for="">Date d'enregistrement</label>
                        <input type="date" class="form-control form-control-lg ml-2" placeholder=""
                            name="date_de_planification" id="date_de_planification"
                            value="{{ $contrat->date_de_planification }}" aria-label="Last name"
                            disabled>
                    </div>
                    <div class="col">
                        <label for="">Référence contrat</label>
                        <input type="text" class="form-control form-control-lg ml-2" placeholder=""
                            name="ref_contrat" id="ref_contrat" aria-label="First name" disabled
                            value="{{ $contrat->ref_contrat }}">
                    </div>
                </div>

            </div>
        </div>

        <div class="container border border-1 border-secondary mb-2">
            <div>
               <div class="row ">
                 <div class="col ">
                    <label for="" class="text-lg">Projet</label>
                     <input type="text" class="form-control form-control-lg ml-2" placeholder=""
                             aria-label="First name" disabled
                            value="{{ $contrat->activite->projet->titre_projet }}">
                   
                </div>
                <div class="col me-2">
                    <label for="" class="text-lg">Nature de l'activité</label>
                     <input type="text" class="form-control form-control-lg ml-2 " placeholder=""
                             aria-label="First name" disabled
                            value="{{ $contrat->activite->natureActivite->name }}">
                   
                </div>
               </div>

                <div class="col">

                    <label for="" class="text-lg">Titre de l'activité</label>
                    <input type="text" class="form-control form-control-lg mb-3"
                        value="{{ $contrat->activite->titre_activite }}"
                        placeholder="Titre de l'activité" name="titre_activite" disabled>
                </div>
                <div class="col">

                    <label for="" class="text-lg">Description de l'activité</label>
                    <textarea name="description" placeholder="" disabled class="form-control form-control-lg" value="{{ old('description') }}"
                        required id="description" cols="4" rows="3"> {{ $contrat->activite->description }}</textarea>

                </div>

            </div>
            <div class="row">
                <div class="col-6">
                    
                  <div class="col  text-lg">

                                <label for="name"> Durée du contrat (jrs)</label>
                                <input type="number" class="form-control form-control-lg"
                                    placeholder="" name="contrat" id="contrat" value="{{ $contrat->contrat }}"
                                    aria-label="Last name" disabled>




                            </div>
                </div>
                {{--  <div class="col-4">
                    <div class="col ">
                        <label for="" class="text-lg">Durée d'execution</label>
                        <input type="number" class="form-control form-control-lg  mb-3"
                            value="{{ $contrat->activite->dure_execution }}" placeholder=" Le nombre de jour"
                            name="dure_execution" disabled>
                    </div>
                </div>  --}}
                <div class="col-6">
                    <div class=" col">
                        <label for="" class="text-lg">Coût de l'activité</label>
                        <input type="number" class="form-control form-control-lg  mb-3"
                            value="{{ $contrat->activite->cout_activite }}" placeholder="coût global"
                            name="cout_activite" disabled>
                    </div>
                </div>
            </div>
        </div>

        <button type="button" class="btn btn-primary next float-end">Suivant</button>


        </div>
        <div class="step">

            <div class="border border-1 border-secondary">
                <div class="container text-lg ">
                  <div class="row g-3">
                    <div class="col-4">
                        <div>

                            <div class="col ">
                                <label for="" class="text-lg">Département</label>

                                    <input type="text" class="form-control form-control-lg"
                                    placeholder="" name="departement" id="localite"value="{{ $contrat->activite->departement }}"  disabled>

                            </div>

                            <div class="col ">
                                <label for="" class="text-lg">Ville</label>

                                    <input type="text" class="form-control form-control-lg"
                                    placeholder="" name="ville" id="localite" value="{{ $contrat->activite->ville }}" disabled>

                            </div>

                            
                             {{--  <div class="col">
                                <label for="name">Etat du chantier:</label>
                                <input type="text" class="form-control form-control-lg"
                                    placeholder="" name="etat_chantier"  value="{{ $contrat->activite->etat_chantier }}">
                            </div>  --}}






                        </div>

                    </div>
                    <div class="col-4">
                        <div>
                            <div class="col ">
                                <label for="" class="text-lg">Commune</label>

                                    <input type="text" class="form-control form-control-lg"
                                    placeholder="" name="commune" id="localite" value="{{ $contrat->activite->commune }}" disabled>

                            </div>

                              <div class="col">
                                <label for="name">Coordonnée GPS</label>
                                <input type="text" class="form-control form-control-lg"
                                    placeholder="" name="coordonnéeGPS" value="{{ $contrat->activite->coordonnéeGPS }}"
                                    id="coordonnéeGPS" disabled>
                            </div>
                           
                            {{--  <div class="col">
                                <label for="name">Année d'execution:</label>
                                <input type="text" class="form-control form-control-lg"
                                    placeholder="" name="annee_execution" id="entreprise" value="{{ $contrat->activite->annee_execution }}" >
                            </div>   --}}

                            {{--  <div class="col">
                                <label for="name">Arrondissement:</label>
                                <input type="text" class="form-control form-control-lg" value="{{ $contrat->localite }}"
                                    placeholder="" name="localite" id="localite" required>
                            </div>

                            <div class="col">
                                <label for="name">Entreprise:</label>
                                <input type="text" class="form-control form-control-lg"value="{{ $contrat->entreprise }}"
                                    placeholder="" name="entreprise" id="entreprise" >
                            </div>  --}}

                        </div>

                    </div>
                    <div class="col-4">

                        <div>


                            <div class="col">
                                <label for="name">Arrondissement</label>
                                <input type="text" class="form-control form-control-lg" value="{{ $contrat->activite->arrondissement }}"
                                    placeholder="" name="arrondissement" id="phone" disabled>
                            </div>
                            

                            <div class="col  text-lg">

                                <label for="name">Autres Informations</label>
                                <input type="text" class="form-control form-control-lg"
                                    placeholder="" 
                                    aria-label="Last name" disabled>




                            </div>
                            {{--  <div class="col ">
                                <label for="" class="text-lg">STATUS</label>

                                <select class="form-select mb-3 form-control-lg" name="status" >

                                    <option value="Entreprise" @if($contrat->status== 'Non démarré') selected @endif>Non démarré</option>
                                    <option value="En cours" @if($contrat->status == 'En cours') selected @endif>En cours</option>
                                    <option value="Terminer" @if($contrat->status == 'Terminer') selected @endif>Terminer</option>
                                    <option value="Suspendues" @if($contrat->status == 'Suspendues') selected @endif>Suspendues</option>
                                    <option value="Abandonnées" @if($contrat->status == 'Abandonnées') selected @endif>Abandonnées</option>



                                </select>
                            </div>  --}}
                        </div>
                    </div>



                </div>




                </div>
                <div class="container mb-2">
                    <div class="row">


                    </div>
                </div>
            </div>

            <legend>Informations conernant l'état de l'activité</legend>
            <div class="border border-1 border-secondary h-auto mt-5">

                <div class="row mb-2">
                    <div class="col-4">
                       

                        <div class="col text-lg">
                            <label for="name">Date de remise de site</label>
                            <input type="date" class="form-control form-control-lg" placeholder="" value="{{ $contrat->date_de_remise_site }}"
                                name="date_de_remise_site" id="date_de_remise_site" disabled>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="col text-lg">
                            <label for="name">Date de démarrage</label>
                            <input type="date" class="form-control form-control-lg" placeholder="" value="{{ $contrat->date_de_demarrage }}"
                                name="date_de_demarrage" id="date_de_demarrage" disabled>
                        </div>

                       
                    </div>
                    <div class="col-4">
                       

                        <div class="col text-lg">
                            <label for="name">Date probable d'achèvrement</label>
                            <input type="text" readonly class="form-control form-control-lg" value="{{ $contrat->date_achev_pro }}"
                                placeholder="" name="date_achev_pro" id="date_achev_pro" aria-label="">
                        </div>
                    </div>

                </div>
            </div>
            <legend>Informations conernant l'entreprise</legend>
            <div class="border border-1 border-secondary h-auto mt-5">

                <div class="row mb-2">
                    <div class="col-4">
                       
                        <div class="col text-lg">
                                <label for="" class="text-lg">Mode execution</label>
                                <input type="text" class="form-control form-control-lg" value="{{ $contrat->mode_execution }}"
                                    placeholder="" disabled>
                             
                            </div>
                    </div>
                    <div class="col-4">
                         <div class="col text-lg">
                                <label for="name">Entreprise</label>
                                <input type="text" class="form-control form-control-lg"
                                    placeholder="" name="entreprise" id="entreprise" value="{{ $contrat->entreprise }}" disabled >
                            </div>

                       
                    </div>
                    <div class="col-4">
                       
                         <div class="col text-lg">
                                <label for="name">Contact</label>
                                <input type="number" class="form-control form-control-lg"
                                    placeholder="" name="phone"  value="{{ $contrat->activite->phone_entreprise }}"  disabled>
                            </div>
                    </div>

                </div>
            </div>





            <button type="button" class="btn btn-primary next float-end mt-3 ml-3">Suivant</button>
            <button type="button" class="btn btn-secondary prev float-end mt-3 ml-3">Précédent</button>
            {{--  <a type="button" href="/contrats" class="btn btn-secondary float-end mt-3">Annuler</a>  --}}

        </div>
        <div class="step">
         <div class="container">
            <legend>Exécution physique et exécution financière</legend>
            <div class="row border border-1 border-secondary h-auto">
                <div class="col-6 mb-2">

                    <div class="text-lg ">
                        <div class="col">
                            <label for="name">Taux d'exécution physique (N):</label>
                          <input type="number" class="form-control form-control-lg" placeholder="" name="niv_exe_phy_date_visit" id="niv_exe_phy_date_visit" value="{{ $contrat->niv_exe_phy_date_visit}}">
                        </div>
                        <div class="col">
                            <label for="name">Taux d'exécution financière (N):</label>
                          <input type="number" class="form-control form-control-lg" placeholder="" name="niv_exe_fce_date_visit" id="niv_exe_fce_date_visit" value="{{ $contrat->niv_exe_fce_date_visit}}">
                        </div>

                    </div>

                </div>

                <div class="col-6 mb-2">

                    <div class="text-lg ">

                        <div class="col">
                            <label for="name">Montant décompte déja payé (FCFA):</label>
                          <input type="number" class="form-control form-control-lg" placeholder="" name="montant_desc_deja_pay" id="montant_desc_deja_pay" value="{{ $contrat->montant_desc_deja_pay}}">
                        </div>
                        <div class="col">
                            <label for="name">Montant décompte à payer (FCFA):</label>
                          <input type="number" class="form-control form-control-lg" placeholder="" name="montant_desc_a_pay" id="montant_desc_a_pay" value="{{ $contrat->montant_desc_a_pay}}">
                        </div>

                    </div>

                </div>

             </div>
             {{--  <legend>Attachement</legend>
             <div class="row text-lg border border-1 border-secondary h-auto">

                <div class="col-4 mb-2">
                    <div class="col">
                        <label for="name">Attachement n° 1:</label>
                      <input type="text" class="form-control form-control-lg" placeholder="" name="attachement1" id="attachement1" value="{{ $contrat->attachement1 }}">
                    </div>
                    <div class="col">
                        <label for="name">Date attachement n° 1:</label>
                      <input type="date" class="form-control form-control-lg" placeholder="" name="date_attach1" id="date_attach1" value="{{ $contrat->date_attach1 }}" >
                    </div>
                    <div class="col">
                        <label for="name">Montant attachement n° 1:</label>
                      <input type="number" class="form-control form-control-lg" placeholder="" name="montant_attach1" id="montant_attach1" value="{{ $contrat->montant_attach1 }}">
                    </div>
                    <div class="col">
                      <label for="name">Procès Verbal Attachement n°1:</label>
                      <div class="d-flex">

                        <input type="file" class="form-control form-control-lg" name="pv1" id="pv1">
                        @if($contrat->pv_attachement1)
                        <a href="{{asset('assets/uploads/PV1/'.$contrat->pv_attachement1)}}" target="_blank" class="text-blue text-center mt-3 ml-3"><i class="fas fa-eye"></i></a>
                        @endif
                   </div>


                    </div>
                </div>
                <div class="col-4 mb-2">
                    <div class="col">
                        <label for="name">Attachement n° 2:</label>
                        <input type="text" class="form-control form-control-lg" placeholder="" name="attachement2" id="attachement2" value="{{ $contrat->attachement2 }}">
                      </div>
                    <div class="col">
                        <label for="name">Date attachement n° 2:</label>
                      <input type="date" class="form-control form-control-lg" placeholder="" name="date_attach2" id="date_attach2"  value="{{ $contrat->date_attach2 }}">
                    </div>
                    <div class="col">
                        <label for="name">Montant attachement n° 2:</label>
                      <input type="number" class="form-control form-control-lg" placeholder="" name="montant_attach2" id="montant_attach2"  value="{{ $contrat->montant_attach2 }}">
                    </div>
                    <div class="col">
                        <label for="name">Procès Verbal Attachement n°2:</label>
                        <div class="d-flex">

                            <input type="file" class="form-control form-control-lg" name="pv2" id="pv2">
                            @if($contrat->pv_attachement2)
                            <a href="{{asset('assets/uploads/PV2/'.$contrat->pv_attachement2)}}" target="_blank" class="text-blue text-center mt-3 ml-3"><i class="fas fa-eye"></i></a>
                            @endif
                       </div>

                    </div>
                </div>
                <div class="col-4 mb-2">
                    <div class="col">
                        <label for="name">Attachement n° 3:</label>
                      <input type="number" class="form-control form-control-lg" placeholder="" name="attachement3" id="attachement3"  value="{{ $contrat->attachement3 }}">
                    </div>
                    <div class="col">
                        <label for="name">Date attachement n° 3:</label>
                      <input type="text" class="form-control form-control-lg" placeholder="" name="date_attach3" id="date_attach3"  value="{{ $contrat->date_attach3 }}">
                    </div>
                    <div class="col">
                        <label for="name">Montant attachement n° 3:</label>
                      <input type="text" class="form-control form-control-lg" placeholder="" name="montant_attach3" id="montant_attach3"  value="{{ $contrat->montant_attach3 }}">
                    </div>
                    <div class="col">
                        <label for="name"> Procès Verbal Attachement n°3:</label>
                        <div class="d-flex">

                            <input type="file" class="form-control form-control-lg" name="pv3" id="pv3">
                            @if($contrat->pv_attachement3)
                            <a href="{{asset('assets/uploads/PV3/'.$contrat->pv_attachement3)}}" target="_blank" class="text-blue text-center mt-3 ml-3"><i class="fas fa-eye"></i></a>
                            @endif
                       </div>

                    </div>
                </div>
            </div>  --}}
            <legend>Attachement</legend>
            <div class="text-lg border border-1 border-secondary p-3">
                <div class="d-flex flex-wrap gap-3 align-items-center">
                    <!-- Attachement 1 -->
                    <div class="d-flex flex-column align-items-center p-2 border rounded">
                        <input type="radio" name="attachement_select"value="attachement1"  id="radio_attach1" onclick="toggleFields(1)">
                        <label for="radio_attach1">Attachement n° 1</label>
                       
                        <input type="date" class="form-control mb-1" name="date_attach1" id="date_attach1" value="{{ $contrat->date_attach1 }}" disabled>
                        <input type="number" class="form-control mb-1" name="montant_attach1" id="montant_attach1" value="{{ $contrat->montant_attach1 }}" placeholder="montant" disabled>
                        <input type="file" class="form-control mb-1" name="pv1" id="pv1" disabled>
                        @if($contrat->pv_attachement1)
                            <a href="{{asset('assets/uploads/PV1/'.$contrat->pv_attachement1)}}" target="_blank" class="text-blue"><i class="fas fa-eye"></i></a>
                        @endif
                    </div>
            
                    <!-- Attachement 2 -->
                    <div class="d-flex flex-column align-items-center p-2 border rounded">
                        <input type="radio" name="attachement_select" value="attachement2"  id="radio_attach2" onclick="toggleFields(2)">
                        <label for="radio_attach2">Attachement n° 2</label>
                      
                        <input type="date" class="form-control mb-1" name="date_attach2" id="date_attach2" value="{{ $contrat->date_attach2 }}" disabled>
                        <input type="number" class="form-control mb-1" name="montant_attach2" id="montant_attach2" value="{{ $contrat->montant_attach2 }}"placeholder="montant" disabled>
                        <input type="file" class="form-control mb-1" name="pv2" id="pv2" disabled>
                        @if($contrat->pv_attachement2)
                            <a href="{{asset('assets/uploads/PV2/'.$contrat->pv_attachement2)}}" target="_blank" class="text-blue"><i class="fas fa-eye"></i></a>
                        @endif
                    </div>
            
                    <!-- Attachement 3 -->
                    <div class="d-flex flex-column align-items-center p-2 border rounded">
                        <input type="radio" name="attachement_select" value="attachement3"  id="radio_attach3" onclick="toggleFields(3)">
                        <label for="radio_attach3">Attachement n° 3</label>
                       
                        <input type="date" class="form-control mb-1" name="date_attach3" id="date_attach3" value="{{ $contrat->date_attach3 }}" disabled>
                        <input type="number" class="form-control mb-1" name="montant_attach3" id="montant_attach3" value="{{ $contrat->montant_attach3 }}" placeholder="montant" disabled>
                        <input type="file" class="form-control mb-1 " name="pv3" id="pv3" disabled>
                        @if($contrat->pv_attachement3)
                            <a href="{{asset('assets/uploads/PV3/'.$contrat->pv_attachement3)}}" target="_blank" class="text-blue"><i class="fas fa-eye"></i></a>
                        @endif
                    </div>
                </div>
            </div>
            
           
            

         </div>



          <div class="float-end mt-2">
            <button type="button" class="btn btn-secondary prev">Précédent</button>
          <button type="button" class="btn btn-primary next">Suivant</button>
          </div>
        </div>
        <div class="step">
            <div class="container ">
                <div class="row text-lg border border-1 border-secondary h-auto mt-1 ">

                    <div class="col-4 mb-3">
                       <div> <label for="name"> Date réception technique</label>
                        <input type="date" class="form-control form-control-lg" placeholder="" name="date_recept_tech" id="date_recept_tech" value="{{ $contrat->date_recept_tech }}" aria-label="First name"></div>

                        <div class="">
                           <div> <label for="name">Procès Verbal réception technique</label>
                            <div class="d-flex">

                                <input type="file" class="form-control form-control-lg" name="pv4" id="pv4">
                                @if($contrat->pv4_reception_technique)
                                <a href="{{asset('assets/uploads/PV4/'.$contrat->pv4_reception_technique)}}" target="_blank" class="text-blue text-center mt-3 ml-3"><i class="fas fa-eye"></i></a>
                                @endif
                           </div>
                        </div>

                        </div>
                    </div>
                    <div class="col-4 mb-3">
                        <label for="name">Date réception provisoire</label>
                      <input type="date" class="form-control form-control-lg" placeholder="" name="date_recept_prov_chantier"value="{{ $contrat->date_recept_prov_chantier }}" id="date_recept_prov_chantier" >
                      <div class="col">
                        <label for="name">Procès Verbal réception provisoire</label>
                        <div class="d-flex">

                            <input type="file" class="form-control form-control-lg" name="pv5" id="pv5">
                            @if($contrat->pv5_reception_provisoire)
                            <a href="{{asset('assets/uploads/PV5/'.$contrat->pv5_reception_provisoire)}}" target="_blank" class="text-blue text-center mt-3 ml-3"><i class="fas fa-eye"></i></a>
                            @endif
                       </div>

                    </div>
                    </div>
                    <div class="col-4 mb-3">
                        <label for="name">Date réception définitive</label>
                      <input type="date" class="form-control form-control-lg" placeholder="" name="date_recept_def_chantier" value="{{ $contrat->date_recept_def_chantier }}" id="date_recept_def_chantier">

                  {{--  <div class="col">
                    <label for="name">Procès Verbal réception definitive:</label>
                  <input type="file" class="form-control form-control-lg" placeholder="" name="pv6" id="pv6" value="{{ $contrat->pv6 }}">
                </div>  --}}
                {{--  <div class="col">
                    <label for="pv6">Procès Verbal réception definitive:</label>
                    <div class="d-flex">
                        @if($contrat->pv6)
                            <a href="{{ $contrat->pv6 }}" target="_blank" class="text-green-500 me-2"><i class="fas fa-eye"></i></a>
                        @endif
                        <input type="file" class="form-control form-control-lg" name="pv6" id="pv6">
                    </div>
                </div>  --}}
                <div class="col">
                    <label for="pv6">Procès Verbal réception définitive</label>
                    <div class="d-flex">

                         <input type="file" class="form-control form-control-lg" name="pv6" id="pv6">
                         @if($contrat->pv6_reception_definitive)
                         <a href="{{asset('assets/uploads/PV6/'.$contrat->pv6_reception_definitive)}}" target="_blank" class="text-blue text-center mt-3 ml-3"><i class="fas fa-eye"></i></a>
                         @endif
                    </div>
                </div>


                    </div>


            </div>
                <div class="row border border-1 border-secondary h-auto mt-2">
                    <div class="col-6 text-lg">

                        <div class="col">
                            <label for="name">Qualité du travaux</label>
                          <input type="text" class="form-control form-control-lg" placeholder="" name="qualite_travaux" id="qualite_travaux" value="{{ $contrat->qualite_travaux }}">
                        </div>
                        {{--  <div class="col">
                            <label for="name">Etat du chantier:</label>
                          <input type="text" class="form-control form-control-lg" placeholder="" name="etat_chantier" id="etat_chantier"  value="{{ $contrat->etat_chantier }}">
                        </div>  --}}
                        <div class="col ">
                            <label for="name">Date achèvrement réel</label>
                          <input type="date" class="form-control form-control-lg" placeholder="" name="date_achev_reel" id="date_achev_reel" value="{{ $contrat->date_achev_reel }}" aria-label="Last name">
                        </div>



                    </div>
                    <div class="col-6">
                        <div class="text-lg">

                            <div class="col">
                                <label for="name">Durée retard accus</label>
                              <input type="text" class="form-control form-control-lg" placeholder="" name="duree_ret_accus" id="duree_ret_accus"  value="{{ $contrat->duree_ret_accus }}">
                            </div>

                              <div class="col">
                                <label for="name">Approbation sur le chantier</label>
                              <input type="number" class="form-control form-control-lg" placeholder="" name="appro_achantier" id="appro_achantier" value="{{ $contrat->appro_achantier }}">
                            </div>
                            

                        </div>

                    </div>
                    
                    <div class="col text-lg mb-3">
                        <label for="name">Cause du retard</label>
                        <textarea name="cause_retard"  class="form-control form-control-lg" id="cause_retard" cols="4" rows="4"></textarea>
    
                    </div>
                </div>

                  

            </div>

            <div class="float-end mt-2">
              <button type="button" class="btn btn-secondary prev">Précédent</button>
            <button type="button" class="btn btn-primary next">Suivant</button>
            </div>
          </div>
          <div class="step">


            <div class=" text-lg border border-1 border-secondary h-auto mt-2">
                 <div class="col text-lg mb-2">
                        <label for="name">Difficultés rencontrée</label>
                        <textarea name="difficulte"  class="form-control form-control-lg" id="difficulte" cols="4" rows="3">{{ $contrat->difficulte }}</textarea>
    
                    </div>
                 <div class="col text-lg mb-2">
                        <label for="name">Solution</label>
                        <textarea   class="form-control form-control-lg" cols="4" rows="3"name="solution" id="solution"  >{{ $contrat->solution }}</textarea>
    
                    </div>
               <div class="row g-3">
                 <div class="col-4 mb-3">
                  
                    <div class="col">
                        <label for="name">Personne en charge</label>
                        <input type="text" class="form-control form-control-lg" placeholder="" name="personne_en_charge" id="personne_en_charge"  value="{{ $contrat->personne_en_charge }}">

                      </div>



                </div>
                <div class="col-4">
                   

                    <div class="col">
                        <label for="name">Nbr d'employer temporaire</label>
                      <input type="text" class="form-control form-control-lg" placeholder="" name="nbre_empl_temp"  id="nbre_empl_temp"  value="{{ $contrat->nbre_empl_temp }}">
                    </div>
                     

                </div>
                <div class="col-4">
                   

                    
                      <div class="col">
                          <label for="name">Nbr d'employer permanent</label>
                        <input type="text" class="form-control form-control-lg" placeholder="" name="nbre_empl_per" id="nbre_empl_per"  value="{{ $contrat->nbre_empl_per }}">
                      </div>

                </div>
               </div>



              </div>



            <div class="float-end mt-2">
                <button type="button" class="btn btn-secondary prev">Précédent</button>
                <button type="submit" class="btn btn-success">Mettre à jour</button>
            </div>
          </div>

      </form>
    </div>
  </div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
  $(document).ready(function(){
    var currentStep = 0;
    var steps = $(".step");

    function showStep(index) {
      steps.eq(index).show().siblings(".step").hide();
    }

    showStep(currentStep);

    $(".next").click(function() {
      currentStep++;
      showStep(currentStep);
    });

    $(".prev").click(function() {
      currentStep--;
      showStep(currentStep);
    });

    $("#multi-step-form").submit(function(e) {
    //  e.preventDefault();
      // You can handle form submission here
      //alert("Formulaire soumis avec succès!");
    });
  });
  {{--  document.querySelectorAll('input[name="demarre"]').forEach((radio) => {
    radio.addEventListener('change', function() {
      const champSaisie = document.getElementById('date_de_remise_site');
      const champSaisier = document.getElementById('date_de_demarrage');
      if (this.value === 'oui') {
        champSaisie.disabled = false;
        champSaisier.disabled = false;
      } else {
        champSaisie.disabled = true;
        champSaisier.disabled = true;
      }
    });
  });  --}}
  document.getElementById('contrat').addEventListener('input', function() {
    // Récupérer le nombre de jours saisi par l'utilisateur
    const nombreJours = parseInt(this.value);

    // Vérifier si le nombre de jours est valide
    if (!isNaN(nombreJours) && nombreJours >= 0) {
      // Créer une nouvelle date en ajoutant le nombre de jours à la date actuelle
      const dateResultante = new Date();
      dateResultante.setDate(dateResultante.getDate() + nombreJours);

      // Formatter la date résultante au format "YYYY-MM-DD"
      const formattedDate = dateResultante.toISOString().split('T')[0];

      // Mettre à jour la valeur du champ de la date résultante
      document.getElementById('date_achev_pro').value = formattedDate;
    } else {
      // Effacer le champ de la date résultante si le nombre de jours est invalide
      document.getElementById('date_achev_pro').value = '';
    }
  });
</script>
<script>
    function toggleFields(num) {
        for (let i = 1; i <= 3; i++) {
            let disabled = i !== num;
            
            document.getElementById('date_attach' + i).disabled = disabled;
            document.getElementById('montant_attach' + i).disabled = disabled;
            document.getElementById('pv' + i).disabled = disabled;
        }
    }
</script>
@endsection
