<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->


    {{--  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">  --}}
    <!-- Font Awesome -->
    {{--  <link rel="stylesheet" href="dashboard/plugins/fontawesome-free/css/all.min.css">  --}}
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    {{--  <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">  --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
      {{--  <link rel="stylesheet" href="dashboard/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">  --}}
    <!-- iCheck -->
      {{--  <link rel="stylesheet" href="{{asset('dashboard/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">  --}}

    <!-- JQVMap -->
    {{--  <link rel="stylesheet" href="{{asset('dashboard/plugins/jqvmap/jqvmap.min.css')}}">  --}}
    <!-- Theme style -->

<link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.min.css')}}" >

    {{--  <link rel="stylesheet" href="{{asset('dashboard/dist/css/adminlte.min.css')}}">  --}}
    <!-- overlayScrollbars -->
    {{--  <link rel="stylesheet" href="{{asset('dashboard/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">  --}}
    <!-- Daterange picker -->
    {{--  <link rel="stylesheet" href="{{asset('dashboard/plugins/daterangepicker/daterangepicker.css')}}">  --}}
    <!-- summernote -->
    {{--  <link rel="stylesheet" href="{{asset('dashboard/plugins/summernote/summernote-bs4.min.css')}}">  --}}
    <!-- Scripts -->
{{--  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">  --}}

<!-- DataTables CSS CDN -->
{{--  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.6/css/dataTables.bootstrap4.min.css">  --}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" integrity="sha512-gOQQLjHRpD3/SEOtalVq50iDn4opLVup2TF8c4QPI3/NmUPNZOk2FG0ihi8oCU/qYEsw4P6nuEZT2lAG0UNYaw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css">
    {{--  @vite(['resources/sass/app.scss', 'resources/js/app.js'])  --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        {{--  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                      {{ config('app.name', 'Laravel') }}  
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                          @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Connexion') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Inscription') }}</a>
                                </li>
                            @endif  
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Déconnexion') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>  --}}
        @if(count($errors)>0)
  <div class="container my-2">
      <div class="row">


          <div class="col-10 mx-auto p-3 my-2 alert alert-danger" role="alert" data-dismiss="alert">
              <button type="button" class="close" data-bs-dismiss="alert" aria-hidden="true">&times</button>
              </ul>
              @foreach ($errors->all() as $error)
              <li><strong>{{ $error }}</strong></li>
              @endforeach
              </ul>
          </div>
      </div>
  </div>
  @endif
  {{--  @if (Session::has('success'))
<div class="container my-2">
    <div class="row">
        <div class="col-10 mx-auto p-3 my-2 alert alert-success {{ Session::get('action')? 'float-right' : 'text-center' }}"
            role="alert" data-dismmiss="alert">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="false">&times</button>
            <strong>{{ Session::get('success')}}</strong>
            @if(Session::get('action'))
            <hr>
            <a href="{{ route(Session::get('action')) }}" class="btn btn-xs btn-success float-right">Continuer</a>
            @endif
        </div>
    </div>
</div>
@endif  --}}
@if (Session::has('success'))

<script>
    <script>
        swal("Message", "{{ Session::get('success') }}", 'success', {
            button: {
                text: "OK",
                visible: true,
                closeModal: true,
            },
            timer: 5000
        });
    </script>
{{--  <div class="container my-2">
    <div class="row">
        <div class="col-10 mx-auto p-3 my-2 alert alert-success alert-dismissible fade show {{ Session::get('action') ? 'float-right' : 'text-center' }}" role="alert" data-dismiss="alert">


            <button type="button" class="close"data-bs-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>{{ Session::get('success')}}</strong>
            @if(Session::get('action'))
            <hr>
            <a href="{{ route(Session::get('action')) }}" class="btn btn-xs btn-success float-right">Continuer</a>
            @endif
        </div>
    </div>
</div>  --}}
@endif


        <main class="py-0" >
            @yield('content')
        </main>
    </div>
</body>
</html>
<script src="{{asset('dashboard/plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('dashboard/plugins/jquery-ui/jquery-ui.min.js')}}"></script>

<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@if (Session::has('success'))
<script>

        swal( "{!!Session::get('success')!!}","", 'success', {
            button: true,
            button:"OK",
            timer: 5000,
        });



</script>
@endif
{{--  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>  --}}



