{{--  @extends('layouts.app')

@section('content')
<div class="container" >

    <div class="row justify-content-center">
        <div style=" margin-top:100px;" class="col-md-6">
          <h1   class="text-white mb-15 "> Bienvenue sur la plateforme de Gestion et du Suivi du Programme d'Investissements Publics du MDN  (GeSPIP)</h1>
        </div>
        <div  style=" margin-top:100px;" class="col-md-6 d-flex justify-content-center">
            <div class="card  ">
                <div class="card-header fs-4">{{ __('Connexion') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4 justify-content-center">
                                <div class="form-check text-center mb-3">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se Souvenir de moi') }}
                                    </label>
                                </div>
                               <div class="text-center" >
                                   <button type="submit" class="btn btn-primary ">
                                    {{ __('Connexion') }}
                                </button>
                                <div>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublier ?') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class=" mb-0">
                            <div class="col-md-8 offset-md-4">

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection  --}}
{{--  <!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeSPIP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .facebook-text {
            font-size: 3rem;
            font-weight: bold;
            color: #1877f2;
        }
        .login-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .login-box input {
            height: 50px;
            font-size: 1.2rem;
        }
        .btn-login {
            background-color: #1877f2;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
        }
        .btn-login:hover {
            background-color: #166fe5;
        }
        .btn-new-account {
            background-color: #42b72a;
            color: white;
            font-size: 1rem;
            font-weight: bold;
        }
        .btn-new-account:hover {
            background-color: #36a420;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 text-center mb-4">
                <div class="facebook-text">GeSPIP</div>
                <p class="fs-4">Bienvenue sur la plateforme de Gestion et du Suivi du Programme d'Investissements Publics du MDN  (GeSPIP)</p>
            </div>

            <div class="col-md-4">
                <form method="POST" action="{{ route('login') }}">
                        @csrf
                <div class="login-box">
                    <input type="text" class="form-control mb-3" placeholder=" E-mail"name="email" value="{{ old('email') }}" required autocomplete="email" autofocus >
                    <input type="password" class="form-control mb-3 @error('email') is-invalid @enderror" placeholder="Mot de passe">
                    <button class="btn btn-login w-100 mb-3">Se connecter</button>
                    <div class="text-center mb-3">
                        <a href="#" class="text-decoration-none">Mot de passe oublié ?</a>
                    </div>
                  <hr>
                    <div class="text-center">
                        <button class="btn btn-new-account w-100">Créer un nouveau compte</button>
                    </div>
                </div>
                </form>
            </div>

        </div>
    </div>
</body>
</html>  --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeSPIP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            background-color: #f0f2f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .facebook-text {
            font-size: 3rem;
            font-weight: bold;
            color: #1877f2;
        }
        .login-box {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        .login-box input {
            height: 50px;
            font-size: 1.2rem;
        }
        .btn-login {
            background-color: #1877f2;
            color: white;
            font-size: 1.2rem;
            font-weight: bold;
        }
        .btn-login:hover {
            background-color: #166fe5;
            color: white;
        }
        .btn-new-account {
            background-color: #42b72a;
            color: white;
            font-size: 1rem;
            font-weight: bold;
        }
        .btn-new-account:hover {
            background-color: #36a420;
        }
        .password-container {
            position: relative;
        }
        .password-container input {
            padding-right: 40px;
        }
        .password-container .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            display: none;
        }
        .scrolling-container {
            position: absolute;
            top: 90px;
            left: 20%;
            transform: translateX(-10%);
            width: auto; /* Ajuste la largeur selon ton besoin */
            overflow: hidden;
            white-space: nowrap;
        }
        
        .scrolling-text {
            display: inline-block;
            font-size: 1.5rem;
            font-weight: bold;
            color: black;
            animation: scrollText 30s linear infinite;
        }

        @keyframes scrollText {
            from {
                transform: translateX(100%);
            }

            to {
                transform: translateX(-100%);
            }
        }

        /*  .scrolling-text {
            display: inline-block;
            white-space: nowrap;
            animation: scrollText 20s linear infinite;
        }  */
       /* .scrolling-text {
            position: absolute;
            top: 90px;
            left: 100%;
            white-space: nowrap;
            font-size: 1.5rem;
            font-weight: bold;
            color: black;
            animation: scrollText 30s linear infinite;
        }*/
        .header-text {
            position: absolute;
            top: 90px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 1.5rem;
            font-weight: bold;
            color: black;
            white-space: nowrap;
        }
    </style>
</head>
{{--  <body>
    <div class="position-absolute top-0 start-50 translate-middle-x mt-1">
        <h3 class="wow fadeInUp text-center scrolling-text" data-wow-delay=".5s" style="color: #000;">
            Bienvenue sur la Plateforme E-learning de la DCSCA
        </h3>
    </div>
    <div class="container">

        <div class="row align-items-center">
            <div class="col-md-8 text-center mb-4">
                <div class="facebook-text">GeSPIP</div>
                <p class="fs-4">Bienvenue sur la plateforme de Gestion et du Suivi du Programme d'Investissements Publics du MDN  (GeSPIP).</p>
            </div>
            <div class="col-md-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                <div class="login-box">
                    <input type="text" class="form-control mb-3 @error('email') is-invalid @enderror " placeholder="E-mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                     @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    <div class="password-container mb-3">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe">
                        <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                         @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
                    <button type="submit" class="btn btn-login w-100 mb-3">Se connecter</button>
                    <div class="text-center mb-3">
                        <a href="{{ route('password.request') }}" class="text-decoration-none">Mot de passe oublié ?</a>
                    </div>
                    {{--  <hr>
                    <div class="text-center">
                        <button class="btn btn-new-account w-100">Créer un nouveau compte</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <script>
        const passwordField = document.getElementById("password");
        const togglePassword = document.getElementById("togglePassword");

        passwordField.addEventListener("input", function() {
            if (passwordField.value.length > 0) {
                togglePassword.style.display = "block";
            } else {
                togglePassword.style.display = "none";
            }
        });

        togglePassword.addEventListener("click", function() {
            if (passwordField.type === "password") {
                passwordField.type = "text";
                this.classList.remove("fa-eye");
                this.classList.add("fa-eye-slash");
            } else {
                passwordField.type = "password";
                this.classList.remove("fa-eye-slash");
                this.classList.add("fa-eye");
            }
        });
    </script>
</body>  --}}
<body>
    <div class="scrolling-container">
    <div class="scrolling-text" >
        <h3 >
            Bienvenue sur la plateforme de Gestion et du Suivi du Programme d'Investissements Publics du MDN  (GeSPIP)
        </h3>
    </div>
    </div>

    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8 text-center mb-4">
               
                <p style="text-align: justify;" class="fs-4 text-justify ">GeSPIP est un outil conçu pour optimiser la gestion et le suivi des projets d'investissement
                     public au sein du Ministère de la Défense Nationale (MDN). Cette plateforme centralise les informations
                      essentielles, facilite la coordination entre les différentes parties prenantes et améliore la 
                      transparence dans l'exécution des projets.</p>
            </div>
            <div class="col-md-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="login-box">
                        <input type="text" class="form-control mb-3 @error('email') is-invalid @enderror" placeholder="E-mail" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <div class="password-container mb-3">
                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe">
                            <i class="fas fa-eye toggle-password" id="togglePassword"></i>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-login w-100 mb-3">Se connecter</button>
                        <div class="text-center mb-3">
                            <a href="{{ route('password.request') }}" class="text-decoration-none">Mot de passe oublié ?</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
