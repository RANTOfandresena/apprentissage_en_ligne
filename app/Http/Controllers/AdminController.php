<?php

namespace App\Http\Controllers;

use App\Http\Requests\EngagerProf;
use App\Models\Administrateur;
use App\Models\Etudiant;
use App\Models\Matiere;
use App\Models\Proffesseur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function accueil()
    {
        // $a=User::find(1);
        // dd($a->professeur->nom);
        // return User::where('approved', false)->get();
        return view('admin.accueil', [
            'matieres'    => Matiere::all()
        ]);
    }

    public function gestionCompteRedirect(){
        return view('admin.gestionCompteUtilisateur', [
            // Renvoie le nombre d'utilisateurs non approuvés
            'utilisateurs_non_approuve' => User::where('approved', false)->count(),

             // Renvoie le nombre d'utilisateurs approuvés*
            'utilisateurs_approuve' => User::where('approved', true)->count(),

            //Renvoie le nombre d'étudiants inscrits
            'etudiants_inscrits'  => Etudiant::all()->count(),

            //Renvoie le nombre de professeurs inscrits
            'professeurs_engager' => Proffesseur::all()->count(),

            //Renvoie le nombre de administrateurs inscrits
            'administrateurs'  => Administrateur::all()->count(),
            
            // Renvoie la liste des utilisateurs non approuvés
            'usersData'  => User::where('approved', false)->get(),
        ]);
    }

    public function engager()
    {
        return view('admin.professeur');
    }

    public function insertion(EngagerProf $request)
    {
        $post = Proffesseur::create($request->validated());
        User::create([
            'name' => $request->input('nom'),
            'email' => $request->input('email'),
            'type_user' => 'professeur',
            'password' => Hash::make($request->input('email')),
            'proffesseur_id	' => $post->id
        ]);
        // $user_id = User::latest()->first()->id;
        // $post->user_id = $user_id;
        // $post->save();
        return redirect()->route('admin.accueil')->with("success", "L'article a bien été sauvegardé");
    }

    //APPROBATION D'UN COMPTE UTILISATEUR
    public function rediRectApprouver(User $user)
    {
        return view('admin.infoUser',[
            'user' => $user,
            'type_user' => $user->type_user
        ]);
    }
    public function approuver(User $user)
    {
        // return 'ok';
        $user->update(['approved' => true]);
        return redirect()->route('admin.accueil')->with("success", "L' utilisateur a bien été approuvé");
    }
}
