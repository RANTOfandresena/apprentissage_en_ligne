@extends('base')

@section('title', 'Bienvenue professeur')

@include('professeur.navbarProf')

@section('contenu')
    <h1> Bienvenue </h1>
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
            margin: 10px;
            box-shadow: inset 1px 3px 6px 5px rgb(225 222 222);
            border-radius: 10px;
            float: left;
        }
        .lecon > div >section{
            width:100%;
            color:white;
            position:relative;
            bottom:-5px;
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
        a.AjoutMatiere{
            color: #000000;
        }
    </style>
    <div class="cours">
        <h3> Voici toutes les matières que vous avez créer </h3>
        <div class="lecon">

            @foreach ($matieres as $matiere )
                <div>
                    <h2>{{ $matiere->matiere }}</h2>
                    <h3>Catégorie : {{ $matiere->categorie->categorie }}</h3>
                    <section>
                        <div style="background-color:green;border-bottom-left-radius: 10px;">Voir</div>
                        <div style="background-color:red;border-bottom-right-radius: 10px;"><a href="{{route('professeur.creationCours', ['matiere' => $matiere->id])}}" class="matiere">Ameliorer</a></div>
                    </section>
                </div>
            @endforeach
            <div style="text-align: center;padding-top: -7%;">
               <a href="{{route('professeur.creationMatiere')}}" class="AjoutMatiere"> <p style="margin-top: 17%;">ajouter <br> une matiere </p> </a>
            </div>
        </div>
    </div>

@endsection
