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
        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-uppercase ">Modifier une activité </h3>
                {{--  <a type="button" href="{{ url('contrats-create') }}"
                    class="btn btn-primary float-end">
                    Enregistrer un contrat
                </a>  --}}
            </div>




        </div>  
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    {{--  <h2>Enregistrement d'une nouvelle activité</h2>  --}}
                    <form id="multi-step-form"action="{{ url('contrats/' . $contrat->id . '/update') }}" method="POST"
                        enctype="multipart/form-data">
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
                                            <label for="">Date d'enregistrement:</label>
                                            <input type="date" class="form-control form-control-lg ml-2" placeholder=""
                                                name="date_de_planification" 
                                                value="{{ $contrat->date_de_planification }}" 
                                                required>
                                        </div>
                                        <div class="col">
                                            <label for="">Référence contrat</label>
                                            <input type="text" class="form-control form-control-lg ml-2" placeholder=""
                                                name="ref_contrat" id="ref_contrat" aria-label="First name"
                                                value="{{ $contrat->ref_contrat }}">
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="container border border-1 border-secondary mb-2">
                                <div>
                                    <div class="row">
                                        <div class="col-6 ">
                                        <label for="" class="text-lg">Projet</label>

                                        <div class=" d-flex align-items-center">
                                            <select class="form-select me-3 text-lg form-control-lg" name="projet_id" required>
                                                <option value="">Selectionnez un projet</option>

                                                @foreach ($projet as $departements)
                                                    <option value="{{ $departements->id }}"
                                                        @if ($departements->id == $contrat->activite->projet_id) selected @endif>
                                                        {{ $departements->titre_projet }}</option>
                                                @endforeach

                                            </select>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#myModalProjet">
                                                Ajouter

                                            </button>
                                        </div>
                                    </div>
                                     <div class=" col-6">
                                            <label for="" class="text-lg">Nature de l'activité</label>
                                            <div class=" d-flex align-items-center">


                                                <select class="form-select form-control-lg text-lg  me-3" name="nature_activite_id"
                                                    required>
                                                    <option value="">La nature activité</option>

                                                    @foreach ($nature_activite as $departements)
                                                        <option value="{{ $departements->id }}"
                                                            @if ($departements->id == $contrat->activite->nature_activite_id) selected @endif>
                                                            {{ $departements->name }}</option>
                                                    @endforeach



                                                </select>

                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#myModal">
                                                    Ajouter

                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">

                                        <label for="" class="text-lg">Titre de l'activité</label>
                                        <input type="text" class="form-control form-control-lg mb-3"
                                            value="{{ $contrat->activite->titre_activite }}"
                                            placeholder="Titre de l'activité" name="titre_activite" required>
                                    </div>
                                    <div class="col">

                                        <label for="" class="text-lg">Description de l'activité</label>
                                        <textarea name="description" placeholder="" class="form-control form-control-lg" value="{{ old('description') }}"
                                            required id="description" cols="4" rows="3"> {{ $contrat->activite->description }}</textarea>

                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="col  text-lg">

                                                    <label for="name"> Durée du contrat (jrs)</label>
                                                    <input type="number" class="form-control form-control-lg"
                                                        placeholder="" name="contrat" id="contrat" value="{{ $contrat->contrat }}"
                                                        aria-label="Last name" required>




                                                </div>
                                    </div>
                                    {{--  <div class="col-4">
                                        <div class="col ">
                                            <label for="" class="text-lg">Durée d'execution</label>
                                            <input type="text" class="form-control form-control-lg  mb-3"
                                                value="{{ $contrat->activite->dure_execution }}" placeholder=""
                                                name="dure_execution" required>
                                        </div>
                                    </div>  --}}
                                    <div class="col-6">
                                        <div class=" col">
                                            <label for="" class="text-lg">Coût de l'activité</label>
                                            <input type="number" class="form-control form-control-lg  mb-3"
                                                value="{{ $contrat->activite->cout_activite }}" placeholder="coût global"
                                                name="cout_activite" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button type="button" class="btn btn-primary next float-end">Suivant</button>



                            {{--  <button type="button" class="btn btn-primary next float-end">Suivant</button>  --}}
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
                                                        placeholder="" name="departement" id="localite"value="{{ $contrat->activite->departement }}"  required>
                                                    
                                                </div>
                                                
                                                <div class="col ">
                                                    <label for="" class="text-lg">Ville</label>

                                                        <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="ville" id="localite" value="{{ $contrat->activite->ville }}" required>
                                                   
                                                </div>

                                               
                                                 <div class="col">
                                                    <label for="name">Etat du chantier:</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="etat_chantier"  value="{{ $contrat->activite->etat_chantier }}">
                                                </div>





                                               
                                            </div>

                                        </div>
                                        <div class="col-4">
                                            <div>
                                                <div class="col ">
                                                    <label for="" class="text-lg">Commune</label>

                                                        <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="commune" id="localite" value="{{ $contrat->activite->commune }}" required>
                                                   
                                                </div>
                                                
                                                  <div class="col">
                                                    <label for="name">Coordonnée GPS:</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="coordonnéeGPS" value="{{ $contrat->activite->coordonnéeGPS }}"
                                                        id="coordonnéeGPS">
                                                </div>
                                                
                                                <div class="col">
                                                    <label for="name">Année d'execution:</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="annee_execution"  value="{{ $contrat->activite->annee_execution }}" >
                                                </div> 

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
                                                    <label for="name">Arrondissement:</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="arrondissement"  value="{{ $contrat->activite-> arrondissement}}"  >
                                                </div>

                                                
                                              

                                                <div class="col  text-lg">

                                                    <label for="name"> Autres Informations:</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="autres"  value="{{ $contrat->autres }}"
                                                        aria-label="Last name" >




                                                </div>
                                                <div class="col ">
                                                    <label for="" class="text-lg">STATUS</label>

                                                    <select class="form-select mb-3 form-control-lg" name="status" >
                                                       
                                                        <option value="Non démarré" @if($contrat->status== 'Non démarré') selected @endif>Non démarré</option>
                                                        <option value="En cours" @if($contrat->status == 'En cours') selected @endif>En cours</option>
                                                        <option value="Terminer" @if($contrat->status == 'Terminer') selected @endif>Terminer</option>
                                                        <option value="Suspendues" @if($contrat->status == 'Suspendues') selected @endif>Suspendues</option>
                                                        <option value="Abandonnées" @if($contrat->status == 'Abandonnées') selected @endif>Abandonnées</option>


                                                        
                                                    </select>
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

                            <legend>Informations conernant l'état de l'activité</legend>
                            <div class="border border-1 border-secondary h-auto mt-5">

                                <div class="row mb-2">
                                    <div class="col-6">
                                        <div class="col text-lg ">
                                            <label for="name">Démarrée (Oui/Non):</label><br>
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
                                            <label for="name">Date de remise de site:</label>
                                            <input type="date" class="form-control form-control-lg" placeholder="" value="{{ $contrat->date_de_remise_site }}"
                                                name="date_de_remise_site" id="date_de_remise_site" disabled>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="col text-lg">
                                            <label for="name">Date de démarrage:</label>
                                            <input type="date" class="form-control form-control-lg" placeholder="" value="{{ $contrat->date_de_demarrage }}"
                                                name="date_de_demarrage" id="date_de_demarrage" disabled>
                                        </div>

                                        <div class="col text-lg">
                                            <label for="name">Date problable achèvrement du projet:</label>
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
                                          
                                                    <label for="" class="text-lg">Mode execution</label>

                                                    <select class="form-select form-control-lg" name="mode_execution"  id="mode_executions" onchange="activerChamps()">
                                                       
                                                        <option value="Entreprise" @if($contrat->mode_execution == 'Entreprise') selected @endif>Entreprise</option>
                                                        <option value="Interne" @if($contrat->mode_execution == 'Interne') selected @endif>Interne</option>



                                                    </select>
                                                </div>
                                    <div class="col-4">
                                       <div class="col text-lg">
                                                    <label for="name">Entreprise:</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        placeholder="" name="entreprise" id="entreprise" value="{{ $contrat->entreprise }}">
                                                </div> 
                                    </div>
                                    <div class="col-4 text-lg">
                                       <div class="col">
                                                    <label for="name">Contact:</label>
                                                    <input type="number" class="form-control form-control-lg" value="{{ $contrat->activite->phone_entreprise }}"
                                                        placeholder="" name="phone" id="phone">
                                                </div>
                                    </div>

                                </div>
                            </div>




                            <button type="submit" class="btn btn-success float-end mt-3 ml-3">Mettre à jour</button>
                            <button type="button" class="btn btn-secondary prev float-end mt-3 ml-3">Précédent</button>
                            {{--  <a type="button" href="/contrats" class="btn btn-secondary float-end mt-3">Annuler</a>  --}}

                        </div>


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
            // Récupérer le nombre de jours saisi par l'utilisateur
           // const nombreJours = parseInt(this.value);
           // const dateDemarrageInput = document.getElementById('date_de_demarrage');
            // Vérifier si une date valide est sélectionnée
        //if (!dateDemarrageInput.value) {
           // dateAchevInput.value = '';
          //  return;
       // }
            // Vérifier si le nombre de jours est valide
           // if (!isNaN(nombreJours) && nombreJours >= 0) {
                // Créer une nouvelle date en ajoutant le nombre de jours à la date actuelle
               // const dateResultante = new Date(dateDemarrageInput.value);
                //dateResultante.setDate(dateResultante.getDate() + nombreJours);

                // Formatter la date résultante au format "YYYY-MM-DD"
                //const formattedDate = dateResultante.toISOString().split('T')[0];

                // Mettre à jour la valeur du champ de la date résultante
               // document.getElementById('date_achev_pro').value = formattedDate;
           // } else {
                // Effacer le champ de la date résultante si le nombre de jours est invalide
               // document.getElementById('date_achev_pro').value = '';
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
