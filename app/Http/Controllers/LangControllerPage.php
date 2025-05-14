<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin; # Import du modèle Admin
use Illuminate\Support\Facades\Hash;
use DateTime;

class LangControllerPage extends Controller
{
    public function index(Request $request) # Ajout du paramètre Request
    {
    
        $validatedData = $request->validate([
            'email' => 'required|email|unique:admin,email', # Vérifie l'unicité dans la table admin
            'password' => 'required|min:6',
        ]);

        // Créer un nouvel administrateur
        $admin = new Admin();
        $admin->email = $validatedData['email'];
        $admin->password = Hash::make($validatedData['password']); # Hash du mot de passe
        $admin->save();

        // Retourner un message de succès
        return redirect()->back()->with('success', 'Administrateur enregistré avec succès.');
    }

    public function contact()
    {
        $title = "Initialisez votre mot de passe";

        return view('contact', [
            'title' => 'Développement web',
            'datetime' => new DateTime(),
            'titre' => $title
        ]);
    }
}
