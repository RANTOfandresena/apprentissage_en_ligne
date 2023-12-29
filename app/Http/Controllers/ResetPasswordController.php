<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    // use ResetsPasswords;

    // Affiche le formulaire de réinitialisation de mot de passe
    public function showResetForm(Request $request, $token = null)
    {
        // Trouver l'utilisateur correspondant au token dans la base de données
        $user = User::where('email_verification_token', $token)->first();
        if($user)
        {
            return view('auth.resetPassword')->with(
                ['token' => $token, 'email' => $request->email,]
            );
        }
        return 'Utilisateur non reconnu';
    }

    // Réinitialise le mot de passe
    public function reset(Request $request)
    {
        $this->validate($request, [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $response = $this->broker()->reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) {
                $this->resetPassword($user, $password);
            }
        );

        if ($response == Password::PASSWORD_RESET) {
            return redirect()->route('login')->with('success', 'Votre mot de passe a été réinitialisé avec succès.');
        } else {
            return back()->withErrors(['email' => trans($response)]);
        }
    }
}
