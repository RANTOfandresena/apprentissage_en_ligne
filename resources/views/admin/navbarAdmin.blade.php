@section('navbar')

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



@endsection
