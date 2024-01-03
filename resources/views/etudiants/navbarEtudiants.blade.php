@section('navbar')

@php
     $routeName = request()->route()->getName();
@endphp
<div class="partie1">
            <div class="navbar">
            <h1>logo</h1>
            <div class="link">
                <a href="#">Accueil</a>

                {{-- Redirige vers la route du profil avec comme paramètre l'id de l'utilisateur --}}
                <a href="#">Profil</a>

                <a href="#">Examens</a>
                <a href="#"> matière </a>
                <form action="{{route('auth.logout')}}" method="post">
                    @csrf
                    @method("delete")
                    <button> Déconnexion </button>
                </form>
        </div>



    {{-- Ces images et formes ne sont à afficher que dans la page d'accueil --}}
    @if($routeName == 'admin.accueil')
            {{-- Contient l'image de la femme --}}
            <div class="image">

            </div>

            {{-- Décorations --}}
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3">
                    {{-- Phrases --}}
                <h1 class="ODATA"> ODATA-LEARNING </h1>
                <h2 class="Connaissance"> <span class="Connaissance">CONNAISSANCE</span> A PORTER DE MAIN</h2>
            </div>
            <div class="rect4"></div>
            <div class="rect5"></div>
            <div class="points1"></div>
            <div class="points2"></div>
    @endif
    @if($routeName != 'admin.accueil')
            <style>
                div.navbarAdmin{
                    background-color: #00143d;
                }
            </style>
    @endif
</div>

@endsection
