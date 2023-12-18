@section('navbar')

@php
     $routeName = request()->route()->getName();
@endphp
<div class="partie1">
    <div class="navbarAdmin">
        <div class="fondNavbar">
            <div class="linkAdmin">
                <a href="#"
                    @if($routeName == 'admin.accueil')
                        class="active"
                    @endif>
                Accueil</a>
                <a href="#"
                    @if($routeName == 'a')
                        class="active"
                    @endif
                >Cours</a>
                <a href="#"
                    @if($routeName == 'b')
                        class="active"
                    @endif
                >Gestion compte utilisateur</a>
                <a href="{{route('admin.professeur')}}"
                    @if($routeName == 'c')
                        class="active"
                    @endif
                >Informations professeurs</a>
                <a href="#"
                    @if($routeName == 'd')
                        class="active"
                    @endif
                >Résultat des tests</a>
                <input type="search" name="" id="" placeholder="RECHERCHE" class="recherche_admin">
                <form action="{{route('auth.logout')}}" method="post">
                    @csrf
                    @method("delete")
                    <button class="btn_deconnexion_admin"> Déconnexion </button>
                </form>
            </div>
        </div>
    </div>

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

</div>

@endsection
