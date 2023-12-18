<?php

namespace App\Http\Controllers;

use App\Http\Requests\EngagerProf;
use App\Models\Etudiant;
use App\Models\Proffesseur;
use App\Models\Departement;
use App\Models\User;
use App\Models\Administrateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccueilController extends Controller
{
    public function redirection()
    {
        //Création compte admin par défaut
        // $post = Administrateur::create([
        //     'email' => 'angevoni@gmail.com',
        //     'post'=> 'stagiaire'
        // ]);
        // User::create([
        //     'name' => 'Voni',
        //     'email' => $post->email,
        //     'type_user' => 'admin',
        //     'password' => Hash::make('a'),
        //     'administrateur_id'=> $post->id
        // ]);
        return view('accueil.home');
    }
    public function video()
    {
        return view('video');
    }

    public function createAccount()
    {
        // Departement::create([
        //     'nom' => ' Service Client'
        // ]);
        return view('accueil.inscription');
    }

    public function getDepartement(){
        return Departement::all();
    }

    // Création de compte
    public function storeAccount(Request $request)
    {
        $type_user = $request->input('type_user');
        if($type_user == 'professeur')
        {
            // $post = Proffesseur::create($request->validated());

            $post = Proffesseur::create([
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'telephone' => $request->input('telephone'),
                'email' => $request->input('email'),
            ]);
            User::create([
                'name' => $request->input('nom'),
                'email' => $request->input('email'),
                'type_user' => 'professeur',
                'password' => Hash::make($request->input('email')),
                'proffesseur_id'=> $post->id
            ]);
        }
        else if($type_user == 'etudiants')
        {
            $post = Etudiant::create([
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'telephone' => $request->input('telephone'),
                'email' => $request->input('email'),
                'departement_id'=> $request->input('departement')
            ]);
            User::create([
                'name' => $request->input('nom'),
                'email' => $request->input('email'),
                'type_user' => 'etudiants',
                'password' => Hash::make($request->input('email')),
                'etudiant_id'=> $post->id
            ]);
        }
        else if($type_user == 'admin'){
            $post = Administrateur::create([
                'email' => $request->input('email'),
                'post'=> $request->input('post')
            ]);
            User::create([
                'name' => $request->input('nom'),
                'email' => $request->input('email'),
                'type_user' => 'admin',
                'password' => Hash::make($request->input('email')),
                'administrateur_id'=> $post->id
            ]);
        }

        return "Votre compte a bien été crée, vous devriez attendre l'approbation de l'admin";// return redirect()->route('accueil')->with("success", "Votre compte a bien été crée, vous devriez attendre l'approbation de l'admin");

    }
}
