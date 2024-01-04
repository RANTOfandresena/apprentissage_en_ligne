<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Contenu_du_cour;
use App\Models\Contenu_du_cour_etudiant;
use App\Models\Matiere;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EtudiantController extends Controller
{
    public function accueilRedirect()
    {
        return view('etudiants.accueil', [
            'matieres' => Matiere::all()
        ]);
    }
    public function affichageCours(Matiere $matiere, String $contenu)
    {
        // return Auth::user()->type('etudiants')->contenu_du_cours->find($contenu);
        // return Auth::user()->type('etudiants')->id;
        $info1= Contenu_du_cour_etudiant::where('etudiant_id','=',Auth::user()->type('etudiants')->id)->get();
        if(count($info1)==0){
            Contenu_du_cour_etudiant::create([
                'contenu_du_cour_id'=>$contenu,
                'etudiant_id'=>Auth::user()->type('etudiants')->id,
                'reponse_examen'=>'[]',
                'note'=>-1,
                'progression'=>1
            ]);
        }
        return view('etudiants.affichageCours',[
            'matiere' => $matiere,
            'content' => $contenu
        ]);
    }
    public function getCommentaire(Contenu_du_cour $contenu,string $stringId){
        return ['coms'=>$contenu->commentaire()->where('comentaires','like',$stringId.'%')->get(),'id'=> Auth::user()->id];
    }
    public function getNbCommentaire(Contenu_du_cour $contenu,string $stringId){
        return $contenu->commentaire()->where('comentaires','like',$stringId.'%')->count();
    }
    public function envoyerCommentaire(Contenu_du_cour $contenu,Request $request){
        $coms = Commentaire::create([
            'comentaires'   =>  $request->input('coms'),
            'user_id'       =>  Auth::user()->id
        ]);
        $coms->contenu_du_cours()->sync($contenu);
        return [
            'nom' => Auth::user()->name,
            'comentaires' => $request->input('coms'),
            'user' => true
        ];
    }
}