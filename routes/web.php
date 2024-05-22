<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\AjoutcommController;
use App\Http\Controllers\Agent\AjoutagentController;
use  App\Http\Controllers\MailController;
use App\Http\Controllers\ControleMotoController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlainteController;
use App\Http\Controllers\LocaliserController;

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
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/AccueilAdmin', [HomeController::class, 'accueil'])->name('accueil.admin');
Route::get('/enregistrercommissaire', [HomeController::class, 'ajoutercommissaire'])->name('ajoutercommissaire');
Route::get('/email.testmail', [MailController::class, 'index'])->name('mails');
Route::get('/listecommissaire', [AjoutcommController::class, 'user'])->name('listecommissaire');
Route::get('/controlermoto', [ControleMotoController::class, 'rechercheMoto'])->name('controlermoto');
Route::get('/dashbordcommissaire', [HomeController::class, 'accueil'])->name('dashbordcommissaire');
Route::get('/localiser', [HomeController::class, 'localiser'])->name('localiser');


Route::post('/enregistrercom', [AjoutcommController::class, 'store'])->name('enregistrercom');
Route::delete('/suprimeradmin/{id}', [AjoutcommController::class, 'destroy'])->name('deletecommissaire');
//Route::get('/recherche', [App\Http\Controllers\ControleMotoController::class, 'rechercheMoto'])->name('recherchemoto');


//Commissaire
Route::get('/enregistreragent', [HomeController::class, 'enregistagent'])->name('enregistreragent');
Route::post('/enregistagent', [AjoutagentController::class, 'store'])->name('enregistagent');
Route::delete('/suprimeragent/{id}', [AjoutagentController::class, 'destroy'])->name('deletagent');
Route::get('/listagent', [AjoutagentController::class, 'user'])->name('listagent');
Route::get('/infomoto', [ControleMotoController::class, 'infomoto'])->name('infomoto');
Route::get('/localisermoto', [LocaliserController::class, 'localiserMoto'])->name('gps');
Route::get('/listeplainte', [HomeController::class, 'listeplainte'])->name('listeplainte');



//Agent
Route::get('/informationmoto', [ControleMotoController::class, 'informationmoto'])->name('informationmoto');
Route::get('/plainte', [PlainteController::class, 'plainte'])->name('plainte');
Route::post('/plainte', [PlainteController::class, 'store'])->name('enregistrerplainte');
Route::get('/listplainte', [HomeController::class, 'listplainte'])->name('listplainte');
Route::get("modification{id}" , [PlainteController::class , "edit"])->name('modificationplainte');
Route::put("/palinte/{id}/update" , [PlainteController::class , "update"])->name('update');
Route::post('/plainte/{id}/update', 'PlainteController@update')->name('plainte.update');
Route::get('/profile',  [AjoutagentController::class, 'edit'])->name('profile');
Route::put('/profile/update',  [AjoutagentController::class, 'update'])->name('profileupdate');

