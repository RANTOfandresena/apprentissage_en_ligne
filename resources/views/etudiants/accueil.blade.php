@extends('base')

@section('titre', 'Accueil')

@include('etudiants.navbarEtudiants')

@section('contenu')
<div class="cours courrss">
    <h3> Voici les modules que vous devriez suivre </h3>
    <h2> Département : {{ $departement }}</h2>
    <div class="lecon">

        @foreach ($matieres as $matiere )
            <div>
                <h2>{{ $matiere->matiere }}</h2>
                <h3>Catégorie : {{ $matiere->categorie->categorie }}</h3>
                <section>
                    <div style="background-color:green;border-bottom-left-radius: 10px;width: 100%;border-bottom-right-radius: 10px;"> <a href="{{ route('etudiant.affichageCours', ['matiere' => $matiere->id, 'contenu' =>  $matiere->contenu_du_cours[0]->id]) }}"> Voir </a></div>
                </section>
            </div>
        @endforeach
    </div>
</div>

@endsection
