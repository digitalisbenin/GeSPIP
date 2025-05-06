@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->


            <div class="card">
              <div class="card-header">
                  <h3 class="card-title text-uppercase ">Liste des modes d'executions </h3>  <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#myModal">
                    Ajouter un mode d' execution
                  </button>


                  {{--  <a class="btn btn-primary float-end" href="{{url('departements-create')}}">Ajouter un département</a>  --}}
              </div>



              <div class="modal" id="myModal">
                <div class="modal-dialog">
                  <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                      <h4 class="modal-title">Ajouter mode d' execution</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">


<form class="" action="{{ url('mode-executions-store')}}" method="POST">
    @csrf
          <div class="input-group ">
            <label for=""></label>
            <input type="text" class="form-control form-control-lg" value="{{ old('name')}}" placeholder="Nom du mode d'execution" name="name" required >
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
                <table id="example1" class="table table-bordered table-striped">
                  <thead class="font-italic">
                  <tr>
                    <th>N° </th>

                    <th>Nom du mode d'execution</th>
                    <th>Ajoutée le</th>

                    <th>
                    </th>

                  </tr>
                  </thead>
                  <tbody>
                    @foreach($modeExecution as $key=> $task)
                    <tr>
                      <td>{{$key+1}}</td>

                      <td>{{$task->name}}</td>

                      <td>{{$task->created_at}}</td>
                      {{--  <td>{{auth()->User()->name}}</td>  --}}

                        <td>
                            {{--  <a href="{{ url('/departements/'.$task->id.'/edit') }}" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-edit"></i> Modifier
                            </a>  --}}
                            {{--  <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <i class="fas fa-edit"></i>  Modifier
                              </button>  --}}
                              <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{$task->id}}">
                                <i class="fas fa-edit"></i> Modifier
                            </button>

                            <button type="button" class="btn btn-danger delete-btn" data-bs-toggle="modal" data-bs-target="#deleteModal{{$task->id}}">
                                <i class="fas fa-trash"></i> Supprimer
                            </button>
                        </td>

                    </tr>
                    <div class="modal fade" id="exampleModal{{$task->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$task->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel{{$task->id}}">Modifier un mode d'execution</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="" action="{{ url('mode-executions/'.$task->id.'/update')}}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="input-group">
                                            <input type="text" class="form-control form-control-lg" value="{{ $task->name}}" placeholder="" name="name" required >
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                                    <button type="submit" class="btn btn-success">Envoyer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="deleteModal{{$task->id}}" tabindex="-1" aria-labelledby="deleteModalLabel{{$task->id}}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{$task->id}}">Supprimer un mode d'execution</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="" action="{{ url('mode-executions/'.$task->id.'/destroy')}}" method="GET">
                                        @method('DELETE')
                                        @csrf
                                        <div class="input-group">
                                                <h4 class="text-center"> Êtes-vous sûr de vouloir supprimer le mode d'execution nommée <span >"{{ $task->name}}" ?</span></h4>

                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
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


