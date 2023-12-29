<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verify($token)
    {
        // Trouver l'utilisateur correspondant au token dans la base de données
        $user = User::where('email_verification_token', $token)->first();

        if ($user) {
            // Marquer l'utilisateur comme ayant vérifié son e-mail
            $user->email_verified_at = now(); // Utilisation de Laravel pour marquer l'e-mail comme vérifié
            $user->email_verification_token = null; // Effacer le token de vérification
            $user->save();

            // Redirection vers une page de succès ou un message de succès
            return redirect()->route('verification.success');
        }

        //Si l'adresse email est introuvable
        if (!$user) {
            return back()->withErrors(['email' => 'Adresse e-mail introuvable']); // Retourne une erreur vers la vue précédente
        }

        // Redirection vers une page d'échec ou un message d'échec
        return redirect()->route('verification.error');
    }
}
