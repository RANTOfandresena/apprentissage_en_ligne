@extends('base')

@section('titre', 'Consultation des cours')

{{-- NAVBAR --}}
@include('professeur.navbarProf')

@section('contenu')
    <div class="niveau">
        @foreach ($matiere->contenu_du_cours as $contenu )
            <p> {{ $contenu->id }} </p>
            <div><a href="{{ route('professeur.affichageCours' , ['matiere' => $matiere->id, 'contenu' =>  $contenu->id ]) }}"> Niveau {{ $contenu->niveau }} </a></div>
        @endforeach

        <div style="width: 181px;"><a href="{{route('professeur.ajoutNiveau', ['matiere' => $matiere->id] )}}"> Ajouter un autre niveau  </a></div>
    </div>
    <div id="cours" data-id="{{$content->id}}"></div>
    @vite('resources/js/Cours/app.js')
@endsection
