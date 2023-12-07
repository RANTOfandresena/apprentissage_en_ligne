@section('navbar')
        <div class="navbar">
            <h1>logo</h1>
            <div class="link">
                <a href="{{route('professeur.accueil')}}">Accueil</a>

                {{-- Redirige vers la route du profil avec comme paramètre l'id de l'utilisateur --}}
                <a href="{{ route('professeur.profil', ['professeur' => Auth::user()->professeur->id]) }}">Profil</a>

                <a href="#">Examens</a>
                <a href="{{ route('professeur.creationMatiere')}}"> Créer une matière </a>
                <form action="{{route('auth.logout')}}" method="post">
                    @csrf
                    @method("delete")
                    <button> Déconnexion </button>
                </form>
        </div>
@endsection
