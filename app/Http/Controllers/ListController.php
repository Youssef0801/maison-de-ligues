<?php

namespace App\Http\Controllers;
use DateTime;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\member;

class ListController extends Controller
{
    public function membre(){
        // exemple si ta table s'appelle members
    $items = DB::table('members')->get();

    // envoie $items à la vue
    return view('nom_de_ta_vue', ['items' => $items]);
    // ou si tu veux passer d'autres données à la vue

    
        $membres = member::all();
        return view('list', [
            'title' => 'Développement Web',
            'datetime' => new DateTime(),
            //'date' => Carbon::now()->locale('fr_FR')->translatedFormat('l d F Y'), // Date formatée en français
            'membres' => $membres // On passe les données à la vue
            
        ]);

    }
}
