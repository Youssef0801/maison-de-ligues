<?php
/* créer un controller cmd : php artisan make:controller PresentationController */

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DateTime;
class ClassPageController extends Controller
{
    public function index()
    {
        
        /* table */
        $languages = [
            [
                'lang'    => 'PHP',
                'type'    => 'Interprété',
                'version' => '8.1'
            ],
            [
                'lang'    => 'JavaScript',
                'type'    => 'Interprété',
                'version' => 'ES2021'
            ],
            [
                'lang'    => 'Python',
                'type'    => 'Interprété',
                'version' => '3.10'
            ],
            [
                'lang'    => 'Java',
                'type'    => 'Compilé (bytecode)',
                'version' => '17'
            ],
            [
                'lang'    => 'C++',
                'type'    => 'Compilé',
                'version' => 'C++20'
            ]
        ];
        
        /* route */
        
        return view('presentation', [
            'title' => 'Développement web',
           'datetime' => new DateTime(),
            'lang' =>  $languages
        ]);
    }
}
