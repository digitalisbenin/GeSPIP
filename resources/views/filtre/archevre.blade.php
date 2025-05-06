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
                <h3 class="card-title text-uppercase ">Activités Achevrées </h3>
            </div>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">

                 <div class="col-4">
               {{-- <div class="col-md-4 mb-3">
                    <label class="form-label">Filtre sur la période</label>
                </div>
                <form action="{{ route('filtre') }}" method="GET" class="row">

                    <div class="col-md-4 mb-3">

                        <div class="mb-3 row ml-2">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Du</label>
                            <div class="col-sm-10">
                            <input type="date" class="form-control form-control-lg" name="start_date" id="inputPassword" required>
                            </div>
                            </div>
                    </div>
                    <div class="col-md-4 mb-3">

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
                </form>--}}
            </div>

               {{--  <div class="col-4">
                <label for="inputPassword" class=" col-form-label">Filtre sur les status</label>
               <div>
                <form action="{{ route('filtre') }}" method="GET">

                    <button type="submit" name="status" value="Non démarré" class="btn btn-primary mb-2">Non démarré</button>
                    <button type="submit" name="status" value="En cours" class="btn btn-secondary mb-2">En cours</button>
                    <button type="submit" name="status" value="En difficulté" class="btn btn-danger mb-2">En difficulté</button>
                    <button type="submit" name="status" value="Terminer" class="btn btn-success mb-2">Terminé</button>
                </form>

               </div>--}}
               <div class="col-md-8 text-end d-flex">
                {{--  <input type="text" id="searchInpute" class="form-control me-2" placeholder="Rechercher par Statut ...">  --}}
                <input type="text" id="searchInputs" class="form-control me-2 " placeholder="Rechercher par Projet...">
            <input type="text" id="searchInput"  class="form-control me-3" placeholder="Rechercher par Activités...">
              <button onclick="imprimerTable()" class="btn btn-primary text-white d-flex">
                <i class="bi bi-printer mt-1 me-2"></i> Télécharger</button>
        </div>

               </div>
            </div>
            <div class="table-responsive" style=" overflow-y: auto; height:600px;">
            <table id="tableVente"  class="table table-striped table-bordered">
                <thead class="font-italic" >
                    <tr class="text-center" style=" white-space: nowrap;" >
                        <th>N° </th>

                        <th>Date d'enreg</th>

                        {{--  <th>Référence</th>  --}}

                        <th>Projet</th>
                        <th>Titre de l'activité</th>



                        <th>Nature d'activité</th>
                        <th>Coût</th>
                        <th>Statut</th>

                        <th>Département</th>
                        <th>Commune</th>
                        <th>Arrondissement</th>
                        <th>Ville</th>
                        <th>Coordonnée GPS</th>


                    </tr>
                </thead>
                <tbody id="categoryTable" >
                    @foreach ($contrat as $key => $task)
                        <tr class="text-center" style=" white-space: nowrap;"  >
                            <td>{{ $task->numero }}</td>
                           <td>{{ \Carbon\Carbon::parse($task->created_at)->format('d/m/Y') }}</td>

                            {{--  <td></td>  --}}
                            <td class="category-description" >{{ $task->activite->projet->titre_projet }} </td>
                            <td class="category-title"  >{{ $task->activite->titre_activite }}</td>
                            <td>{{ $task->activite->natureActivite->name }}</td>


                            {{--  <td class="text-green">{{ $task->status }} </td>  --}}
                            {{--  <td class="@if ($task->status === 'En cours') text-green @elseif($task->status === 'Terminer') text-red @endif">
                                <span class="badge badge-success">{{ $task->status }}</span>
                            </td>  --}}

                            {{--  <td class="@if($task->status === 'En cours') text-white @elseif($task->status === 'Terminer') text-white @endif">
                                <span class="badge @if($task->status === 'Terminer') badge-success @elseif($task->status === 'En difficulté') badge-danger @elseif($task->status === 'Non démarré')  badge bg-primary @elseif($task->status === 'En cours')  badge bg-secondary  @endif">
                                    {{ $task->status }}
                                </span>
                            </td>  --}}

                            {{--  <td>
                                {{ $task->type_projet->name }}

                            </td>  --}}

                            <td class="montant" >{{ number_format($task->activite->cout_activite, 0, ',', ' ') }} </td>

                            {{--  <td>{{auth()->User()->name}}</td>  --}}

                                <td class="category-etat
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
<td>{{ $task->activite->departement??"-" }}</td>
<td>{{ $task->activite->commune ??"-" }}</td>
<td>{{ $task->activite->arrondissement ??"-"  }}</td>
<td>{{ $task->activite->ville ??"-"  }}</td>
<td>{{ $task->activite->coordonnéeGPS ??"-" }}</td>

                        </tr>

        </div>
        @endforeach
        </tbody>
        <tfoot class="table-light">
                                            <tr class="text-center fw-bold">
                                                <td colspan="5">TOTAL</td>
                                                <td id="totalMontant">0</td>

                                                <td></td>
                                            </tr>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
$(document).ready(function() {
    $("#searchInput, #searchInputs, #searchInpute").on("keyup", function() {
        let titleValue = $("#searchInput").val().toLowerCase().trim();
        let descriptionValue = $("#searchInputs").val().toLowerCase().trim();
        let etatValue = $("#searchInpute").val().toLowerCase().trim();

        $("#categoryTable tr").each(function() {
            let title = $(this).find(".category-title").text().toLowerCase().trim();
            let description = $(this).find(".category-description").text().toLowerCase().trim();
            let etat = $(this).find(".category-etat").text().toLowerCase().trim();

            let matchTitle = titleValue === "" || title.startsWith(titleValue);
            let matchDescription = descriptionValue === "" || description.startsWith(descriptionValue);
            let matchEtat = etatValue === "" || etat.startsWith(etatValue);

            $(this).toggle(matchTitle && matchDescription && matchEtat);
        });
    });
});
</script>

{{--  <script>
$(document).ready(function() {
    $("#searchInput, #searchInputs, #searchInpute").on("keyup", function() {
        let value = $(this).val().toLowerCase().trim();

        $("#categoryTable tr").each(function() {
            let title = $(this).find(".category-title").text().toLowerCase();
            let description = $(this).find(".category-description").text().toLowerCase();
            let etat = $(this).find(".category-etat").text().toLowerCase(); // Ajout de la colonne "État"

            // Remplacement de includes() par startsWith()
            $(this).toggle(title.startsWith(value) || description.startsWith(value) || etat.startsWith(value));
        });
    });
});
</script>  --}}
 <script>
    function imprimerTable() {
        var contenu = document.getElementById('tableVente').outerHTML;
        var fenetreImpression = window.open('', '', 'height=600,width=800');

        fenetreImpression.document.write('<html><head><title>Impression</title>');
        fenetreImpression.document.write('<style>');
        fenetreImpression.document.write('table { width: 100%; border-collapse: collapse; }');
        fenetreImpression.document.write('th, td { border: 1px solid black; padding: 8px; text-align: center; }');
        fenetreImpression.document.write('</style>');
        fenetreImpression.document.write('</head><body>');
        fenetreImpression.document.write('<h2 style="text-align:center; color:green;text-transform: uppercase;">Activités suspendues</h2>');
        fenetreImpression.document.write(contenu);
        fenetreImpression.document.write('</body></html>');

        fenetreImpression.document.close();
        fenetreImpression.print();
    }
</script>
 <script>
        function calculerTotaux() {
            let totalMontant = 0;

            document.querySelectorAll('.montant').forEach(cell => {
                totalMontant += parseFloat(cell.innerText.replace(/\s/g, '')) || 0;
            });
           console.log(totalMontant);

            document.getElementById('totalMontant').innerText = totalMontant.toLocaleString();

        }

        window.onload = calculerTotaux;

    </script>
@endsection
