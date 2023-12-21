<?php

use App\Http\Controllers\AccueilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\ProfesseurController;
use App\Http\Controllers\testController;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Support\Facades\Mail;
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
// Route::get('/video', [AccueilController::class, 'video'])->name('video');

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
    Route::get('/Gestion de compte utilisateur', 'gestionCompteRedirect')->name('gestionCompte');
    // Route::patch('/Gestion de compte utilisateur', 'approuver');
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
    Route::get('{matiere}-{contenu}/Création contenu de cours', 'createRedirect')->name('creationCours');
    Route::get('{matiere}-{contenu}/Création contenu de cours/examen', 'createRedirect')->name('creationExamen');
    //mise a jour de contenue du cours creationExamen
    //Interface%20professeur/Cr%C3%A9ation%20contenu/13
    Route::get('{contenue}/Création contenu', 'getCours');
    Route::post('{contenue}/Création contenu', 'updateCours');

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

    //Affichage des cours par matière
    Route::get('{matiere}-{contenu}/Consulter les cours', 'affichageCours')->name('affichageCours');
    Route::get('{contenu}-{stringId}/commentaire', 'getCommentaire');
    Route::get('{contenu}-{nb}/nbcommentaire', 'getNbCommentaire');
});


// INTERFACE ETUDIANT

Route::prefix('/Interface étudiant')->name('etudiant.')->controller(EtudiantController::class)->group(function(){
    Route::get('/accueil', 'accueilRedirect')->name('accueil');
});

//Test envoie d'email
// Route::get('/send-test-email', function () {
//     Mail::raw('Test email content', function ($message) {
//         $message->to('angevoni@gamil.com');
//         $message->subject('Test email');
//     });

//     return 'Test email sent!';
// });
