@extends('base')

@section('titre', 'Résultats des tests')

@include('admin.navbarAdmin')

@section('contenu')
<table>
    <tr>
        <th> N° </th>
        <th> Nom et prénoms </th>
        <th> Département </th>
        <th> Cours </th>
        <th> Notes </th>
    </tr>
    @foreach ($etudiants as $etudiant)
        <tr>
            <td>     {{ $loop->index + 1 }}  </td>
            <td>     {{ $etudiant['etudiant']->nom}}   {{$etudiant['etudiant']->prenom}}  </td>
            <td>     {{ $etudiant['etudiant']->departement->nom }}  </td>

            @foreach ($etudiant['etudiant']->contenu_du_cours as $contenu )
                <td>     {{ $contenu->matiere[0]->matiere }}  </td>
            @endforeach
            <td>  {{  $etudiant['note'] }} </td>
        </tr>
    @endforeach
</table>
@endsection
