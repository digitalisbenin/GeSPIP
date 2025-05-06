<aside style="height:400px;background-color: #A52A2A !important;" class="main-sidebar sidebar-dark-primary elevation-4 mt-5">
    <!-- Brand Logo -->
    {{--  <a href="/" class="brand-link">
      <img src="{{ asset('dashboard/dist/img/G.png')}}" alt="G" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{config("app.name")}}</span>
    </a>  --}}

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      {{--  <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dashboard/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="" class="d-block"> {{ auth()->User()->name}}</a>
        </div>
      </div>  --}}
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column text-white" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item">
            <a href="{{url('contrat')}}" class="nav-link">
              <i class="nav-icon fas fa-dashboard text-white"></i>
              <p class="text-white">
                Tableau de bord
                {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
          <li class="nav-item text-white">
            <a href="{{url('contrats')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white">
                Enregistrement des...
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('contratses')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white" >
               Gestion/Suivi des...
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
          <hr style="color:white;">
           <h6 class="text-white text-center">RECHERCHER D'UN PROJET</h6>
          <hr style="color:white;">
           <li class="nav-item">
            <a href="{{url('toutes-les-activites')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white" >
                Toutes Les Activités
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('activites-en-cours')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white">
                Activités En Cours
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('activites-non-demarre')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white" >
                Activités Non Dém...
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('activites-achevres')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white">
                Activités Achevrées
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('activites-suspendues')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white">
                Activités Suspendues
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('activites-en-souffrances')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white">
                Activités En Souffra...
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('activites-abandonnees')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white">
                Activités Abandonn...
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('activites-par-nature')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white" >
                Activités Par Nature
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>

           <li class="nav-item">
            <a href="{{url('activites-par-projet')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white">
                Activités Par Projet
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('activites-par-entreprise')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white" >
                Activités Par Entrepri...
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('activites-par-localite')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white">
                Activités Par Localité
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{url('activites-periodiques')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white">
                Activités Périodiques
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
{{--
          <hr style="color:white;" >
          <h6 class="text-white text-center">ETAT</h6>
          <hr style="color:white;" >
          <li class="nav-item">
            <a href="#" class="nav-link">

              <i class="nav-icon fas fa-folder"></i>

              <p>
                Etat
                 {{--  <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>  --}}


          <hr style="color:white;">
            <h6 class="text-white text-center text-md">PARAMETRES</h6>
          <hr style="color:white;">
          <li class="nav-item">
            <a href="{{url('activites')}}" class="nav-link">

              <i class="nav-icon fas fa-folder text-white"></i>

              <p class="text-white" >
                Activités
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
          {{--  <li class="nav-item">
            <a href="{{url('departements')}}" class="nav-link">
              <i class="nav-icon fas fa-users text-white"></i>
              <p class="text-white">
                Departements

                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('communes')}}" class="nav-link">
               <i class="nav-icon fas fa-users"></i>
              <i class=" nav-icon far fa-address-card text-white"></i>
              <p class="text-white">
                Communes

                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>  --}}
          {{--  <li class="nav-item">
            <a href="{{url('entreprises')}}" class="nav-link">
              <i class="nav-icon fas fa-file"></i>
              <i class=" nav-icon fas fa-address-book"></i>
              <p>
                Entreprise
                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>  --}}
          <li class="nav-item">
            <a href="{{url('nature-activites')}}" class="nav-link">
              <i class="nav-icon fas fa-list text-white"></i>
              <p class="text-white">
                Nature-activités
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
          {{--  <li class="nav-item">
            <a href="{{url('mode-executions')}}" class="nav-link">
              <i class="nav-icon fas fa-list"></i>
              <p>
                Mode-executions
                  <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>  --}}
          <li class="nav-item">
            <a href="{{url('type-projets')}}" class="nav-link">

              <i class="nav-icon fas fa-clipboard text-white"></i>
              <p class="text-white">
                Type-Projets
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('projets')}}" class="nav-link">

              <i class="nav-icon fas fa-clipboard text-white"></i>
              <p class="text-white">
                Projets
                 {{--  <span class="right badge badge-danger">New</span>  --}}
              </p>
            </a>
          </li>


<hr style="color:white;">
            <h6 class="text-white text-center text-md">GESTION DES UTILISATEURS</h6>
          <hr style="color:white;">
          <li class="nav-item">
            <a href="{{url('roles')}}" class="nav-link">
              <i class="nav-icon fas fa-users text-white"></i>
              <p class="text-white">
                Role

                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{url('users')}}" class="nav-link">
               <i class="nav-icon fas fa-users"></i>

              <p class="text-white">
                Utilisateurs

                <!-- <span class="right badge badge-danger">New</span> -->
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="nav-icon fas fa-door-out"></i>
              <p class="text-white">

            Déconnexion
                </p>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
