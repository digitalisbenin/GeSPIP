@extends('layouts.app')
@extends('layouts.sidebar')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->


        <div class="card">
            <div class="card-header">
                <h3 class="card-title text-uppercase ">Les Filtres </h3>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
               {{--  <div class="col-8 ">
                <form action="{{ route('filtre') }}" method="GET">
                    <label class="ml-3"> Filtre sur la periode</label>
                    <div class="mb-3 row ml-2">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Du</label>
                    <div class="col-sm-10">
                    <input type="date" class="form-control form-control-lg" name="start_date" id="inputPassword" required>
                    </div>
                    </div>
                    <div class="mb-3 row ml-2">
                        <label for="inputPassword" class="col-sm-2 col-form-label ">Au</label>
                        <div class="col-sm-10">
                        <input type="date" class="form-control form-control-lg" name="end_date" id="inputPassword" required>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary float-end mb-2">Rechercher</button>
                </form>
               </div>  --}}
               <div class="col-8">
                <div class="col-md-4 mb-3">
                    <label class="form-label">Filtre sur la période</label>
                </div>
                <form action="{{ route('filtre') }}" method="GET" class="row">

                    <div class="col-md-4 mb-3">
                        {{--  <label for="start_date" class="form-label">Du</label>
                        <input type="date" class="form-control form-control-lg" name="start_date" id="start_date" required>  --}}
                        <div class="mb-3 row ml-2">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Du</label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control form-control-lg" name="start_date" id="inputPassword" required>
                            </div>
                            </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        {{--  <label for="end_date" class="form-label">Au</label>
                        <input type="date" class="form-control form-control-lg" name="end_date" id="end_date" required>  --}}
                        <div class="mb-3 row ml-2">
                            <label for="inputPassword" class="col-sm-2 col-form-label ">Au</label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control form-control-lg" name="end_date" id="inputPassword" required>
                            </div>
                            </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary ">Rechercher</button>
                    </div>
                </form>
            </div>

               <div class="col-4">
                <label for="inputPassword" class=" col-form-label">Filtre sur les status</label>
               <div>
                <form action="{{ route('filtre') }}" method="GET">

                    <button type="submit" name="status" value="Non démarré" class="btn btn-primary mb-2">Non démarré</button>
                    <button type="submit" name="status" value="En cours" class="btn btn-secondary mb-2">En cours</button>
                    <button type="submit" name="status" value="En difficulté" class="btn btn-danger mb-2">En difficulté</button>
                    <button type="submit" name="status" value="Terminer" class="btn btn-success mb-2">Terminé</button>
                </form>

                {{--  <a type="button" href="#" class="btn btn-success mb-2">Terminer</a>
                <a type="button" href="#" class="btn btn-secondary mb-2">En cours</a>
                <a type="button" href="#" class="btn btn-danger mb-2">En difficulté</a>
                <a type="button" href="#" class="btn btn-primary mb-2">Non démarré</a>  --}}
               </div>

               </div>
            </div>
            <div class="table-responsive" style=" overflow-y: auto; height:420px;">
            <table id="example1" class="table table-striped table-bordered">
                <thead class="font-italic" >
                    <tr class="text-center" style=" white-space: nowrap;" >
                        <th>N° </th>

                        <th>Titre de l'activité</th>

                        <th>Nature Activité</th>

                        <th>Projet</th>
                        <th>Status</th>



                        <th>Ajoutée le</th>



                    </tr>
                </thead>
                <tbody>
                    @foreach ($contrat as $key => $task)
                        <tr class="text-center" style=" white-space: nowrap;"  >
                            <td>{{ $task->numero }}</td>

                            <td>{{ $task->activite->titre_activite }}</td>
                            <td>{{ $task->activite->natureActivite->name }}</td>

                            <td>{{ $task->activite->projet->titre_projet }} </td>
                            {{--  <td class="text-green">{{ $task->status }} </td>  --}}
                            {{--  <td class="@if ($task->status === 'En cours') text-green @elseif($task->status === 'Terminer') text-red @endif">
                                <span class="badge badge-success">{{ $task->status }}</span>
                            </td>  --}}

                            <td class="@if($task->status === 'En cours') text-white @elseif($task->status === 'Terminer') text-white @endif">
                                <span class="badge @if($task->status === 'Terminer') badge-success @elseif($task->status === 'En difficulté') badge-danger @elseif($task->status === 'Non démarré')  badge bg-primary @elseif($task->status === 'En cours')  badge bg-secondary  @endif">
                                    {{ $task->status }}
                                </span>
                            </td>

                            {{--  <td>
                                {{ $task->type_projet->name }}

                            </td>  --}}

                            <td> {{ $task->created_at }}</td>
                            {{--  <td>{{auth()->User()->name}}</td>  --}}


                        </tr>

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
