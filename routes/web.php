<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AjoutcommController;
use App\Http\Controllers\Agent\AjoutagentController;
use  App\Http\Controllers\MailController;
use App\Http\Controllers\ControleMotoController;
use App\Http\Controllers\Controller;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('accueil');
});

Auth::routes();
//Admin
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/AccueilAdmin', [App\Http\Controllers\HomeController::class, 'accueil'])->name('accueil.admin');
Route::get('/enregistrercommissaire', [App\Http\Controllers\HomeController::class, 'ajoutercommissaire'])->name('ajoutercommissaire');

Route::get('/listecommissaire', [AjoutcommController::class, 'user'])->name('listecommissaire');
Route::get('/controlermoto', [ControleMotoController::class, 'rechercheMoto'])->name('controlermoto');
Route::get('/Dashbordcommissaire', function(){
    return view('dashbordcommissaire.dashbordcommissaire');
});

Route::post('/enregistrercom', [AjoutcommController::class, 'store'])->name('enregistrercom');

Route::delete('/suprimeradmin/{id}', [AjoutcommController::class, 'destroy'])->name('deletecommissaire');
Route::get('/recherche', [App\Http\Controllers\ControleMotoController::class, 'rechercheMoto'])->name('recherchemoto');


//Commissaire
Route::get('/enregistreragent', [App\Http\Controllers\HomeController::class, 'enregistagent'])->name('enregistreragent');
Route::post('/enregistagent', [AjoutagentController::class, 'store'])->name('enregistagent');
Route::delete('/suprimeragent/{id}', [AjoutagentController::class, 'destroy'])->name('deletagent');
Route::get('/listagent', [AjoutagentController::class, 'user'])->name('listagent');
Route::get('/infomoto', [ControleMotoController::class, 'infomoto'])->name('infomoto');



//Agent
Route::get('/informationmoto', [App\Http\Controllers\ControleMotoController::class, 'informationmoto'])->name('informationmoto');
Route::get('/plainte', [App\Http\Controllers\PlainteController::class, 'plainte'])->name('plainte');
Route::post('/plainte', [App\Http\Controllers\PlainteController::class, 'store'])->name('enregistrerplainte');