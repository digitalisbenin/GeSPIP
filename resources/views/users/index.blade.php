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
                <h3 class="card-title text-uppercase ">Liste des Utilisateurs </h3> <button type="button" class="btn btn-primary float-end"
                    data-bs-toggle="modal" data-bs-target="#myModal">
                    Ajouter un utilisateur
                </button>


                {{--  <a class="btn btn-primary float-end" href="{{url('departements-create')}}">Ajouter un département</a>  --}}
            </div>



            <div class="modal" id="myModal">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalLabel">ENREGISTRER UN UTILISATEUR</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ url('users-store') }}" method="post" enctype="multipart/form-data" >
                                                @csrf
                           
        
                                                <div class="col mb-2">
                                                    <label class="form-label">Role</label>
                                                    <select class="form-select" name="role_id" id="famille">
                    
                                                        @foreach($rol as $famille)
                                                            <option value="{{ $famille->id }}">{{ $famille->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
        
        
                               
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Nom Complet</label>
                                        <input type="text" style="text-transform: uppercase;"  name="name" class="form-control "  required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="email" class="form-control " required >
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col">
                                        <label class="form-label">Mot de passe</label>
                                        <input type="password" name="password" class="form-control "  required>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Confirmer </label>
                                        <input type="password" name="password_confirmation" class="form-control "  required>
                                    </div>
                                   
                                </div>
        
        
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                            <button type="submit" class="btn btn-primary">Valider</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                  <thead class="font-italic">
                    
                    <tr>
                        <th>N° </th>

                      
                                                <th>Nom</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                           

                                             

                        <th>
                        </th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($user as $key => $task)
                        <tr>
                            <td>{{ $key + 1 }}</td>

                            <td>{{ $task->name }}</td>
                            <td>{{ $task->email }}</td>

                            <td>{{ $task->role->name }}</td>
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
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalModificationLabel{{ $task->id }}">MODIFIER UN UTILISATEUR</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ url('users/'.$task->id.'/update') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                        
                                          
                                            <div class="row">
                                                <div class="col">
                                                    <label class="form-label">Stock alert</label>
                                                    <select class="form-select" name="role_id" id="famille">
                                                        @foreach($rol as $famille)
                                                            <option value="{{ $famille->id }}"
                                                                {{ $famille->id == $task->role_id ? 'selected' : '' }}>
                                                                {{ $famille->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col">
                                                    <label class="form-label">Nom Complet</label>
                                                    <input type="text" style="text-transform: uppercase;"  name="name" class="form-control " value="{{ $task->name }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <label class="form-label">Email</label>
                                                    <input type="text" name="email" class="form-control" value="{{ $task->email }}">
                                                </div>
                                                <div class="col">
                                                    <label class="form-label">Mot de passe</label>
                                                    <input type="password" name="password" class="form-control" ">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                            <button type="submit" class="btn btn-primary">Valider</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel{{ $task->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $task->id }}">Supprimer une
                                            commune</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="" action="{{ url('users/' . $task->id . '/destroy') }}"
                                            method="GET">
                                            @method('DELETE')
                                            @csrf
                                            <div class="input-group">
                                                <h4 class="text-center"> Êtes-vous sûr de vouloir supprimer l'utilisateur
                                                    nommée <span>"{{ $task->name }}" ?</span></h4>

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
