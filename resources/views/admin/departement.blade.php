@extends('base')

@section('titre', 'A propos de tous les cours')

@include('admin.navbarAdmin')

@section('contenu')

{{-- Prend le nom de la route actuelle --}}

@php
     $routeName = request()->route()->getName();
@endphp
@if($routeName == 'admin.departement')
    {{-- Ajouter un département  --}}
    <form method="post" id="add_dep">
        @csrf
        <label for="nom_dep"> Nom du departement </label>
        <input type="text" name="departement" id="nom_dep">
        <button> Valider </button>
    </form>

    <h4> Liste des départements existants </h4>
    <table id="info_dep">
        <tr>
            <th> N° </th>
            <th> Nom du département </th>
            <th> Effectifs </th>
            <th> Actions </th>
        </tr>

        @foreach ($departements as $departement)
            @php
                $num = $loop->index + 1
            @endphp
            <tr>
                <td> {{ $num }} </td>
                <td> {{ $departement->nom }} </td>
                <td> {{ $departement->etudiant->count() }}</td>
                <td id="btn_dep">
                    <a href="{{ route('admin.depConsulter', ['departement'  => $departement ]) }}" id="consult_depA"> <button id="consult_dep"> Consulter </button> </a>
                    <a href="http://" id="suppr_depA"> <button id="suppr_dep"> Supprimer </button> </a>
                </td>
            </tr>
        @endforeach
@endif
@if($routeName == 'admin.depConsulter')
    <a href="{{ route('admin.departement') }}"> <button> Retour </button></a>
    <div class="card_infos">
        <h4 id="titre_dep"> {{ $departements->nom }}</h4>
        <h3> Liste des membres du département </h3>
        <table id="">
            <tr>
                <th> Nom et prénoms </th>
                <th> Téléphone </th>
                <th> Email </th>
            </tr>
            @foreach ($departements->etudiant as $etudiant)
            <tr>
                <td> {{ $etudiant->nom }} </td>
                <td> {{ $etudiant->telephone }} </td>
                <td> {{ $etudiant->email }} </td>
            </tr>
            @endforeach
        </table>
        <h3> Cours </h3>
        @foreach ($departements->matieres as $matiere)
            <button> {{ $matiere->matiere }} </button>
        @endforeach
    </div>
@endif


    </table>
@endsection

