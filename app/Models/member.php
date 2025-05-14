<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class member extends Model
{
    public function index()
{
    $items = Member::all();

    return view('list', compact('items'));
}
    
    use HasFactory;
    protected $fillable = ['nom', 'prenom', 'email', 'ville', 'pays', 'date'];
}
