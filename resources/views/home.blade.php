@extends('layouts.app')
@extends('layouts.sidebar')
{{--  @section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header text-uppercase ">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection  --}}

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
                  <h3 class="card-title text-uppercase font-weight-bold  ">Tableau de bord </h3>


              </div>





              <!-- /.card-header -->
              <div class="card-body">

                <!-- Small boxes (Stat box) -->
                <div class="row">
                  <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                      <div class="inner">
                        @if($contrat->count()==0)
                          <h3>0</h3>
                        @else
                          <h3>{{$contrat->where('status','En cours')->count()}}</h3>
                        @endif


                        <p class="text-xs">Activités en Cours</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="#" class="small-box-footer">  {{--  <i class="fas fa-arrow-circle-right"></i>  --}}
                    </a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        @if($contrat->count()==0)
                        <h3>0</h3>
                      @else
                        <h3>{{$contrat->where('status','Non démarré') ->count()}}</h3>
                      @endif

                        <p class="text-xs">Activités non Démarrées</p>
                      </div>
                      <div class="icon">
                        <i   class="ion ion-stats-bars"></i>
                      </div>
                      <a href="#" class="small-box-footer">  {{--  <i class="fas fa-arrow-circle-right"></i> --}}</a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                      <div class="inner">
                        @if($contrat->count()==0)
                        <h3>0</h3>
                      @else
                        <h3>{{$contrat->where('status','Terminer')->count()}}</h3>
                      @endif

                        <p class="text-xs" >Activités Achevées</p>
                      </div>
                      <div class="icon">
                        <i  class="ion ion-person-add"></i>
                      </div>
                      <a href="#" class="small-box-footer">   {{-- <i class="fas fa-arrow-circle-right"></i> --}}</a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-2 col-6">
                    <!-- small box -->
                      <div class="small-box bg-primary">
                      <div class="inner">
                        @if($contrat->count()==0)
                        <h3>0</h3>
                      @else
                        <h3>{{$contrat->where('status','Suspendues')->count()}}</h3>
                      @endif

                        <p class="text-xs" >Activités Suspendues</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="#" class="small-box-footer">
                         {{--  <i class="fas fa-arrow-circle-right"></i>  --}}
                        </a>
                    </div>
                  </div>
                  <div class="col-lg-2 col-6">
                    <!-- small box -->
                    <div class="small-box bg-secondary">
                      <div class="inner">
                        @if($contrat->count()==0)
                        <h3>0</h3>
                      @else
                        <h3>{{$contrat->where('status','En difficulté')->count()}}</h3>
                      @endif

                        <p class="text-xs">Activités en Souffrance</p>
                      </div>
                      <div class="icon">
                        <i   class="ion ion-person-add"></i>
                      </div>
                      <a href="#" class="small-box-footer">   {{-- <i class="fas fa-arrow-circle-right"></i> --}}</a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-2 col-6">
                    <!-- small box -->
                  <div class="small-box bg-danger">
                      <div class="inner">
                        @if($contrat->count()==0)
                        <h3>0</h3>
                      @else
                        <h3>{{$contrat->where('status','Abandonnées')->count()}}</h3>
                      @endif

                        <p class="text-xs"  >Activités Abandonnées</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                      </div>
                      <a href="#" class="small-box-footer">
                         {{--  <i class="fas fa-arrow-circle-right"></i>  --}}
                        </a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>







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
