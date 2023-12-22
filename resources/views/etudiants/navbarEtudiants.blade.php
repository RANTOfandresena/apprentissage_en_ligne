@section('navbar')

@php
     $routeName = request()->route()->getName();
@endphp
<div class="partie1">
    <div class="navbarAdmin">
        <div class="fondNavbar">
            <div class="linkAdmin">
                <a href="#">
                Accueil</a>
                <a href="#">Cours</a>
                <a href="#">Profil</a>
                <a href="#">Profil</a>
                <input type="search" name="" id="" placeholder="RECHERCHE" class="recherche_admin">
                <form action="{{route('auth.logout')}}" method="post">
                    @csrf
                    @method("delete")
                    <button class="btn_deconnexion_admin"> Déconnexion </button>
                </form>
            </div>
        </div>
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
