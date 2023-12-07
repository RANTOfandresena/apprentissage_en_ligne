@extends('base')

@section('title', 'Authentification')

@section('home')
<div class="login">
    <div class="gauche"> </div>
    <form class="formulaire" action="{{ route("auth.login") }}" method="post">

        @csrf

        <h3>AUTHENTIFICATION</h3>
        <div>
            <label for="nom"> Nom ou Email: </label>
            <input type="text" name="email_or_name" id="nom">
        </div>
        <div>
            @error('email_or_name')
            {{ $message }}
            @enderror
        </div>

        <div>
            <label for="mdp"> Mot de passe: </label>
            <input type="password" name="password" id="mdp">
        </div>
        <div>
            @error('password')
            {{ $message }}
            @enderror
        </div>

        <button class="btn" type="submit">Se connecter</button>
        <a href="{{route('create.account')}}"> Créer un compte </a>
    </form>
</div>

@endsection
