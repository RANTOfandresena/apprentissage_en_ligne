@extends('base')

@section('title', 'Personalisé les cours')

{{-- NAVBAR --}}
@include('professeur.navbarProf')

@section('contenu')

    <p> Nom : {{ $professeur->nom }} </p>
    <p> Prénom : {{ $professeur->prenom }} </p>
    <p> Téléphone : {{ $professeur->telephone }}</p>
    <p> Email : {{ $professeur->email }}</p>
    <a href="{{route('professeur.resetPassword', ['professeur' => $professeur->user->id])}} "> <button> Changer de mot de passe </button> </a>
@endsection
