<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\menusController;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::view('/home', 'website.main.layout');
Route::view('/login', 'website.auth.auth');


Route::view('/dashboardeditor', 'website.editor.dashboard');
Route::view('/dashboardadmin', 'website.admin.dashboard');

//----------------PENULIS----------------------//
Route::view('/dashboardjurnalis', 'website.jurnalis.dashboard');
Route::view('/dataartikel', 'website.jurnalis.artikel');
Route::view('/inputartikel', 'website.jurnalis.forminputartikel');

//----------------  USER----------------------//
Route::get('/', [menusController::class, 'index']);

Route::view('/category', 'website.user.layout');
Route::view('/about', 'website.user.about');
Route::view('/beritaterbaru', 'website.user.beritaterbaru');
Route::view('/contact', 'website.user.contact');









