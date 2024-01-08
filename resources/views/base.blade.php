<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/base.css')}}">
    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title> @yield('titre') </title>
</head>
<body>

    @php
        $routeName = request()->route()->getName();

        // echo($routeName);
    @endphp
    {{-- Utilisateurs connectés --}}
    @auth
                @php
                    $type_user = Auth::user()->type_user;
                @endphp


        {{-- ADMINISTRATEURS --}}
            {{-- ETUDIANTS --}}
                {{-- PROFESSEURS --}}
                <div> @yield('navbar') </div>
                <div> @yield('contenu') </div>

                {{-- Si l'utilisateur essaie de changer brutalement la route, on le redirige vers l'accueil approprié --}}
                @if($routeName == 'accueil')

                    @php
                        // header("Location". route($type_user.'.accueil'));
                        // exit();
                        return to_route($type_user.'.accueil');
                    @endphp
                @endif
                {{-- Affichage des messages --}}
                @if(session('success'))
                    <div class="message"> {{session("success")}} </div>
                @endif
    @endauth
    {{-- Utilisateurs non connectés --}}
    @guest
            {{-- Page d'accueil ou page d'authentification --}}
            <div style="overflow-y: hidden;">

                <div class="accueil2">
                    <div id="accueil"></div>
                    @vite('resources/js/accueil/app.js')
                </div>

                    <div class="accueil">
                        <h1 style="color: white; margin-top: 0px;">logo</h1>
                        <a href="{{ route('accueil') }}">Home</a>
                        <a href=" {{route('auth.login')}}">Connecter</a>
                        <a href="#">contact</a>
                        <a href="#">Lecon</a>
                        <input class="recherche" type="text" placeholder="recherche">

                    </div>
                    @yield('home')
                    @yield('contenuOffline')
            </div>
    @endguest
</body>
</html>
