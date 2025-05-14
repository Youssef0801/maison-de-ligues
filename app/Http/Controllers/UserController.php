<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
     // Affiche le formulaire de connexion
     public function showLogin()
     {
         return view('auth.login');
     }
 
     # Traiter la connexion
     public function handleLogin(Request $request)
     {
         $request->validate([
             'email' => 'required|email',
             'password' => 'required'
         ]);
 
         # Recherche de l'admin dans la base de données
         $admin = DB::table('admin')->where('email', $request->email)->first();
 
         # Vérification des identifiants
         if ($admin && Hash::check($request->password, $admin->password)) {
             // Stocker l'admin en session
             Session::put('admin_id', $admin->id);
             Session::put('admin_email', $admin->email);
 
             return redirect('/dashboard')->with('success', 'Connexion réussie !');
         }
 
         return back()->withErrors(['email' => 'Identifiants incorrects.']);
    }

    # Page après connexion
     public function dashboard()
     {
         if (!Session::has('admin_id')) {
             return redirect('/login')->withErrors(['error' => 'Veuillez vous connecter.']);
         }
 
         return view('dashboard');
     }
 
     # Déconnexion
     public function logout()
     {
         Session::flush();
         return redirect('/login')->with('success', 'Déconnexion réussie.');
     }
}
