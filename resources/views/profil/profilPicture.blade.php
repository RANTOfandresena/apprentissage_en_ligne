@extends('base')

@section('titre', 'Photo de profil')

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
<form action="{{ route('profil.store')}}" method="post" enctype="multipart/form-data" id="formProfil">
    @csrf
    <input type="file" name="profilImage" id="profilImage">
    <button type="submit"> Envoyer </button>
</form>
@endsection
