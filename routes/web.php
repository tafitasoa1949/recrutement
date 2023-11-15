<?php

use App\Http\Controllers\PosteController;
use App\Http\Controllers\ResultatController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TestsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CvControlleur;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\CongeController;
use App\Http\Controllers\EmbaucherController;
use App\Http\Controllers\EmployeController;
use App\Http\Controllers\EntretienController;
use App\Http\Controllers\FicheController;
use App\Http\Controllers\EtatPaieController;
use App\Http\Controllers\HeureSupController;
use App\Http\Controllers\FormationController;

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
    //Client
    Route::get('/annonce', [ClientController::class, 'index'])->name('annonce');
    Route::get('/postuler{idservice}', [CvControlleur::class,'VoirPostuler']);
    Route::post('/cvCandidat', [CvControlleur::class, 'InsertCv'])->name('cvCandidat');
    Route::get('/question', [QuestionController::class, 'obtenirQuestionsEtReponses'])->name('question');
    Route::post('/reponseTest', [QuestionController::class, 'enregistrerReponsesCandidat'])->name('reponseTest');
    Route::get('/message', [QuestionController::class, 'messageTest'])->name('message');

Route::group(['middleware' => ['web']], function () {
    Route::get('/poste', [PosteController::class,'index'])->name('index');
    //Poste
    Route::get('/save_poste', [PosteController::class,'save'])->name('save');
    Route::get('supprimer_poste/{id}', [PosteController::class,'supprimer'])->name('supprimer');

    //Service
    Route::get('/service', [ServiceController::class,'index'])->name('listservice');
    Route::get('/ajouterService', [ServiceController::class,'ajouter']);
    Route::get('/creer', [ServiceController::class,'creationNouveau']);
    Route::get('detailService/{id}', [ServiceController::class,'voirDetail']);
    Route::get('terminerService/{id}', [ServiceController::class,'terminerUnService']);

    //Resultats
    Route::get('/serviceEffecute', [ResultatController::class,'index'])->name('resultat');
    Route::get('lisetAdmin/{id}', [ResultatController::class,'voirListeAdmin'])->name('listAdmin');

    //entretien
    Route::get('/listeEntretien', [EntretienController::class,'voir_listeEntretien'])->name('listeEntretien');
    Route::get('entretien/{id}', [EntretienController::class,'faireEntretien_essaie'])->name('entretien');
    Route::post('/ajoutEntretien_essai', [EntretienController::class,'insertEssai'])->name('ajoutEntretien_essai');
    Route::get('embaucher/{id}', [EntretienController::class,'voirEmbaucher'])->name('embaucher');
    Route::get('supprimer_essaie/{id}', [EntretienController::class,'supprimerContratEssai'])->name('supprimer_essaie');
    Route::get('exportPDFContratEssai/{id}', [EntretienController::class,'exportPDFEssai'])->name('exportPDFContratEssai');

    //embaucher
    Route::get('/contrat_embauche', [EmbaucherController::class,'embaucherCandidat'])->name('contrat_embauche');
    Route::get('/list_contrat', [EmbaucherController::class,'voir_list'])->name('list_contrat');

    //Tests-Questions
    Route::get('/tests', [TestsController::class,'index'])->name('tests');
    Route::get('listes_tests/{id}', [TestsController::class,'listes_tests'])->name('listes_tests');
    Route::post('/ajouterQuestion', [TestsController::class,'ajouterQuestion'])->name('ajouterQuestion');

    //login
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::get('/registre', [LoginController::class, 'registre'])->name('registre');
    Route::post('/verificationUsers', [LoginController::class, 'verifications'])->name('verificationUsers');
    Route::post('/inscription', [LoginController::class, 'inscription'])->name('inscription');

    //Employe
    Route::get('/employes', [EmployeController::class, 'index'])->name('employes');
    Route::post('/employe',[EmployeController::class, 'ajouterEmploye'])->name('employe');
    Route::get('/ajout',[EmployeController::class, 'ajout'])->name('ajout');
    Route::get('employe/{id}', [EmployeController::class, 'info'])->name('employe');

    //Congé
    Route::post('/demande_conge', [CongeController::class, 'demande_conge'])->name('demande_conge');
    Route::get('/conges', [CongeController::class, 'index'])->name('conges');
    Route::post('/conge',[CongeController::class, 'ajouterConge'])->name('conge');
    Route::post('/fin_conge',[CongeController::class, 'fin_conge'])->name('fin_conge');
    Route::get('conge/{id}', [CongeController::class, 'index'])->name('conge');
    Route::get('encore_en_conge', [CongeController::class, 'encore_en_conge'])->name('encore_en_conge');
    Route::get('valider_rh/{id}', [CongeController::class, 'valider_rh'])->name('valider_rh');
    Route::get('valider_sh/{id}', [CongeController::class, 'valider_sh'])->name('valider_sh');
    Route::get('refuser_demande/{id}', [CongeController::class, 'refuser_demande'])->name('refuser_demande');

    //Fiche de paie
    Route::get('/fiche_de_paie', [FicheController::class, 'index'])->name('fiche_de_paie');
    Route::get('detail_fichePaie/{id}', [FicheController::class, 'voirDetail'])->name('detail_fichePaie');
    Route::get('export_PDF/{id}', [FicheController::class, 'exportPDF'])->name('export_PDF');

    //Etat de paie
    Route::get('/etatPaie', [EtatPaieController::class,'index'])->name('etatPaie');

    //Heure Sup
    Route::get('/heure_sup', [HeureSupController::class,'index'])->name('heure_sup');
    Route::get('/ajoutHeureSup', [HeureSupController::class,'ajouter'])->name('ajoutHeureSup');

    //Formation
    Route::get('/formation', [FormationController::class,'getList'])->name('formation');
    Route::get('/ajoutFormation', [FormationController::class,'getAjout'])->name('ajoutFormation');
    Route::get('/ajoutform', [FormationController::class,'AjoutFormation'])->name('ajoutform');
    Route::get('/inscrire/{id}', [FormationController::class,'sincrire'])->name('inscrire');
    Route::get('/listPeople/{id}', [FormationController::class,'voirListe'])->name('listPeople');


});
