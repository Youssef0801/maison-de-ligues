<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use DateTime;

class ContactControllerPage extends Controller
{
    # Afficher la page de contact avec le formulaire
    public function showContact()
    {
        return view('contact', [
            'title' => 'Développement web',
            'datetime' => new DateTime(),
            'titre' => 'Initialisez votre mot de passe'
        ]);
    }

    # Traiter le formulaire en POST
    public function store(Request $request)
    {
        # Validation des données du formulaire
        $validatedData = $request->validate([
            'email' => 'required|email|unique:admins,email', # Vérifie l'unicité dans la table admins
            'password' => 'required|min:6',
        ]);

        # Création d'un nouvel administrateur
        $admin = new Admin();
        $admin->email = $validatedData['email'];
        $admin->password = Hash::make($validatedData['password']);
        $admin->save();

        # Rediriger avec un message de succès
        return redirect()->route('contact')->with('success', 'Administrateur enregistré avec succès.');
    }
}

