@extends('base')

@section('titre', 'Personalisé les cours')

{{-- NAVBAR --}}
@include('professeur.navbarProf')

@section('contenu')
    <h1> PERSONNALISEZ VOS COURS </h1>

    {{ Auth::user()->id }}
    <h3> Module : {{$matiere->matiere}} </h3>

    <p> Contenu du cours id : </p>



    <div class="niveau">
        @foreach ($matiere->contenu_du_cours as $contenu )
            {{-- <p> {{ $contenu->id }} </p> --}}
            <div><a href="{{ route('professeur.creationCours' , ['matiere' => $matiere->id, 'contenu' =>  $contenu->id ]) }}"> Niveau {{ $contenu->niveau }} </a></div>
        @endforeach

        <div style="width: 181px;"><a href="{{route('professeur.ajoutNiveau', ['matiere' => $matiere->id] )}}"> Ajouter un autre niveau  </a></div>
    </div>
    {{$content}}
    <div id="cours" data-id="{{$content}}"></div>
    @vite('resources/js/Cours/app.js')
@endsection
