@extends('base')

@section('titre', 'Utilisateurs')

@include('admin.navbarAdmin')

@section('contenu')

<div class="navigation">
    <a href="#"> Tous </a>
    <a href="#"> Professeurs </a>
    <a href="#"> Etudiants </a>
</div>
<div class="infoUsers">
    @if ($etat = 'Tous')
    <p class="infoEtudiantsIntro"> Informations sur tous les étudiants </p>
    <div class="infoEtudiants">
        @foreach ($info_etudiants as $etudiants )
            <div class="infoEtudiantsContenus">
                <div class="profilePicture"></div>
                <p> Nom : {{ $etudiants -> nom }}</p>
                <p> Prénom : {{ $etudiants -> prenom }}</p>
                <p> Téléphone : {{ $etudiants -> telephone  }}</p>
                <p> Email : {{ $etudiants -> email }} </p>
                <p> Département : {{ $etudiants -> departement -> nom}}</p>
                <p> APPRENTISSAGE </p>
                <p>

                    @php
                        $matieres = $etudiants -> departement -> matieres;
                    @endphp
                    @if ($matieres->isEmpty())
                        Aucune matière à apprendre
                    @else
                        @foreach ($matieres as $matiere)
                            {{ $matiere->matiere }}:

                            @php
                                $progression_etudiant = $matiere->progressionContenu_du_cour($etudiants);
                                $total = $matiere -> progression();
                                if($total==0)
                                {
                                    $total = 1;
                                }
                                $progression_pourcentage = ($progression_etudiant / $total ) * 100;
                            @endphp
                            {{ $progression_pourcentage }}%
                            <br>
                        @endforeach
                    @endif
                </p>
            </div>
        @endforeach
    </div>
    </div>
    <p class="infoEtudiantsIntro"> Information sur tous les professeurs </p>
    <div class="infoProfeseurs">

    </div>
    @endif
</div>
@endsection
