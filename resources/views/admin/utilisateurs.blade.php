@extends('base')

@section('titre', 'Utilisateurs')

@include('admin.navbarAdmin')

@section('contenu')

        <div class="navigation">
            <a href="#"> Professeurs </a>
            <a href="#"> Etudiants </a>
        </div>
        <div class="infoUsers">
            @if ($etat = 'Tous')
                    <p> Informations sur tous les étudiants </p>
                        @foreach ($info_etudiants as $etudiants )
                                <p> Nom : </p>
                                <p> Prénom : </p>
                                <p> Téléphone : </p>
                                <p> Email : </p>
                                <p> Département : </p>
                        @endforeach
                    <p> Information sur tous les professeurs </p>
            @endif
        </div>
@endsection
