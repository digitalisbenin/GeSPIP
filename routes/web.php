<?php

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
    return redirect('login');
});
Route::get('/register', function () {
  return redirect('login');
});
Route::get('/contrat', function () {
    return view('contrat.create');
});
     // Activités
     Route::get('activites', [App\Http\Controllers\ActiviteController::class, 'index']);
     Route::get('activites-create', [App\Http\Controllers\ActiviteController::class, 'create']);
    Route::post('activites-store', [App\Http\Controllers\ActiviteController::class, 'store']);
    Route::post('activites-stores', [App\Http\Controllers\ActiviteController::class, 'stores']);
    Route::get('activites/{id}/edit', [App\Http\Controllers\ActiviteController::class, 'edit']);
    Route::put('activites/{id}/update', [App\Http\Controllers\ActiviteController::class, 'update']);
    Route::get('activites/{id}/destroy', [App\Http\Controllers\ActiviteController::class, 'destroy']);


      // Commune
      Route::get('communes', [App\Http\Controllers\CommuneController::class, 'index']);
      Route::get('communes-create', [App\Http\Controllers\CommuneController::class, 'create']);
     Route::post('communes-store', [App\Http\Controllers\CommuneController::class, 'store']);
     Route::post('communes-stores', [App\Http\Controllers\CommuneController::class, 'stores']);
     Route::get('communes/{id}/edit', [App\Http\Controllers\CommuneController::class, 'edit']);
     Route::put('communes/{id}/update', [App\Http\Controllers\CommuneController::class, 'update']);
     Route::get('communes/{id}/destroy', [App\Http\Controllers\CommuneController::class, 'destroy']);



      // Contrat
      Route::get('contrats', [App\Http\Controllers\ContratController::class, 'index']);
      Route::get('contrat', [App\Http\Controllers\ContratController::class, 'inde']);
      Route::get('contratses', [App\Http\Controllers\ContratController::class, 'indexes']);
      Route::get('contrats-create', [App\Http\Controllers\ContratController::class, 'create']);
     Route::post('contrats-store', [App\Http\Controllers\ContratController::class, 'store']);
     Route::get('contrats/{id}/edit', [App\Http\Controllers\ContratController::class, 'edit']);
     Route::get('contrats/{id}/edites', [App\Http\Controllers\ContratController::class, 'edites']);
     Route::put('contrats/{id}/update', [App\Http\Controllers\ContratController::class, 'update']);
     Route::put('contrats/{id}/updates', [App\Http\Controllers\ContratController::class, 'updates']);
     Route::get('contrats/{id}/destroy', [App\Http\Controllers\ContratController::class, 'destroy']);



      // Departement
      Route::get('departements', [App\Http\Controllers\DepartementController::class, 'index']);
      Route::get('departements-create', [App\Http\Controllers\DepartementController::class, 'create']);
     Route::post('departements-store', [App\Http\Controllers\DepartementController::class, 'store']);
     Route::get('departements/{id}/edit', [App\Http\Controllers\DepartementController::class, 'edit']);
     Route::put('departements/{id}/update', [App\Http\Controllers\DepartementController::class, 'update']);
     Route::get('departements/{id}/destroy', [App\Http\Controllers\DepartementController::class, 'destroy']);

      // Entreprise
      Route::get('entreprises', [App\Http\Controllers\EntrepriseController::class, 'index']);
      Route::get('entreprises-create', [App\Http\Controllers\EntrepriseController::class, 'create']);
     Route::post('entreprises-store', [App\Http\Controllers\EntrepriseController::class, 'store']);
     Route::post('entreprises-stores', [App\Http\Controllers\EntrepriseController::class, 'stores']);
     Route::get('entreprises/{id}/edit', [App\Http\Controllers\EntrepriseController::class, 'edit']);
     Route::put('entreprises/{id}/update', [App\Http\Controllers\EntrepriseController::class, 'update']);
     Route::get('entreprises/{id}/destroy', [App\Http\Controllers\EntrepriseController::class, 'destroy']);

      // Nature Activité
      Route::get('nature-activites', [App\Http\Controllers\NatureActiviteController::class, 'index']);
      Route::get('nature-activites-create', [App\Http\Controllers\NatureActiviteController::class, 'create']);
     Route::post('nature-activites-store', [App\Http\Controllers\NatureActiviteController::class, 'store']);
     Route::post('nature-activites-stores', [App\Http\Controllers\NatureActiviteController::class, 'stores']);
     Route::get('nature-activites/{id}/edit', [App\Http\Controllers\NatureActiviteController::class, 'edit']);
     Route::put('nature-activites/{id}/update', [App\Http\Controllers\NatureActiviteController::class, 'update']);
     Route::get('nature-activites/{id}/destroy', [App\Http\Controllers\NatureActiviteController::class, 'destroy']);


       // Nature Activité
       Route::get('mode-executions', [App\Http\Controllers\ModeExecutionController::class, 'index']);
       Route::get('mode-executions-create', [App\Http\Controllers\ModeExecutionController::class, 'create']);
      Route::post('mode-executions-store', [App\Http\Controllers\ModeExecutionController::class, 'store']);
      Route::get('mode-executions/{id}/edit', [App\Http\Controllers\ModeExecutionController::class, 'edit']);
      Route::put('mode-executions/{id}/update', [App\Http\Controllers\ModeExecutionController::class, 'update']);
      Route::get('mode-executions/{id}/destroy', [App\Http\Controllers\ModeExecutionController::class, 'destroy']);


      // Projet
      Route::get('projets', [App\Http\Controllers\ProjetController::class, 'index']);
      Route::get('projets-create', [App\Http\Controllers\ProjetController::class, 'create']);
     Route::post('projets-store', [App\Http\Controllers\ProjetController::class, 'store']);
     Route::post('projets-stores', [App\Http\Controllers\ProjetController::class, 'stores']);
     Route::get('projets/{id}/edit', [App\Http\Controllers\ProjetController::class, 'edit']);
     Route::put('projets/{id}/update', [App\Http\Controllers\ProjetController::class, 'update']);
     Route::get('projets/{id}/destroy', [App\Http\Controllers\ProjetController::class, 'destroy']);

      // Role
      Route::get('roles', [App\Http\Controllers\RoleController::class, 'index']);
      Route::get('roles-create', [App\Http\Controllers\RoleController::class, 'create']);
     Route::post('roles-store', [App\Http\Controllers\RoleController::class, 'store']);
     Route::get('roles/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit']);
     Route::put('roles/{id}/update', [App\Http\Controllers\RoleController::class, 'update']);
     Route::get('roles/{id}/destroy', [App\Http\Controllers\RoleController::class, 'destroy']);


      // Type-projet
      Route::get('type-projets', [App\Http\Controllers\TypeProjetController::class, 'index']);
      Route::get('type-projets-create', [App\Http\Controllers\TypeProjetController::class, 'create']);
     Route::post('type-projets-store', [App\Http\Controllers\TypeProjetController::class, 'store']);
     Route::get('type-projets/{id}/edit', [App\Http\Controllers\TypeProjetController::class, 'edit']);
     Route::put('type-projets/{id}/update', [App\Http\Controllers\TypeProjetController::class, 'update']);
     Route::get('type-projets/{id}/destroy', [App\Http\Controllers\TypeProjetController::class, 'destroy']);


      // user
      Route::get('users', [App\Http\Controllers\UserController::class, 'index']);
      Route::get('users-create', [App\Http\Controllers\UserController::class, 'create']);
     Route::post('users-store', [App\Http\Controllers\UserController::class, 'store']);
     Route::get('users/{id}/edit', [App\Http\Controllers\UserController::class, 'edit']);
     Route::put('users/{id}/update', [App\Http\Controllers\UserController::class, 'update']);
     Route::get('users/{id}/destroy', [App\Http\Controllers\UserController::class, 'destroy']);


      // Recherche
      //Route::get('/filtre', 'YourController@filter')->name('filtre');

      Route::get('filtre', [App\Http\Controllers\RechercheController::class, 'filter'])->name('filtre');
      Route::get('recherches', [App\Http\Controllers\RechercheController::class, 'index']);
      Route::get('recherches-create', [App\Http\Controllers\RechercheController::class, 'create']);
     Route::post('recherches-store', [App\Http\Controllers\RechercheController::class, 'store']);
     Route::get('recherches/{id}/edit', [App\Http\Controllers\RechercheController::class, 'edit']);
     Route::put('recherches/{id}/update', [App\Http\Controllers\RechercheController::class, 'update']);
     Route::get('recherches/{id}/destroy', [App\Http\Controllers\RechercheController::class, 'destroy']);



     Route::get('toutes-les-activites', [App\Http\Controllers\FiltreController::class, 'toutesActivites']);
     Route::get('activites-en-cours', [App\Http\Controllers\FiltreController::class, 'activitesEnCours']);
     Route::get('activites-non-demarre', [App\Http\Controllers\FiltreController::class, 'activitesNonDemarre']);
     Route::get('activites-achevres', [App\Http\Controllers\FiltreController::class, 'activitesArchevrees']);
     Route::get('activites-suspendues', [App\Http\Controllers\FiltreController::class, 'activitesSuspendues']);
     Route::get('activites-en-souffrances', [App\Http\Controllers\FiltreController::class, 'activitesEnSouffrances']);
     Route::get('activites-abandonnees', [App\Http\Controllers\FiltreController::class, 'activitesAbandonnees']);
     Route::get('activites-par-nature', [App\Http\Controllers\FiltreController::class, 'activitesParNature']);
     Route::get('activites-par-projet', [App\Http\Controllers\FiltreController::class, 'activitesParProjet']);
     Route::get('activites-par-entreprise', [App\Http\Controllers\FiltreController::class, 'activitesParEntreprise']);
     Route::get('activites-par-localite', [App\Http\Controllers\FiltreController::class, 'activitesParLocalite']);
     Route::get('activites-periodiques', [App\Http\Controllers\FiltreController::class, 'activitesParPeriode']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


