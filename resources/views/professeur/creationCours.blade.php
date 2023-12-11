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

    <div class="niveau">
        <div class="active"><a> niveau 1 </a></div>
        <div><a> niveau 2 </a></div>
        <div style="width: 181px;"><a href="{{route('professeur.ajoutNiveau', ['matiere' => $matiere->id] )}}"> Ajouter un autre niveau  </a></div>
    </div>
    <div id="cours" data-id="{{6}}"></div>
    @vite('resources/js/Cours/app.js')
@endsection
