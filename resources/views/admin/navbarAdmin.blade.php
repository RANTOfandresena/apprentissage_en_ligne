@section('navbar')
    <div class="navbar">
        <h1>logo</h1>
        <div class="link">
            <a href="#">Accueil</a>
            <a href="#">Profil</a>
            <a href="#">Examens</a>
            <a href="{{route('admin.professeur')}}">Engager un professeur</a>
            <form action="{{route('auth.logout')}}" method="post">
                @csrf
                @method("delete")
                <button> Déconnexion </button>
            </form>
        </div>

    </div>
@endsection
