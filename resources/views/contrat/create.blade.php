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
                <h3 class="card-title text-uppercase ">enregistrement d'une nouvelle activité </h3>
                {{--  <a type="button" href="{{ url('contrats-create') }}"
                    class="btn btn-primary float-end">
                    Enregistrer un contrat
                </a>  --}}
            </div>




        </div>
        <div class="container">
            <div class="row">
                <div class="">
                    <h2></h2>
                    <form id="multi-step-form"action="{{ url('contrats-store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="step">

                            {{--  <h2>Enregistrement d'une nouvelle activité</h2>  --}}
                            <div class="container">
                                <div class="row text-lg border border-1 border-secondary ">
                                    <div class="col d-flex align-items-center mb-2">
                                        <div class="col-2 ">
                                            <label for="" class="ml-3">N° d'ordre</label>
                                            <input type="text" class="form-control form-control-lg ml-2" placeholder=""
                                                name="numero" value="{{ $nombre }}" id="numero" aria-label=""
                                                disabled>
                                        </div>
                                        {{--  <div class="col-3">
                                            <label for="">Date d'enreg:</label>
                                            <input type="date" class="form-control form-control-lg ml-2" placeholder=""
                                                name="date_de_planification" id="date_de_planification"
                                                aria-label="Last name" required>
                                        </div>  --}}
                                        <div class="col-2">
                                            <label for="">Date d'Enreg.</label>
                                            <input type="date" class="form-control form-control-lg ml-2" name="date_de_planification" id="date_de_planification"
                                                value="{{ now()->format('Y-m-d') }}" required>
                                        </div>
                                        <div class="col ">
                                        <label for="" class="text-lg">Projet</label>

                                        <div class=" d-flex align-items-center">
                                            <select class="form-select me-3 form-control-lg text-lg" name="projet_id" required>
                                                <option value="">Selectionnez un projet</option>

                                                @foreach ($projet as $key => $status)
                                                    <option class="" value="{{ $status->id }}">
                                                        {{ $status->titre_projet }}</option>
                                                @endforeach

                                            </select>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#myModalProjet">
                                                Ajouter

                                            </button>
                                        </div>
                                    </div>
                                      
                                    </div>

                                </div>
                            </div>

                            <div class="container border border-1 border-secondary mb-2">
                                <div>
                                     <div class=" col">
                                            <label for="" class="text-lg">Nature de l'activité</label>
                                            <div class=" d-flex align-items-center">


                                                <select class="form-select form-control-lg me-3 text-lg" name="nature_activite_id" required>
                                                    <option value="">La nature activité</option>

                                                    @foreach ($nature_activite as $key => $status)
                                                        <option class="" value="{{ $status->id }}">
                                                            {{ $status->name }}</option>
                                                    @endforeach

                                                </select>

                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#myModal">
                                                    Ajouter

                                                </button>
                                            </div>
                                        </div>
                                    

                                    <div class="col">

                                        <label for="" class="text-lg">Titre de l'activité</label>
                                        <input type="text" class="form-control form-control-lg mb-3"
                                            value="{{ old('titre_activite') }}" placeholder="Titre de l'activité"
                                            name="titre_activite" required>
                                    </div>
                                    <div class="col">

                                        <label for="" class="text-lg">Description de l'activité</label>
                                        <textarea name="description" placeholder="" class="form-control form-control-lg" value="{{ old('description') }}" required
                                             id="description" cols="4" rows="3"></textarea>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6  text-lg">

                                                        <label for="name"> Durée du contrat (jrs)</label>
                                                        <input type="number" class="form-control form-control-lg"
                                                            placeholder="" name="contrat" value="0" id="contrat"
                                                            aria-label="Last name" required>




                                                    </div>
                                    
                                    {{--  <div class="col-4">
                                        <div class="col ">
                                            <label for="" class="text-lg">Durée d'execution</label>
                                            <input type="text" class="form-control form-control-lg  mb-3"
                                                value="{{ old('dure_execution') }}" placeholder=""
                                                name="dure_execution" required>
                                        </div>
                                    </div>  --}}
                                    <div class="col-6">
                                        <div class=" col">
                                            <label for="" class="text-lg">Coût de l'activité</label>
                                            <input type="number" class="form-control form-control-lg  mb-3"
                                                value="{{ old('cout_activite') }}" placeholder="cout global"
                                                name="cout_activite" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-primary next float-end">Suivant</button>


                        </div>
                        <div class="step">
                            {{--  <h2>Suite de l'enregistrement</h2>  --}}
                            <div class="border border-1 border-secondary">
                                <div class="container text-lg ">
                                    <div class="row g-3">
                                        <div class="col-4">
                                            <div>

                                                <div class="col ">
                                                    <label for="" class="text-lg">Département</label>

                                                        <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="departement" id="localite" required>
                                                    {{--  <div class=" d-flex align-items-center">
                                                        <select class="form-select me-3 form-control-lg text-lg" name="commune_id">
                                                            <option value="">un commune</option>

                                                            @foreach ($commune as $key => $status)
                                                                <option class="" value="{{ $status->id }}">
                                                                    {{ $status->name }}</option>
                                                            @endforeach

                                                        </select>

                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#myModalCommune">
                                                            Ajouter

                                                        </button>
                                                    </div>  --}}
                                                </div>

                                                <div class="col ">
                                                    <label for="" class="text-lg">Ville</label>

                                                        <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="ville" id="localite" required>
                                                    {{--  <div class=" d-flex align-items-center">
                                                        <select class="form-select me-3 form-control-lg text-lg" name="commune_id">
                                                            <option value="">un commune</option>

                                                            @foreach ($commune as $key => $status)
                                                                <option class="" value="{{ $status->id }}">
                                                                    {{ $status->name }}</option>
                                                            @endforeach

                                                        </select>

                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#myModalCommune">
                                                            Ajouter

                                                        </button>
                                                    </div>  --}}
                                                </div>

                                                 



                                                {{--  <div class=" col">
                                                    <label for="" class="text-lg">Entreprise</label>

                                                    <div class=" d-flex align-items-center">
                                                        <select class="form-select me-3 form-control-lg" name="entreprise_id">
                                                            <option value="">Selectionnez un en entreprise</option>

                                                            @foreach ($entreprise as $key => $status)
                                                                <option class="" value="{{ $status->id }}">
                                                                    {{ $status->name }}</option>
                                                            @endforeach

                                                        </select>

                                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                            data-bs-target="#myModalEntreprise">
                                                            Ajouter

                                                        </button>
                                                    </div>
                                                </div>  --}}

                                            </div>

                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <div class="col ">
                                                    <label for="" class="text-lg">Commune</label>

                                                        <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="commune" id="localite" required>

                                                </div>

                                                  <div class="col">
                                                    <label for="name">Coordonnée GPS</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="coordonnéeGPS" 
                                                        id="coordonnéeGPS" required>
                                                </div>
                                                








                                            </div>

                                        </div>
                                        <div class="col-4">
                                            <div class="col">
                                                    <label for="name">Arrondissement</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="arrondissement" id="localite" required>
                                                </div>
                                            <div>
                                              <div class="col">
                                                    <label for="name">Autres Informations</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="autres" 
                                                        id="coordonnéeGPS" required>
                                                </div>
                                                    

                                            </div>
                                        </div>



                                    </div>
                                </div>
                                <div class="container mb-2">
                                    <div class="row">
                                        <div class="col">






                                        </div>

                                    </div>
                                </div>
                            </div>

                            <legend>Informations conernant l'etat de l'activité</legend>
                            <div class="border border-1 border-secondary h-auto mt-5">

                                <div class="row mb-2">
                                    <div class="col-6 ">
                                        <div class="col text-lg mb-3">
                                            <label for="name">Démarrée (Oui/Non)</label><br>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="demarre"
                                                    id="ouiRadio" value="oui">
                                                <label class="form-check-label" for="ouiRadio">
                                                    Oui
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" value="non"
                                                    name="demarre" id="nonRadio" checked>
                                                <label class="form-check-label" for="nonRadio">
                                                    Non
                                                </label>
                                            </div>

                                            {{--  <input type="text" class="form-control form-control-lg" placeholder="" name="demarre"
                                                    id="demarre" aria-label="Last name">  --}}
                                        </div>

                                        <div class="col text-lg">
                                            <label for="name">Date de remise de site</label>
                                            <input type="date" class="form-control form-control-lg" placeholder=""
                                                name="date_de_remise_site" id="date_de_remise_site" disabled>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col text-lg">
                                            <label for="name">Date de démarrage</label>
                                            <input type="date" class="form-control form-control-lg" placeholder=""
                                                name="date_de_demarrage" id="date_de_demarrage" disabled>
                                        </div>

                                        <div class="col text-lg">
                                            <label for="name">Date probable d'achèvrement</label>
                                            <input type="text" readonly class="form-control form-control-lg"
                                                placeholder="" name="date_achev_pro" id="date_achev_pro" aria-label="">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <legend>Informations conernant l'entreprise</legend>
                            <div class="border border-1 border-secondary h-auto mt-5">

                                <div class="row mb-2">
                                    <div class="col-4">
                                         <div class="col ">
                                                    <label for="" class="text-lg">Mode d'exécution</label>

                                                    <select class="form-select form-control-lg text-lg" name="mode_execution" id="mode_executions" onchange="activerChamps()">


                                                        <option value="Interne">Interne</option>
                                                        <option value="Entreprise">Entreprise</option>


                                                    </select>
                                                </div>
                                    </div>
                                    <div class="col-4">
                                       <div class="col text-lg">
                                                    <label for="name">Entreprise</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="entreprise" id="entreprise" disabled >
                                                </div>
                                    </div>
                                    <div class="col-4 text-lg">
                                       <div class="col">
                                                    <label for="name">Contact</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="phone" id="phone" disabled>
                                                </div>
                                    </div>

                                </div>
                            </div>





                            <button type="submit" class="btn btn-success float-end mt-3 ml-3">Enregistrer</button>
                            <button type="button" class="btn btn-secondary prev float-end mt-3 ml-3">Précédent</button>
                            {{--  <a type="button" href="/contrats" class="btn btn-secondary float-end mt-3">Annuler</a>  --}}

                        </div>
                        {{--
                                 <div class="step">
                                <h2>Étape 2</h2>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name">Information complémentaire sur la localite:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="info_compl_localite" id="info_compl_localite" aria-label="First name">
                                    </div>

                                    <div class="col">
                                        <label for="name">Date achèvrement réel:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="date_achev_reel" id="date_achev_reel" aria-label="Last name">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name"> Date réception technique:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="date_recept_tech" id="date_recept_tech" aria-label="First name">
                                    </div>
                                    <div class="col">
                                        <label for="name">Procès Verbal n°4:</label>
                                        <input type="file" class="form-control form-control-lg" placeholder=""
                                            name="pv4" id="pv4">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name">Date de réception du procès verbal du chantier:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="date_recept_prov_chantier" id="date_recept_prov_chantier">
                                    </div>
                                    <div class="col">
                                        <label for="name">Procès Verbal n°5:</label>
                                        <input type="file" class="form-control form-control-lg" placeholder=""
                                            name="pv5" id="pv5">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name">Date de réception du def chantier:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="date_recept_def_chantier" id="date_recept_def_chantier">
                                    </div>
                                    <div class="col">
                                        <label for="name">Procès Verbal n°6:</label>
                                        <input type="file" class="form-control form-control-lg" placeholder=""
                                            name="pv6" id="pv6">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name">Durée retard accus:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="duree_ret_accus" id="duree_ret_accus">
                                    </div>
                                    <div class="col">
                                        <label for="name">Cause du retard:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="cause_retard" id="cause_retard">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col">
                                        <label for="name">Solution:</label>
                                        <input type="number" class="form-control form-control-lg" placeholder=""
                                            name="solution" id="solution">
                                    </div>
                                    <div class="col">
                                        <label for="name">Approbation sur le chantier:</label>
                                        <input type="number" class="form-control form-control-lg" placeholder=""
                                            name="appro_achantier" id="appro_achantier">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name">Niveau d'execution physique date visit:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="niv_exe_phy_date_visit" id="niv_exe_phy_date_visit">
                                    </div>
                                    <div class="col">
                                        <label for="name">Niveau d'execution fce date visit:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="niv_exe_fce_date_visit" id="niv_exe_fce_date_visit">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col">
                                        <label for="name">Montant déja payé:</label>
                                        <input type="number" class="form-control form-control-lg" placeholder=""
                                            name="montant_desc_deja_pay" id="montant_desc_deja_pay">
                                    </div>
                                    <div class="col">
                                        <label for="name">Montant a payé:</label>
                                        <input type="number" class="form-control form-control-lg" placeholder=""
                                            name="montant_desc_a_pay" id="montant_desc_a_pay">
                                    </div>
                                </div>



                                <div class="float-end">
                                    <button type="button" class="btn btn-secondary prev">Précédent</button>
                                    <button type="button" class="btn btn-primary next">Suivant</button>
                                </div>
                            </div>
                            <div class="step">
                                <h2>Étape 3</h2>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name">Qualité travaux:</label>
                                        <input type="number" class="form-control form-control-lg" placeholder=""
                                            name="qualite_travaux" id="qualite_travaux" aria-label="">
                                    </div>
                                    <div class="col">
                                        <label for="name">Difficultés:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="difficulte" id="difficulte" aria-label="Last name">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name"> Autre difficulté:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="autre_diff" id="autre_diff" aria-label="First name">
                                    </div>
                                    <div class="col">
                                        <label for="name">Attachement n° 1:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="attachement1" id="attachement1">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name">Date attachement n° 1:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="date_attach1" id="date_attach1">
                                    </div>
                                    <div class="col">
                                        <label for="name">Montant attachement n° 1:</label>
                                        <input type="number" class="form-control form-control-lg" placeholder=""
                                            name="montant_attach1" id="montant_attach1" aria-label="Last name">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name">Procès Verbal n°1:</label>
                                        <input type="file" class="form-control form-control-lg" placeholder=""
                                            name="pv1" id="pv1">

                                    </div>
                                    <div class="col">
                                        <label for="name">Attachement n° 2:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="attachement2" id="attachement2">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name">Date attachement n° 2:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="date_attach2" id="date_attach2">
                                    </div>
                                    <div class="col">
                                        <label for="name">Montant attachement n° 2:</label>
                                        <input type="number" class="form-control form-control-lg" placeholder=""
                                            name="montant_attach2" id="montant_attach2">
                                    </div>
                                </div>
                                <div class="row g-3 mb-3">
                                    <div class="col">
                                        <label for="name">Procès Verbal n°2:</label>
                                        <input type="file" class="form-control form-control-lg" placeholder=""
                                            name="pv2" id="pv2">
                                    </div>
                                    <div class="col">
                                        <label for="name">Attachement n° 3:</label>
                                        <input type="number" class="form-control form-control-lg" placeholder=""
                                            name="attachement3" id="attachement3">
                                    </div>
                                </div>
                                <div class="float-end">
                                    <button type="button" class="btn btn-secondary prev">Précédent</button>
                                    <button type="button" class="btn btn-primary next">Suivant</button>
                                </div>
                            </div>
                            <div class="step">
                                <h2>Étape 4</h2>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name">Date attachement n° 3:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="date_attach3" id="date_attach3" aria-label="">
                                    </div>
                                    <div class="col">
                                        <label for="name">Montant attachement n° 3:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="montant_attach3" id="montant_attach3" aria-label="Last name">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name"> Procès Verbal n°3:</label>
                                        <input type="file" class="form-control form-control-lg" placeholder=""
                                            name="pv3" id="pv3" aria-label="First name">
                                    </div>
                                    <div class="col">
                                        <label for="name">Nombre d'employer permanent:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="nbre_empl_per" id="nbre_empl_per">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name">Nombre d'employer temporaire:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="nbre_empl_temp" id="nbre_empl_temp">
                                    </div>
                                    <div class="col">
                                        <label for="name">Annee execution:</label>
                                        <input type="number" class="form-control form-control-lg" placeholder=""
                                            name="annee_execution" id="annee_execution" aria-label="Last name">
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name">Personne en charge:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="personne_en_charge" id="personne_en_charge">

                                    </div>

                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <label for="name">Etat du chantier:</label>
                                        <input type="text" class="form-control form-control-lg" placeholder=""
                                            name="etat_chantier" id="etat_chantier">
                                    </div>

                                </div>
                                <div class="row g-3 mb-3">

                                    <div class="col">
                                        <label for="name">Mode execution:</label>
                                        <input type="number" class="form-control form-control-lg" placeholder=""
                                            name="mode_execution">
                                    </div>
                                </div>
                                <div class="float-end">
                                    <button type="button" class="btn btn-secondary prev">Précédent</button>
                                    <button type="submit" class="btn btn-success">Envoyer</button>
                                </div>
                            </div>  --}}

                    </form>
                    <div class="modal" id="myModal">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Ajouter une nature activité</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">


                                    <form class="" action="{{ url('nature-activites-stores') }}" method="POST">
                                        @csrf
                                        <div class="input-group ">
                                            <label for=""></label>
                                            <input type="text" class="form-control form-control-lg"
                                                value="{{ old('name') }}" placeholder="Nom de la nature activité"
                                                name="name" required>
                                        </div>

                                </div>



                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" style="text-align:center"
                                        class="btn btn-success ">Envoyer</button>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal" id="myModalEntreprise">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Ajouter une entreprise</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">


                                    <form class="" action="{{ url('entreprises-stores') }}" method="POST">
                                        @csrf
                                        <div class=" ">
                                            <label for=""> Nom de l 'entreprise </label>
                                            <input type="text" class="form-control mb-2 form-control-lg "
                                                value="{{ old('name') }}" placeholder="Nom de l'entreprise"
                                                name="name" required>
                                        </div>

                                        <div class=" ">
                                            <label for="">Téléphone de l'entreprise </label>
                                            <input type="number" class="form-control  form-control-lg"
                                                value="{{ old('phone') }}" placeholder="Téléphone de l'entreprise"
                                                name="phone" required>
                                        </div>

                                </div>



                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" style="text-align:center"
                                        class="btn btn-success ">Envoyer</button>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal" id="myModalProjet">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Ajouter un projet </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">


                                    <form class="" action="{{ url('projets-stores') }}" method="POST">
                                        @csrf
                                        <div class=" ">
                                            <label for="" class="text-lg">Titre du projet</label>
                                            <input type="text" class="form-control form-control-lg mb-3"
                                                value="{{ old('titre_projet') }}" placeholder="Titre du projet"
                                                name="titre_projet" required>
                                        </div>
                                        <div class=" ">
                                            <label for="" class="text-lg">Intituler du projet</label>
                                            <input type="text" class="form-control form-control-lg  mb-3"
                                                value="{{ old('intituler_projet') }}" placeholder="Intituler du projet"
                                                name="intituler_projet" required>
                                        </div>
                                        <div class=" ">
                                            <label for="" class="text-lg">Cout global du projet</label>
                                            <input type="number" class="form-control form-control-lg  mb-3"
                                                value="{{ old('cout_global') }}" placeholder="cout global"
                                                name="cout_global" required>
                                        </div>

                                        <div class=" ">
                                            <label for="" class="text-lg"> Type projet</label>

                                            <select class="form-select mb-3 form-control-lg" name="type_projet_id">
                                                <option value="">Selectionnez un type projet</option>

                                                @foreach ($type_projet as $key => $status)
                                                    <option class="" value="{{ $status->id }}">
                                                        {{ $status->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>

                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" style="text-align:center"
                                        class="btn btn-success ">Envoyer</button>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>


                    <div class="modal" id="myModalCommune">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Ajouter une commune </h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">


                                    <form class="" action="{{ url('communes-stores') }}" method="POST">
                                        @csrf
                                        <div class=" ">
                                            <label for="" class="text-lg"> Nom de la commune</label>
                                            <input type="text" class="form-control form-control-lg"
                                                value="{{ old('name') }}" placeholder="Nom de la commune"
                                                name="name" required>
                                        </div>

                                        <div class=" ">
                                            <label for="" class="text-lg"> Département</label>

                                            <select class="form-select mb-3 form-control-lg" name="departement_id"
                                                required>
                                                <option>Selectionnez un departement</option>

                                                @foreach ($departement as $key => $status)
                                                    <option class="" value="{{ $status->id }}">
                                                        {{ $status->name }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>

                                </div>
                                <!-- Modal footer -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" style="text-align:center"
                                        class="btn btn-success ">Envoyer</button>

                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>
    </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
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
        document.querySelectorAll('input[name="demarre"]').forEach((radio) => {
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
        });
         function activerChamps() {
            var selectValue = document.getElementById("mode_executions").value;
            var champsEntreprise = document.getElementById("entreprise");
            var champsPhone = document.getElementById("phone");

            if (selectValue === "Entreprise") {
                champsEntreprise.disabled = false;
                champsPhone.disabled = false;
            } else {
                champsEntreprise.disabled = true;
                champsPhone.disabled = true;
            }
        };
        //document.getElementById('contrat').addEventListener('input', function() {
          
           // const nombreJours = parseInt(this.value);
           // const dateDemarrageInput = document.getElementById('date_de_demarrage');
          
        //if (!dateDemarrageInput.value|| isNaN(nombreJours) || nombreJours < 0 ) {
          //  dateAchevInput.value = '';
          //  return;
        //}

      
            //if (!isNaN(nombreJours) && nombreJours >= 0) {
            
              //  const dateResultante = new Date(dateDemarrageInput.value);
               // dateResultante.setDate(dateResultante.getDate() + nombreJours);

                
               // const formattedDate = dateResultante.toISOString().split('T')[0];

                
              //  document.getElementById('date_achev_pro').value = formattedDate;
            //} else {
                
           //     document.getElementById('date_achev_pro').value = '';
           // }
        //});
        document.getElementById('contrat').addEventListener('input', function() {
            mettreAJourDateAchevement();
        });
        
        document.getElementById('date_de_demarrage').addEventListener('input', function() {
            mettreAJourDateAchevement();
        });
        
        function mettreAJourDateAchevement() {
            const nombreJours = parseInt(document.getElementById('contrat').value);
            const dateDemarrageInput = document.getElementById('date_de_demarrage');
            const dateAchevInput = document.getElementById('date_achev_pro');
        
            // Vérifier si les deux champs sont remplis
            if (!dateDemarrageInput.value || isNaN(nombreJours) || nombreJours < 0) {
                dateAchevInput.value = ''; // Effacer la date de fin si une valeur manque
                return;
            }
        
            // Créer une nouvelle date en ajoutant le nombre de jours
            const dateResultante = new Date(dateDemarrageInput.value);
            dateResultante.setDate(dateResultante.getDate() + nombreJours);
        
            // Formatter la date résultante au format "YYYY-MM-DD"
            dateAchevInput.value = dateResultante.toISOString().split('T')[0];
        }
        
    </script>
@endsection
