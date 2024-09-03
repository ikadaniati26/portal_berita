<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\menusController;


Route::get('/', function () {
    return view('welcome');
});

Route::view('/home', 'website.main.layout');
Route::view('/login', 'website.auth.auth');


Route::view('/dashboardeditor', 'website.editor.dashboard');
Route::view('/dashboardadmin', 'website.admin.dashboard');

//----------------PENULIS----------------------//
Route::view('/dashboardjurnalis', 'website.jurnalis.dashboard');
Route::view('/dataartikel', 'website.jurnalis.artikel');
Route::view('/inputartikel', 'website.jurnalis.forminputartikel');


//----------------PAGES----------------------//
Route::get('/znews', [menusController::class, 'index']);
Route::get('/{page}', [menusController::class, 'show'])->name('page.show');




