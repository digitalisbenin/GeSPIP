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
                <h3 class="card-title text-uppercase ">Liste des projets </h3> <button type="button" class="btn btn-primary float-end"
                    data-bs-toggle="modal" data-bs-target="#myModal">
                    Ajouter un projet
                </button>


                {{--  <a class="btn btn-primary float-end" href="{{url('departements-create')}}">Ajouter un département</a>  --}}
            </div>



            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Ajouter un projet </h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body">


                            <form class="" action="{{ url('projets-store') }}" method="POST">
                                @csrf
                                <div class=" ">
                                    <label for="" class="text-lg">Titre du projet</label>
                                    <input type="text" class="form-control form-control-lg mb-3" value="{{ old('titre_projet') }}"
                                        placeholder="Titre du projet" name="titre_projet" required>
                                </div>
                                <div class=" ">
                                    <label for="" class="text-lg">Intituler du projet</label>
                                    <input type="text" class="form-control form-control-lg  mb-3" value="{{ old('intituler_projet') }}"
                                        placeholder="Intituler du projet" name="intituler_projet" required>
                                </div>
                                <div class=" ">
                                    <label for="" class="text-lg">Cout global du projet</label>
                                    <input type="number" class="form-control form-control-lg  mb-3" value="{{ old('cout_global') }}"
                                        placeholder="cout global" name="cout_global" required>
                                </div>

                                <div class=" ">
                                    <label for="" class="text-lg"> Type projet</label>

                                        <select class="form-select mb-3 form-control-lg" name="type_projet_id">
                                            <option value="">Selectionnez un type projet</option>

                                            @foreach($type_projet as $key=> $status)


                                            <option class="" value="{{$status->id}}"  >{{$status->name}}</option>



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

        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive" style=" overflow-y: auto; height:420px;">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="font-italic">
                    <tr>
                        <th>N° </th>

                        <th>Titre du projet</th>
                        <th>Intituler du projet</th>
                        <th>Cout global du projet</th>
                        {{--  <th>Type projet</th>  --}}
                        <th>Ajoutée le</th>

                        <th>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($projet as $key => $task)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>{{ $task->titre_projet }}</td>
                            <td>{{ $task->intituler_projet }}</td>
                            <td>{{ $task->cout_global }} FCFA</td>
                            {{--  <td>
                                {{ $task->type_projet->name }}

                            </td>  --}}

                            <td>{{ $task->created_at }}</td>
                            {{--  <td>{{auth()->User()->name}}</td>  --}}

                            <td>
                                {{--  <a href="{{ url('/departements/'.$task->id.'/edit') }}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-edit"></i> Modifier
                            </a>  --}}
                                {{--  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-edit"></i>  Modifier
                              </button>  --}}
                                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $task->id }}">
                                    <i class="fas fa-edit"></i> Modifier
                                </button>

                                <button type="button" class="btn btn-danger delete-btn" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $task->id }}">
                                    <i class="fas fa-trash"></i> Supprimer
                                </button>
                            </td>

                        </tr>
                        <div class="modal fade" id="exampleModal{{ $task->id }}" tabindex="-1"
                            aria-labelledby="exampleModalLabel{{ $task->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel{{ $task->id }}">Modifier un
                                            projet</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="" action="{{ url('projets/' . $task->id . '/update') }}"
                                            method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="">
                                                <label for="" class="text-lg"> Titre du projet</label>
                                                <input type="text" class="form-control form-control-lg"
                                                    value="{{ $task->titre_projet }}" placeholder="" name="titre_projet" required>
                                            </div>
                                            <div class="">
                                                <label for="" class="text-lg">Intituler du projet</label>
                                                <input type="text" class="form-control form-control-lg"
                                                    value="{{ $task->intituler_projet }}" placeholder="" name="intituler_projet" required>
                                            </div>
                                            <div class="">
                                                <label for="" class="text-lg">Cout global du projet</label>
                                                <input type="text" class="form-control form-control-lg"
                                                    value="{{ $task->cout_global }}" placeholder="" name="cout_global" required>
                                            </div>
                                            <div class=" ">
                                                <label for="" class="text-lg"> Type projet</label>

                                                    <select class="form-select mb-3 form-control-lg" name="type_projet_id">
                                                        <option value="">Selectionnez un type projet</option>

                                                        @foreach($type_projet as $departements)
                                                        <option value="{{$departements->id}}" @if($departements->id == $task->departement_id) selected @endif>{{$departements->name}}</option>
                                                    @endforeach


                                                      </select>
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
                                        <form class="" action="{{ url('projets/' . $task->id . '/destroy') }}"
                                            method="GET">
                                            @method('DELETE')
                                            @csrf
                                            <div class="input-group">
                                                <h4 class="text-center"> Êtes-vous sûr de vouloir supprimer le projet
                                                    nommée <span>"{{ $task->titre_projet }}" ?</span></h4>

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


        <!-- Modal -->
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
@endsection
