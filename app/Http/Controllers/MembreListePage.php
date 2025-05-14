<?php

namespace App\Http\Controllers;

use App\Models\Membre;
use Illuminate\Http\Request;
use DateTime;
use Carbon\Carbon; // Import de Carbon

class MembreListePage extends Controller
{
    public function membre(){
        $membres = Membre::all();
        return view('liste', [
            'title' => 'Liste des membres',
            'datetime' => new DateTime(),
            //'date' => Carbon::now()->locale('fr_FR')->translatedFormat('l d F Y'), // Date formatée en français
            'membres' => $membres // On passe les données à la vue
            
        ]);

    }
}
