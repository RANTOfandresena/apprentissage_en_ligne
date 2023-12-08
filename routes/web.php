<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\testController;
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

//Accueil principal
Route::get('/', [AccueilController::class, 'redirection'])->name('accueil');

//Création de compte
Route::get('/account', [AccueilController::class, 'createAccount'])->name('create.account');
Route::post('/account', [AccueilController::class, 'storeAccount']);
Route::get('/departement', [AccueilController::class, 'getDepartement']);
//AUTHENTIFICATION
Route::prefix('authentification')->name('auth.')->controller(AuthController::class)->group(function(){
    Route::get('/', 'login')->name('login');
    Route::post('/', 'doLogin');
});

//TEST
Route::get('/test', [testController::class, 'testRedirect'])->name('test.redirect');

//DECONNEXION
Route::delete('/logout', [AuthController::class, 'logout'])->name('auth.logout');

//INTERFACE ADMINISTRATEUR
Route::prefix('/Interface administrateur')->name('admin.')->controller(AdminController::class)->group(function(){
    Route::get('/', 'accueil')->name('accueil');
    Route::get('/Espace professeur', 'engager')->name('professeur');
    Route::post('/Espace professeur', 'insertion');

    //APPROBATION D'UN COMPTE UTILISATEUR
    Route::get('{user}/Gestion d\'utilisateur', 'rediRectApprouver')->name('approuver');
    Route::patch('{user}/Gestion d\'utilisateur', 'approuver');
});

//INTERFACE PROFESSEUR
Route::prefix('/Interface professeur')->name('professeur.')->controller(ProfesseurController::class)->group(function(){
    Route::get('/', 'accueil')->name('accueil');

    //Création cours et matières
    Route::get('/Création matiere', 'CreationMatiereRedirect')->name('creationMatiere');
    Route::post('/Création matiere', 'storeMatiere');

    //Création de contenu de cours
    Route::get('{matiere}/Création contenu de cours', 'createRedirect')->name('creationCours');
    //mise a jour de contenue du cours
    Route::post('/Création contenu/{contenue}', 'updateCours');

    // Route::post('/Création contenu', 'cours');

    //Ajout niveau
    Route::get('{matiere}/Ajouter un niveau', 'ajoutRedirect')->name('ajoutNiveau');

    //Ajout categorie
    Route::get('/Ajout categorie', 'ajoutCategorie')->name('ajoutCategorie');
    Route::post('/Ajout categorie', 'storeCategorie');

    //Profil
    Route::get('{professeur}/Profil', 'profilRedirect')->name('profil');
    //RESET PASSWORD
    Route::get('{professeur}/Profil/Reset password', 'resetPassword')->name('resetPassword');


});

//INTERFACE ETUDIANT

Route::prefix('/Interface étudiant')->name('etudiant.')->controller(EtudiantController::class)->group(function(){
    Route::get('/accueil', 'accueilRedirect')->name('accueil');
});
