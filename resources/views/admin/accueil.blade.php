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
@endsection