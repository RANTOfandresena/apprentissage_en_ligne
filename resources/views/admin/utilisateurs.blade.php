@extends('base')

@section('titre', 'Utilisateurs')

@include('admin.navbarAdmin')

@section('contenu')

{{-- <div class="navigation">
    <button onclick="filtrerUtilisateurs('Tous')"> Tous </button>
    <button onclick="filtrerUtilisateurs('professeur')"> Professeurs </button>
    <button onclick="filtrerUtilisateurs('etudiants')"> Etudiants </button>
</div> --}}
<div class="infoUsers">
    @if ($etat = 'Tous')

    <div class="titre">
        <h2> Informations sur tous les étudiants </h2>
        <h2> Informations sur tous les étudiants </h2>
    </div>

    <div class="infoEtudiants filtre">
        @foreach ($info_etudiants as $etudiants )
            <div class="infoEtudiantsContenus">
                <span class="infoUserSpan"> Etudiant </span>
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
                            <div class="progress">
                                <div class="progress-bar" data-pourcentage="{{ $progression_pourcentage }}" id="" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            {{ $progression_pourcentage }}%
                            <br>
                        @endforeach
                    @endif
                </p>
            </div>
        @endforeach
    </div>
    </div>
    <div class="titre">
        <h2> Informations sur tous les professeurs </h2>
        <h2> Informations sur tous les professeurs </h2>
    </div>
    <div class="infoProfeseurs filtre">
        @foreach ($info_professeurs as $professeur)
            <div class="infoEtudiantsContenus">
                <span class="infoUserSpan"> Professeur </span>
                <div class="profilePicture"></div>
                <p> Nom : {{ $professeur->nom }} </p>
                <p> Prénoms : {{ $professeur->prenom }}</p>
                <p> Téléphone : {{ $professeur->telephone }}</p>
                <p> Email : {{ $professeur->email }}</p>
                <p> COURS CREER </p>
                <p>
                    @php
                         $matieres =  $professeur->matieres
                    @endphp
                    @if ($matieres->isEmpty())
                        <p> Aucune contribution </p>
                    @else
                        @foreach ($matieres as $matiere)
                            <p>
                                {{ $matiere->matiere }}
                                @php
                                    $contenus = $matiere->contenu_du_cours
                                @endphp
                                @foreach ( $contenus as  $contenu )
                                <span> {{  $contenu->etudiant->count()  }} apprenants </span>
                                @endforeach
                            </p>
                        @endforeach
                    @endif
                </p>
            </div>
        @endforeach

    </div>
    @endif
</div>
<div class="test">  </div>

@endsection
<script>
    document.addEventListener('DOMContentLoaded', function(){
        var progressBars = document.querySelectorAll('.progress-bar');
        console.log(progressBars.length);
        for(var i = 0; i != progressBars.length; i++)
        {
            var balise = progressBars[i];
            console.log(balise.dataset);
            var percentage = balise.dataset.pourcentage;
            balise.style.width = percentage + '%';
            balise.setAttribute('aria-valuenow', percentage);
        }
    });

    //  Fonction qui permet de filtrer les utilisateurs
    function filtrerUtilisateurs(utilisateur)
    {
        //Utiliser la reqêtte AJAX pour récupérer les informations filtrées
        fetch(`users/filtre/type_user/${utilisateur}`)
            .then(response => response.json())
            .then(data => {
                //Mise à jour de la liste de utilisateurs affichés
                console.log(data);
                // document.getElementById('test').innerHTML = data;
            })
            .catch(error => console.error('Erreur lors du filtrage de données : ', error));
    }
</script>
