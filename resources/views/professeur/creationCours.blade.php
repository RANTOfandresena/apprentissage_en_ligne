@extends('base')

@section('titre', 'Personalisé les cours')

{{-- NAVBAR --}}
@include('professeur.navbarProf')

@section('contenu')
    <h1> PERSONNALISEZ VOS COURS </h1>

    {{ Auth::user()->id }}
    <h3> Module : {{$matiere->matiere}} </h3>

    <p> Contenu du cours id : </p>

    @foreach ($matiere->contenu_du_cours as $contenu )
        <p> {{ $contenu->id }} </p>
    @endforeach

   <a href="{{route('professeur.ajoutNiveau', ['matiere' => $matiere->id] )}}"> <button> Ajouter un autre niveau </button> </a>

    <div id="cours" data-id="{{6}}"></div>
    @vite('resources/js/Cours/app.js')
@endsection
