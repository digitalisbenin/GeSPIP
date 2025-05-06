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
        <div class="container">
            <div class="row">

                <div class="col-md-12">

                    <form class=" mt-5" action="{{ url('activites-store') }}" method="POST">
                        @csrf


                        <div class="row g-3">
                            <div class="col-6">
                                <div>
                                    <div class="col">

                                        <label for="" class="text-lg">Titre de l'activité</label>
                                        <input type="text" class="form-control form-control-lg mb-3"
                                            value="{{ old('titre_activite') }}" placeholder="Titre du projet"
                                            name="titre_activite" required>
                                    </div>

                                    <div class="col ">
                                        <label for="" class="text-lg">Durée d'execution</label>
                                        <input type="text" class="form-control form-control-lg  mb-3"
                                            value="{{ old('dure_execution') }}" placeholder="Intituler du projet"
                                            name="dure_execution" required>
                                    </div>

                                    <div class=" col">
                                        <label for="" class="text-lg">Nature de l'activité</label>
                                        <div class=" d-flex align-items-center">


                                            <select class="form-select mb-3 form-control-lg me-3" name="nature_activite_id">
                                                <option value="">Selectionnez la nature activité</option>

                                                @foreach ($nature_activite as $key => $status)
                                                    <option class="" value="{{ $status->id }}">{{ $status->name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#myModal">
                                                Ajouter

                                            </button>
                                        </div>
                                    </div>
                                    <div class=" col">
                                        <label for="" class="text-lg">Entreprise</label>

                                        <div class=" d-flex align-items-center">
                                            <select class="form-select mb-3 me-3 form-control-lg" name="entreprise_id">
                                                <option value="">Selectionnez un en entreprise</option>

                                                @foreach ($entreprise as $key => $status)
                                                    <option class="" value="{{ $status->id }}">{{ $status->name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#myModalEntreprise">
                                                Ajouter

                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">
                                <div>
                                    <div class=" col">
                                        <label for="" class="text-lg">Cout de l'activité</label>
                                        <input type="number" class="form-control form-control-lg  mb-3"
                                            value="{{ old('cout_activite') }}" placeholder="cout global"
                                            name="cout_activite" required>
                                    </div>

                                    <div class="col ">
                                        <label for="" class="text-lg">Mode execution</label>

                                        <select class="form-select mb-3 form-control-lg" name="mode_execution_id">
                                            <option value="">Selectionnez un mode d'execution</option>

                                            @foreach ($mode_execution as $key => $status)
                                                <option class="" value="{{ $status->id }}">{{ $status->name }}
                                                </option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="col ">
                                        <label for="" class="text-lg">Projet</label>

                                        <div class=" d-flex align-items-center">
                                            <select class="form-select mb-3 me-3 form-control-lg" name="projet_id">
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
                                    <div class="col ">
                                        <label for="" class="text-lg">Commune</label>

                                        <div class=" d-flex align-items-center">
                                            <select class="form-select mb-3 me-3 form-control-lg" name="commune_id">
                                                <option value="">Selectionnez un commune</option>

                                                @foreach ($commune as $key => $status)
                                                    <option class="" value="{{ $status->id }}">{{ $status->name }}
                                                    </option>
                                                @endforeach

                                            </select>

                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#myModalCommune">
                                                Ajouter

                                            </button>
                                        </div>
                                    </div>



                                </div>

                            </div>



                        </div>









                </div>

                <div class=" ">

                    <button type="submit" class="btn btn-success float-end ">Enregistrer</button>
                    <a type="button" href="/activites" class="btn btn-secondary float-end me-3">Annuler</a>
                </div>
                </form>

            </div>

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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" style="text-align:center" class="btn btn-success ">Envoyer</button>

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
                                        value="{{ old('name') }}" placeholder="Nom de l'entreprise" name="name"
                                        required>
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" style="text-align:center" class="btn btn-success ">Envoyer</button>

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
                                        value="{{ old('cout_global') }}" placeholder="cout global" name="cout_global"
                                        required>
                                </div>

                                <div class=" ">
                                    <label for="" class="text-lg"> Type projet</label>

                                    <select class="form-select mb-3 form-control-lg" name="type_projet_id">
                                        <option value="">Selectionnez un type projet</option>

                                        @foreach ($type_projet as $key => $status)
                                            <option class="" value="{{ $status->id }}">{{ $status->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" style="text-align:center" class="btn btn-success ">Envoyer</button>

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
                                        value="{{ old('name') }}" placeholder="Nom de la commune" name="name"
                                        required>
                                </div>

                                <div class=" ">
                                    <label for="" class="text-lg"> Département</label>

                                    <select class="form-select mb-3 form-control-lg" name="departement_id" required>
                                        <option>Selectionnez un departement</option>

                                        @foreach ($departement as $key => $status)
                                            <option class="" value="{{ $status->id }}">{{ $status->name }}
                                            </option>
                                        @endforeach

                                    </select>
                                </div>

                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" style="text-align:center" class="btn btn-success ">Envoyer</button>

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
@endsection
