<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;

class ResetPasswordController extends Controller
{
    // use ResetsPasswords;

    // Affiche le formulaire de réinitialisation de mot de passe
    public function showResetForm(Request $request)
    {
        // Trouver l'utilisateur correspondant au token dans la base de données
        $user = User::where('reset_password_token', $request->token)->first();
        if($user)
        {
            return view('auth.resetPassword')->with([
                'token' =>  $request->token,
                'email' => $request->email,
                'user'  => $user,
                ]
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
            'password' => 'required|confirmed|min:5',
        ]);

        $response = Password::broker()->reset(
     $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password)
            {
                $this->resetPassword($user, $password);
            }
        );
        return Password::PASSWORD_RESET;
        // if ($response == Password::PASSWORD_RESET) {
        //     if(Auth::check())
        //     {
        //         Auth::logout();
        //         return redirect()->route('authentification.login')->with('success', 'Votre mot de passe a été réinitialisé avec succès.');
        //     }
        // }
        // else
        // {
        //     return back()->withErrors(['email' => trans($response)]);
        // }
    }
}
