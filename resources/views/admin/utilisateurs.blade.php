@extends('base')

@section('titre', 'Utilisateurs')

@include('admin.navbarAdmin')

@section('contenu')

<div class="navigation">
    <a href="#"> Professeurs </a>
    <a href="#"> Etudiants </a>
</div>
<div class="infoUsers">
    @if ($etat = 'Tous')
    <div class="infoEtudiants">
        <p> Informations sur tous les étudiants </p>
        @foreach ($info_etudiants as $etudiants )
            <p> Nom : {{ $etudiants -> nom }}</p>
            <p> Prénom : {{ $etudiants -> prenom }}</p>
            <p> Téléphone : {{ $etudiants -> telephone  }}</p>
            <p> Email : {{ $etudiants -> email }} </p>
            <p> Département : {{ $etudiants -> departement -> nom}}</p>
            <p> nom_matiere

                @php
                    $matieres = $etudiants -> departement -> matieres;
                @endphp
                @foreach ($matieres as $matiere)
                    {{ $matiere->matiere }},

                    : progression
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
                @endforeach

            </p>
        @endforeach
    </div>
    <div class="infoProfeseurs">
        <p> Information sur tous les professeurs </p>
    </div>
    @endif
</div>
@endsection
