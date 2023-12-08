@extends('base')

@section('title', 'Accueil')

@include('admin.navbarAdmin')

@section('contenu')

    <h1> Vous êtes connecté </h1>

    <a href="{{route('admin.professeur')}}"> <button type="button" class="btn btn-primary btn-lg"> Engager un professeur </button></a>
    <h2 style="text-align:center"> Liste des utilisateurs  qui demandent à être approuvés</h2>

    <table class="listUser">
        <tr class="tete">
            <th> Nom et prénoms </th>
            <th> Email </th>
            <th> Nom d'utilisateur </th>
            <th> Type d'utilisateur </th>
            <th> Action </th>
        </tr>
    <tbody class="list">
    @foreach ($usersData as $user )
    @php
        $type_user = $user->type_user;
    @endphp
        <tr>
            <td>  <p> {{ $user->type($type_user)?->nom }} {{ $user->type($type_user)?->prenom}}  </p> </td>
            <td>  <p> {{ $user->email }} </p> </td>
            <td>  <p> {{ $user->name }} </p> </td>
            <td>  <p> {{ $type_user }} </p> </td>
            <td style="display:block;">
                <a href="{{ route('admin.approuver', ['user' => $user->id]) }}"><div style="background-color: #8effa6;">Approuver</div></a>
                <a href=""><div class="background-color: #c16a6a;">Refuser</div></a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>


{{-- LISTE DES COURS CREER --}}

{{-- STYLE --}}

<style>
    .matiere{
        color:black;
    }
    <style>
    .cours{
        text-align: center;
        background-color: white;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .cours h2,h3{
        color: #06b3e3;
        text-align:center;
    }
    .lecon{
    display: table;
    }
    .lecon > div{
        width: 275px;
        height: 143px;
        margin: 23px;
        box-shadow: inset 1px 3px 6px 5px rgb(225 222 222);
        border-radius: 10px;
        float: left;
    }
    .lecon > div >section{
        width:100%;
        color:white;
        position:relative;
        bottom:37px;
        box-shadow: inset 1px 3px 6px 5px rgb(225 222 222);
        display:none;
        animation: apparition 0.5s;
    }
    @keyframes apparition {
        from {transform: translateY(30px);opacity:0;}
        to {transform: translateY(0);opacity:1;}
    }
    .lecon > div:hover section{
        display:block;
    }
    .lecon > div >section >div {
        float:left;
        width:50%;
        height:30px;
    }
    .lecon > div >section >a {
        float:left;
        width:50%;
        height:30px;
    }
</style>

<div class="cours">
    <h3> Voici toutes les matières existantes </h3>
    <div class="lecon">

        @foreach ($matieres as $matiere )
            <div>
                <h2>{{ $matiere->matiere }}</h2>
                <h3>Catégorie : {{ $matiere->categorie->categorie }} </h3>
                <h4> Professeur titulaire : {{ $matiere->proffesseur->prenom}} </h4>
                <section>
                    <div style="background-color:green;border-bottom-left-radius: 10px;">Voir</div>
                    <div style="background-color:red;border-bottom-right-radius: 10px;"><a href="{{route('professeur.creationCours', ['matiere' => $matiere->id])}}" class="matiere">Ameliorer</a></div>
                </section>
            </div>
        @endforeach
        <div style="text-align: center;padding-top: -7%;">
            <p style="margin-top: 17%;">ajouter <br> une matiere </p>
        </div>
    </div>
</div>

@endsection
