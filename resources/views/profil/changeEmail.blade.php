@extends('base')

@section('titre', 'Adresse email')

@php
    $user = Auth::user()->type_user;
@endphp

@if ($user=='admin')
    @include('admin.navbarAdmin')
@elseif ($user=='etudiants')
    @include('etudiants.navbarEtudiants')
@elseif ($user=='professeur')
    @include('professeur.navbarProf')
@endif

@section('contenu')
    <form action="{{ route('email.store', ['userId' => Auth::user()->id])}}" method="post" id="formProfil">
        @csrf
        <input type="email" name="email" id="email">
        <button> Valider </button>
    </form>
@endsection
