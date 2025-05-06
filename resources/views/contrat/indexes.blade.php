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
                <h3 class="card-title text-uppercase  ">Liste des suivi contrats  </h3>
                 {{--  <a type="button" href="{{ url('contrats-create')}}" class="btn btn-primary float-end">
                    Enregistrer un contrat
                </a>  --}}
            </div>




        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div class="table-responsive" style=" overflow-y: auto; height:600px;">
            <table id="example1" class="table table-bordered table-striped">
                <thead class="font-italic">
                    <tr class="text-center" style=" white-space: nowrap;" >
                        <th>N° </th>

                        <th>Titre de l'activité</th>

                        <th>Cout de l'activité</th>

                          <th>Projet</th>
                          <th>Statut</th>


                        <th>Ajoutée le</th>

                        <th>
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($contrat as $key => $task)
                        <tr class="text-center" style=" white-space: nowrap;"  >
                            <td>{{ $task->numero }}</td>

                            <td>{{ $task->activite->titre_activite }}</td>
                            <td>{{ number_format($task->activite->cout_activite, 0, ',', ' ') }} </td>

                            <td>{{ $task->activite->projet->titre_projet }} </td>
                            <td class="
                            @if ($task->status === 'En cours') text-green 
                            @elseif ($task->status === 'Terminer') text-red 
                            @elseif ($task->status === 'Non démarré') text-blue
                            @elseif ($task->status === 'En difficulté') text-orange
                            @elseif ($task->status === 'Suspendues') text-gray
                            @elseif ($task->status === 'Abandonnées') text-dark
                            @endif">
                            
                            <span class="badge 
                                @if ($task->status === 'Terminer') badge-success 
                                @elseif ($task->status === 'En difficulté') badge-danger 
                                @elseif ($task->status === 'Non démarré') badge-primary 
                                @elseif ($task->status === 'En cours') badge-secondary  
                                @elseif ($task->status === 'Suspendues') badge-warning  
                                @elseif ($task->status === 'Abandonnées') badge-dark  
                                @endif text-white"
                                style="min-width: 100px; display: inline-block; text-align: center; ">
                                {{ $task->status }}
                            </span>
                        </td>


                            {{--  <td>
                                {{ $task->type_projet->name }}

                            </td>  --}}

                            <td> {{ $task->created_at }}</td>
                            {{--  <td>{{auth()->User()->name}}</td>  --}}

                            <td >
                                @if($task->status === 'Terminer')
                                
                                <a href="{{ url('/contrats/'.$task->id.'/edites') }}" class="btn btn-success disabled" aria-disabled="true" style="opacity: 0.25; cursor: not-allowed;">
                                    <i class="fas fa-edit"></i> Suivi
                                </a>
                                @else
                                

                                <a href="{{ url('/contrats/'.$task->id.'/edites') }}" class="btn btn-success">
                                    <i class="fas fa-edit"></i> Suivi
                                </a>
                            @endif
                              {{--  <a href="{{ url('/contrats/'.$task->id.'/edites') }}" class="btn btn-success">
                                <i class="fas fa-edit"></i> Suivi
                            </a>  --}}
                                {{--  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-edit"></i>  Modifier
                              </button>  --}}
                                {{--  <button type="button" class="btn btn-success">
                                    <i class="fas fa-edit"></i> Modifier
                                </button>  --}}

                                {{--  <button type="button" class="btn btn-danger delete-btn" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $task->id }}">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>  --}}
                            </td>

                        </tr>
                        <div class="modal fade" id="deleteModal{{ $task->id }}" tabindex="-1"
                            aria-labelledby="deleteModalLabel{{ $task->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $task->id }}">Supprimer un
                                            contrat</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form class="" action="{{ url('contrats/' . $task->id . '/destroy') }}"
                                            method="GET">
                                            @method('DELETE')
                                            @csrf
                                            <div class="input-group">
                                                <h4 class="text-center"> Êtes-vous sûr de vouloir supprimer le contrat n°
                                                     <span>"{{ $task->numero }}" ?</span></h4>

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
