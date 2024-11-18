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
use App\Http\Controllers\LossReportController;

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
Route::get('/profileadmin',  [HomeController::class, 'edit'])->name('profileadmin');
Route::put('/profile/updateadmin',  [HomeController::class, 'update'])->name('profileupdateadmin');
Route::get('/listagents', [AjoutcommController::class, 'agent'])->name('listagents');


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
Route::get('/plaintes', [PlainteController::class, 'plaintes'])->name('plaintes');
Route::get('/listeplainte', [HomeController::class, 'listeplainte'])->name('listeplainte');
Route::get('/profiles',  [AjoutcommController::class, 'edit'])->name('profiles');
Route::put('/profile/updates',  [AjoutcommController::class, 'update'])->name('profileupdates');




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
Route::post('/submit-audio', 'ComplaintController@storeAudio')->name('submit.audio');
//Route::get('/declarerperte', [PlainteController::class, 'declarerperte'])->name('declarerperte');

//déclarer une perte

Route::get('/declarerperte', [LossReportController::class, 'create'])->name('declarerperte');
Route::post('/loss-report', [LossReportController::class, 'store'])->name('loss-report.store');
Route::get('/loss-report/track', [LossReportController::class, 'showTrackForm'])->name('loss-report.trackForm');
Route::post('/loss-report/track', [LossReportController::class, 'track'])->name('loss-report.track');
