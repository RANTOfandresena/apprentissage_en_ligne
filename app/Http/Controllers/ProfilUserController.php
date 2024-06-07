<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfilUserController extends Controller
{
    public function changeProfilPictureRedirect()
    {
        return view('profil.profilPicture');
    }
    public function storeProfilPicture(Request $request)
    {
        $request->validate([
            'profilImage' => 'image|mimes:jpeg,png,jpg,gif',
        ]);

        $image = time().'.'.$request->profilImage->extension();
        $request->profilImage->move(public_path('images'), $image);

        $user = Auth::user();
        $user->profilImage = $image;
        $user->save();

        return back()
            ->with('success', 'Image enregistré avec succès')
            ->with('image',$image);
    }
    public function changeEmailAdress()
    {
        return view('profil.changeEmail');
    }
    public function updateEmail(Request $request, $userId)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
        ]);

        $user = User::findOrFail($userId);
        $user->email = $request->email;
        $user->save();

         return back()
        ->with('success', 'Votre adresse email a été changé');
    }
}
