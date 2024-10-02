<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\menusController;
use App\Http\Controllers\AdminController;



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
Route::view('/form-input', 'website.jurnalis.forminputartikel');
Route::get('/artikel', [AdminController::class, 'index'])->name('artikel');

//----------------  USER----------------------//
Route::get('/', [menusController::class, 'index']);
Route::view('/beritaterbaru', 'website.user.beritaterbaru');
Route::view('/contact', 'website.user.contact');
Route::post('/store', [menusController::class, 'store'])->name('store');















