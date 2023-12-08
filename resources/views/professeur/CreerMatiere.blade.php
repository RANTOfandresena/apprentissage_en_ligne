@extends('base')

@section('titre', 'Créer une nouvelle matière')

{{-- NAVBAR --}}
@include('professeur.navbarProf')

@section('contenu')

    <h1> INTRODUISEZ UNE NOUVELLE MATIERE </h1>

    <form action="" method="post">

        @csrf
        <div>
            <label for="matiere"> Entrer le nom de votre module : </label>
            <input type="text" name="matiere" id="matiere" value="{{old('matiere', 'Nom de la matière')}}">
        </div>
        @error('matiere')
                {{ $message }}
        @enderror
        <p></p>
        <div>
            <label for="categorie"> Choisissez une catégorie : </label>
            <select name="categorie_id" id="categorie">
                @foreach ($category as $categorie)
                   <option value="{{ $categorie->id }}"> {{$categorie->categorie}} </option>
                @endforeach
            </select>
        </div>
            @error('categorie_id')

            @enderror
            <p></p>
        <div>
            <label for="description"> Ajouter une description de la matière : </label>
            <textarea name="description" id="description" cols="30" rows="10" value="{{ old('description', 'Nom_matiere a pour finalité d\'enseigner les bases du.... et de maîtriser le... ') }}">

            </textarea>
        </div>
            @error('description')

            @enderror
            <p></p>
        <button> VALIDER </button>
    </form>
    <a href="{{ route('professeur.ajoutCategorie') }}"> <button> Ajouter une nouvelle catégorie </button></a>



@endsection
