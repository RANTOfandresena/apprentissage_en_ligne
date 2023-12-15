@section('navbar')

<div class="partie1">
    <div class="navbarAdmin">
        <div class="fondNavbar">
            <div class="linkAdmin">
                <a href="#">Accueil</a>
                <a href="#">Cours</a>
                <a href="#">Gestion compte utilisateur</a>
                <a href="{{route('admin.professeur')}}">Informations professeurs</a>
                <a href="#">Résultat des tests</a>
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
    <div class="rect3"></div>
    <div class="rect4"></div>
    <div class="rect5"></div>

    {{-- Phrases --}}
    <h1 class="ODATA"> ODATA-LEARNING </h1>
    <h2 class="Connaissance"> <span class="Connaissance">CONNAISSANCE</span> <br> A PORTER DE MAIN</h2>
</div>

<div class="partie2">
    <p class="titrePart">Les cours récement crées</p>
    <p class="PhraseAppel">Faîtes sortir leur potentiel</p>
    <button class="Voir_plus"> Voir plus </button>
</div>

@endsection
