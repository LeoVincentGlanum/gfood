<?php

use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProfilController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/commande',[CommandeController::class,'index'])->middleware('auth')->name('index.commande');

Route::get('/new_commande',[CommandeController::class,'create'])->middleware('auth')->name('create.commande');
Route::post('/store_commande',[CommandeController::class,'store'])->middleware('auth')->name('store.commande');
Route::post('/delete_commande',[CommandeController::class,'delete'])->middleware('auth')->name('delete.commande');

Route::get('/show_commande/{id}',[CommandeController::class,'show'])->middleware('auth')->name('show.commande');
Route::post('/send_commande',[CommandeController::class,'send'])->middleware('auth')->name('send.commande');
Route::get('/showAll',[CommandeController::class,'showAll'])->middleware('auth')->name('showAll.commande');

Route::get('/showPeople/{id}',[CommandeController::class,'showPeople'])->middleware('auth')->name('showPeople.commande');
Route::post('/sendConf',[CommandeController::class,'sendConf'])->middleware('auth')->name('sendConf.commande');
Route::post('/refuse',[CommandeController::class,'refuse'])->middleware('auth')->name('refuse.commande');

Route::get('/dete',[CommandeController::class,'dete'])->middleware('auth')->name('dete.commande');

Route::get('/profil',[ProfilController::class,'index'])->middleware('auth')->name('index.profil');
