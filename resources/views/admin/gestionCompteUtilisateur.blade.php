@extends('base')

@section('title', 'Gestion des compte utilisateurs')

@include('admin.navbarAdmin')

@section('contenu')

<div class="partie2_compteUt">

    <h3> Statistique des utilisateurs de cette plateforme et des adhésions </h3>
    <div class="statistiquesCompte">
        <div class="NonApprouve">   <p class="infosStat"> <span> {{$utilisateurs_non_approuve}}</span>   Utilisateurs non approuvés </p>      </div>
        <div class="approuver">        <p class="infosStat"> <span>   {{$utilisateurs_approuve}} </span> Nombre d'adhésion approuvées </p>    </div>
        <div class="nbrEt">                 <p class="infosStat"> <span> {{$etudiants_inscrits}} </span> Nombre d'étudiants inscrits </p>     </div>
        <div class="nbrProf">              <p class="infosStat"> <span> {{$professeurs_engager}} </span> Nombre de professeurs engagés </p>   </div>
        <div class="nbrAdmin">                <p class="infosStat"> <span>  {{$administrateurs}} </span> Nombre d'administrateurs </p>        </div>
    </div>

        <h3 style="text-align:center"> Liste des utilisateurs  qui demandent à être approuvés</h3>

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
                    <a href="{{ route('admin.approuver', ['user' => $user->id]) }}"><div style="background-color: #00a723;">Approuver</div></a>
                    <a href=""><div class="background-color: #c16a6a;">Refuser</div></a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>


@endsection
