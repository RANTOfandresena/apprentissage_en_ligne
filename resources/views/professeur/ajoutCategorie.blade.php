@extends('base')

@section('titre', 'Categorie')

{{-- NAVBAR --}}
@include('professeur.navbarProf')

@section('contenu')
    <h4> Ajouter une nouvelle catégorie pour les cours : </h4>

    <form action="" method="post">

        @csrf
        <label for="categorie"> Nom de la catégorie : </label>
        <input type="text" name="categorie" id="categorie">
        <button> CONFIRMER </button>
    </form>

    <h5> Liste des catégories existantes </h5>
    <table>
        <tr>
            <th> Nom </th>
            <th> Date de création  </th>
        </tr>
        @foreach ( $category as $categorie )
            <tr>
                <td> {{ $categorie->categorie}} </td>
                <td> {{ $categorie->created_at}} </td>
            </tr>
        @endforeach

    </table>
@endsection
