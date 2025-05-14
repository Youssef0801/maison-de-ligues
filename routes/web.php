<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LangControllerPage;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ContactControllerPage;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('welcome' , [
        'title' => 'Développement web' ,
        'date' => new DateTime()
    ]
);
});


Route::get('/contact', [LangControllerPage::class, 'showContact'])->name('contact');
Route::post('/contact', [LangControllerPage::class, 'store'])->name('contact.store');
Route::get('/presentation', [LangControllerPage::class, 'index']);
Route::get('/contact', [ContactController::class, 'contact']);
Route::get('/list', [ListController::class, 'membre']);



Route::get('/login', [AdminController::class, 'showLogin'])->name('login');
Route::post('/login', [AdminController::class, 'handleLogin']);
Route::get('/dashboard', [AdminController::class, 'dashboard'])->middleware('auth.admin');
Route::post('/logout', [AdminController::class, 'logout'])->name('logout');

