@extends('base')

@section('title', 'Accueil')

@include('admin.navbarAdmin')

@section('contenu')
    <div class="partie2">
        <div class="coursRecents1">
            <p class="titrePart">Les cours récement crées</p>
            <p class="PhraseAppel">Faîtes sortir leur potentiel</p>
            <p></p>
            <button class="Voir_plus"> Voir plus </button>
        </div>

        {{-- Affichage des cours récents --}}
        <div class="coursRecents2">
            <h3 class="titreCours">Français</h3>
            <p class="descriptionCours">Description</p>
            <p class="category">Category:Langue</p>
            <p class="profTitulaire">Dafy</p>
        </div>
    </div>
    <div class="partie3">
        <div class="cadreImg">
            <div class="imagePart3"></div>
        </div>
        <div class="directivesAdmin">
            <h3 class="titre"> Quels sont vos privilèges en tant qu'administrateur? </h3>
            <div class="allFleche">
                @for ($i=1 ; $i<=4 ; $i++)
                    <div class="cadreFleche"></div>
                    <div class="fleche"></div>
                @endfor
            </div>
            <div class="directs">
                <p class="direct" id="direct1"> Approuver ou refuser la demande d'adhésion d'un utilisateur à ce site. </p>
                <p class="direct" id="direct2"> Créer, ajouter, consulter des cours ou des formations pour les utilisateurs. <br> Et aussi voir les résultats de tous les tests effectués.</p>
                <p class="direct" id="direct3"> Gérer la visibilité de chaque matière selon le département auquel appartiennent les utilisateurs.</p>
                <p class="direct" id="direct4"> Engager des professeurs ou des formateurs <br> pour créer le contenu des cours et les examens pour tester le niveau des étudiants. </p>
            </div>
        </div>
    </div>
    <div class="partie4">
        <h3> Nos professeurs </h3>
        <p class="presentation"> Les professeurs ayant effectués le plus de contribution </p>
        <div class="imgProf"></div>
    </div>
    {{-- <footer> <p class="footer"> ODATA-LEARNING </p> </footer> --}}

@endsection
