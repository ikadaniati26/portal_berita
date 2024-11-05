<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\menusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfilController;



//----------------LOGIN----------------------//
Route::get('/login', [AuthController::class,'login']);
Route::post('/login', [AuthController::class, 'Authenticate'])->name('proses-login');
//----------------LOGOUT----------------------//
Route::get('/logout', [AuthController::class, 'Logout'])->name('logout');

//-------------Route untuk memproses data lengkapi profil---------//
Route::get('/profile', [ProfilController::class, 'show'])->name('profile_show')->middleware('auth');
Route::patch('/update_profil', [ProfilController::class, 'update'])->name('profil.update')->middleware('auth');

//----------------REGISTER----------------------//
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/proses-register', [AuthController::class, 'create'])->name('proses-register');

//================= Route untuk dashboard=======//
Route::view('/dashboardadmin', 'website.admin.dashboard')->middleware('auth');
Route::view('/dashboardjurnalis', 'website.jurnalis.dashboard')->middleware('auth');
Route::get('/dashboardjurnalis', [AdminController::class, 'dashboard'])->name('dashboardJ');
//----------------PENULIS----------------------//
Route::view('/dataartikel', 'website.jurnalis.artikel')->middleware('auth');
Route::get('/artikel', [AdminController::class, 'index'])->name('artikel')->middleware('auth');

//----------------USER----------------------//
Route::get('/', [menusController::class, 'index']);
Route::view('/beritaterbaru', 'website.user.beritaterbaru');
Route::view('/contact', 'website.user.contact');
Route::get('/detailartikel/{id}', [menusController::class, 'detail'])->name('detail');

//----------------EDITOR------------------------//
Route::view('/artikeleditor','website.editor.artikel')->name('artikeleditor');
Route::get('/dashboardeditor', [AdminController::class, 'dashboardEditor'])->name('editor.dashboard')->middleware('auth');
Route::get('/dataartikel', [AdminController::class, 'artikelEditor'])->name('artikel.dashboard')->middleware('auth');

//----------------CRUD------------------------//
Route::get('/form-input', [AdminController::class, 'create'])->middleware('auth');
Route::post('/form-input', [AdminController::class, 'store'])->name('store')->middleware('auth');
Route::get('/artikel/{id}', [AdminController::class, 'show'])->name('show');
Route::get('/edit-artikel/{id}',[AdminController::class, 'editArtikel'])->name('editArtikel');
Route::patch('/update-artikel/{id}',[AdminController::class,'updateArtikel'])->name('update_artikel');
Route::delete('/hapus-artikel/{id}',[AdminController::class,'destroyArtikel'])->name('hapus_artikel');



