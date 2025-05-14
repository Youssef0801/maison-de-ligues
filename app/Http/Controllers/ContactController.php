<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DateTime;

class ContactController extends Controller
{
    public function contact()
    {
        $title = 'Contact';
        
        return view('contact', [
            'titre' => $title,
            'title' => 'Développement web',
            'date' => new Datetime()
        ]);
    }
}
