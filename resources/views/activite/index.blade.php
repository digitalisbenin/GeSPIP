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
                <h3 class="card-title text-uppercase ">Liste des activités </h3>
                 {{--  <button type="button" class="btn btn-primary float-end"
                    data-bs-toggle="modal" data-bs-target="#myModal">
                    Ajouter un activité
                </button>  --}}
                {{--  <a type="button" href="{{ url('activites-create')}}" class="btn btn-primary float-end">
                    Ajouter un activité
                </a>  --}}
            </div>



            <div class="modal" id="myModal">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Ajouter un activité </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">


                            <form class="" action="{{ url('activites-store') }}" method="POST">
                                @csrf


                                <div class="row g-3">
                                    <div class="col">

                                        <label for="" class="text-lg">Titre de l'activité</label>
                                        <input type="text" class="form-control form-control-lg mb-3" value="{{ old('titre_activite') }}"
                                            placeholder="Titre du projet" name="titre_activite" required>
                                    </div>

                                    <div class=" col">
                                        <label for="" class="text-lg">Cout de l'activité</label>
                                        <input type="number" class="form-control form-control-lg  mb-3" value="{{ old('cout_activite') }}"
                                            placeholder="cout global" name="cout_activite" required>
                                    </div>
                                </div>


                                <div class="row g-3">
                                    <div class="col ">
                                        <label for="" class="text-lg">Durée d'execution</label>
                                        <input type="text" class="form-control form-control-lg  mb-3" value="{{ old('dure_execution') }}"
                                            placeholder="Intituler du projet" name="dure_execution" required>
                                    </div>


                                    <div class="col ">
                                        <label for="" class="text-lg">Projet</label>

                                            <select class="form-select mb-3 form-control-lg" name="projet_id">
                                                <option value="">Selectionnez un projet</option>

                                                @foreach($projet as $key=> $status)
                                                <option class="" value="{{$status->id}}"  >{{$status->titre_projet}}</option>
                                                @endforeach

                                              </select>
                                    </div>
                                </div>

                                <div class="row g-3">
                                    <div class=" col">
                                        <label for="" class="text-lg">Nature de l'activité</label>

                                            <select class="form-select mb-3 form-control-lg" name="nature_activite_id">
                                                <option value="">Selectionnez la nature activité</option>

                                                @foreach($nature_activite as $key=> $status)
                                                <option class="" value="{{$status->id}}"  >{{$status->name}}</option>
                                                @endforeach

                                              </select>
                                    </div>
                                    <div class="col ">
                                        <label for="" class="text-lg">Commune</label>

                                            <select class="form-select mb-3 form-control-lg" name="commune_id">
                                                <option value="">Selectionnez un commune</option>

                                                @foreach($commune as $key=> $status)
                                                <option class="" value="{{$status->id}}"  >{{$status->name}}</option>
                                                @endforeach

                                              </select>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class=" col">
                                        <label for="" class="text-lg">Entreprise</label>

                                            <select class="form-select mb-3 form-control-lg" name="entreprise_id">
                                                <option value="">Selectionnez un en entreprise</option>

                                                @foreach($entreprise as $key=> $status)
                                                <option class="" value="{{$status->id}}"  >{{$status->name}}</option>
                                                @endforeach

                                              </select>
                                    </div>
                                    <div class="col ">
                                        <label for="" class="text-lg">Mode execution</label>

                                            <select class="form-select mb-3 form-control-lg" name="mode_execution_id">
                                                <option value="">Selectionnez un mode d'execution</option>

                                                @foreach($mode_execution as $key=> $status)
                                                <option class="" value="{{$status->id}}"  >{{$status->name}}</option>
                                                @endforeach

                                              </select>
                                    </div>
                                </div>



                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" style="text-align:center" class="btn btn-success ">Enregistrer</button>

                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body ml-1">
             <div class="table-responsive" style=" overflow-y: auto; height:600px;">
            <table id="myTable" class="table  table-bordered table-striped border table align-middle">
                <thead class="font-italic">
                    <tr>
                        <th>N° </th>

                        <th>Titre de l'activité</th>

                        <th>Coût de l'activité</th>
                        <th> Durée d'execution</th>
                          <th>Projet</th>


                        <th>Ajoutée le</th>

                       

                    </tr>
                </thead>
                <tbody>
                    @foreach ($activite as $key => $task)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>{{ $task->titre_activite }}</td>
                            <td>{{ $task->cout_activite }}  FCFA</td>
                            <td>{{ $task->dure_execution }} </td>
                            <td>{{ $task->projet->titre_projet }} </td>

                            
                            {{--  <td>
                                {{ $task->type_projet->name }}

                            </td>  --}}

                            <td>{{ $task->created_at }}</td>
                            {{--  <td>{{auth()->User()->name}}</td>  --}}

                            {{--  <td>  --}}
                                {{--  <a href="{{ url('/departements/'.$task->id.'/edit') }}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-edit"></i> Modifier
                            </a>  --}}
                                {{--  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-edit"></i>  Modifier
                              </button>  --}}
                                {{--  <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $task->id }}">
                                    <i class="fas fa-edit"></i> Modifier
                                </button>

                                <button type="button" class="btn btn-danger delete-btn" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $task->id }}">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </td>  --}}

                        </tr>
                        <div class="modal fade" id="exampleModal{{ $task->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel{{ $task->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $task->id }}">Modifier une activité
                                            </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="" action="{{ url('activites/' . $task->id . '/update') }}"
                                            method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="row g-3">
                                                <div class="col">
                                                    <label for="" class="text-lg"> Titre de l'activité</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        value="{{ $task->titre_activite }}" placeholder="" name="titre_activite" required>
                                                </div>
                                                <div class=" col">
                                                    <label for="" class="text-lg">Cout de l'activité</label>
                                                    <input type="text" class="form-control form-control-lg"
                                                        value="{{ $task->cout_activite }}" placeholder="" name="cout_activite" required>
                                                </div>
                                            </div>

                                           <div class="row g-3">
                                            <div class="col">
                                                <label for="" class="text-lg">Durée d'execution</label>
                                                <input type="text" class="form-control form-control-lg"
                                                    value="{{ $task->dure_execution }}" placeholder="" name="dure_execution" required>
                                            </div>
                                            <div class="col ">
                                                <label for="" class="text-lg">Projet</label>

                                                    <select class="form-select mb-3 form-control-lg" name="projet_id">
                                                        <option value="">Selectionnez un projet</option>

                                                        @foreach($projet as $departements)
                                                        <option value="{{$departements->id}}" @if($departements->id == $task->projet_id) selected @endif>{{$departements->titre_projet}}</option>
                                                    @endforeach


                                                      </select>
                                            </div>
                                           </div>

                                            <div class="row g-3">
                                                <div class="col ">
                                                    <label for="" class="text-lg">Nature de l'activité</label>

                                                        <select class="form-select mb-3 form-control-lg" name="nature_activite_id">
                                                            <option value="">Selectionnez un projet</option>

                                                            @foreach($nature_activite as $departements)
                                                            <option value="{{$departements->id}}" @if($departements->id == $task->nature_activite_id) selected @endif>{{$departements->name}}</option>
                                                        @endforeach


                                                          </select>
                                                </div>

                                                <div class=" col">
                                                    <label for="" class="text-lg">Commune</label>

                                                        <select class="form-select mb-3 form-control-lg" name="projet_id">
                                                            <option value="">Selectionnez un projet</option>

                                                            @foreach($commune as $departements)
                                                            <option value="{{$departements->id}}" @if($departements->id == $task->commune_id) selected @endif>{{$departements->name}}</option>
                                                        @endforeach


                                                          </select>
                                                </div>
                                            </div>

                                            <div class="row g-3">
                                                <div class="col ">
                                                    <label for="" class="text-lg">Entreprise</label>

                                                        <select class="form-select mb-3 form-control-lg" name="entreprise_id">
                                                            <option value="">Selectionnez une entreprise</option>

                                                            @foreach($entreprise as $departements)
                                                            <option value="{{$departements->id}}" @if($departements->id == $task->entreprise_id) selected @endif>{{$departements->name}}</option>
                                                        @endforeach


                                                          </select>
                                                </div>

                                                <div class="col ">
                                                    <label for="" class="text-lg">Mode execution</label>

                                                        <select class="form-select mb-3 form-control-lg" name="mode_execution_id">
                                                            <option value="">Selectionnez un projet</option>

                                                            @foreach($mode_execution as $departements)
                                                            <option value="{{$departements->id}}" @if($departements->id == $task->mode_execution_id) selected @endif>{{$departements->name}}</option>
                                                        @endforeach


                                                          </select>
                                                </div>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-success">Envoyer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel{{ $task->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $task->id }}">Supprimer un
                                            projet</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="" action="{{ url('activites/' . $task->id . '/destroy') }}"
                                            method="GET">
                                            @method('DELETE')
                                            @csrf
                                            <div class="input-group">
                                                <h4 class="text-center"> Êtes-vous sûr de vouloir supprimer l'activité
                                                    nommée <span>"{{ $task->titre_activite }}" ?</span></h4>

                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Annuler</button>
                                        <button type="submit" class="btn btn-danger">Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
        </div>
        @endforeach
        </tbody>
        <tfoot>
        </tfoot>
        </table>
    </div>
        <!-- Button trigger modal -->


        <!-- Modal' -->
        {{--  <div class="modal fade" id="exampleModal{{ $task->id }}" tabindex="-1" aria-labelledby="exampleModalLabel{{ $task->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel{{ $task->id }}">Modifier un département</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

<form class="" action="{{ url('departements/'.$task->id.'/update')}}" method="POST">
    @method('PUT')
    @csrf
          <div class="input-group">
            <input type="text" class="form-control" value="{{ $task->name}}" placeholder="" name="name" required >
          </div>
          </div>


      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Envoyer</button>
        </form
    </div>
      </div>
    </div>
  </div>  --}}





    </div>
    <!-- /.card-body -->
    </div>
    <!-- /.card -->
    </div>
    <!-- /.col -->
    </div>
    <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JS CDN (requis pour DataTables) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- DataTables JS CDN -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.6/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.11.6/js/dataTables.bootstrap4.min.js"></script>
        <script>
        $(document).ready(function() {
    $('#myTable').dataTable(); // ou $('#myTable').DataTable();
});
    </script>


  
@endsection

