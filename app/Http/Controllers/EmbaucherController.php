<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Cnaps;
use App\Models\Contrat;
use App\Models\Embaucher;
use Carbon\Carbon;
use App\Models\Service;
use App\Models\Employe;
use Illuminate\Http\Request;

class EmbaucherController extends Controller
{
    //
    public function embaucherCandidat(Request $request){
        //
        $fiche_evaluation = array(
            'description' => $request->input('evaluation'),
            'primes' => $request->input('primes'),
            'remarque_sup' => $request->input('remarque_sup')
        );
        $idEvaluation = Embaucher::insertFicheEvaluation($fiche_evaluation);
        $dateEtHeureActuellesMadagascar = Carbon::now('Indian/Antananarivo');
        $dateFormateeMadagascar = $dateEtHeureActuellesMadagascar->format('Y-m-d H:i:s');
        //
        $contrat_embauche = array(
            'idcandidat' => $request->input('idcandidat'),
            'idservice' => $request->input('idservice'),
            'salaire_base' => $request->input('salaire'),
            'date' => $dateFormateeMadagascar,
            'idevaluation' => $idEvaluation
        );
        $idContratEmbauche = Embaucher::insertContratEmbauche($contrat_embauche);
        //
        $avantages = $request->input('avantage');
        $details = $request->input('detail');
        for($i=0 ; $i < count($avantages) ; $i++){
            $row = array(
                'idembauche' => $idContratEmbauche,
                'description' => $avantages[$i],
                'detail' => $details[$i]
            );
            Embaucher::insertAvantage($row);
        }
        //////////////////
        $idcandidat = $request->input('idcandidat');
        $candidat = Candidat::getById($idcandidat);
        $idservice = $request->input('idservice');
        $service = Service::getByID($idservice);
        //new Employe
        $NewEmploye = array(
            'nom' => $candidat[0]->nom,
            'prenom' => $candidat[0]->prenom,
            'date_naissance' => $candidat[0]->date_naissance,
            'date_embauche' => $dateFormateeMadagascar,
            'poste' => $service->idposte,
            'salaire' => $request->input('salaire'),
            'email' => $candidat[0]->email,
            'contact' => $candidat[0]->contact,
            'adresse' => $request->input('adresse'),
            'genre' => $candidat[0]->genre,
            'categorie' => $request->input('categorie')
        );
        $employe = new Employe();
        $id = $employe->ajouterEmploye($NewEmploye);
        $pourcentage = 5;
        $salaire = $request->input('salaire');
        $montant5Pourcent = $salaire * ($pourcentage / 100);
        $dataCnaps = array(
            'employe_id' => $id,
            'argent' => $montant5Pourcent
        );
        Cnaps::insertCnaps($dataCnaps);
        return redirect()->route('list_contrat');
    }
    public function voir_list(){
        $list = [];
        $nom_profil = session('profil');
        $listEmbauche = Embaucher::getListEmbaucher();
        foreach($listEmbauche as $indice){
            $candidat = Candidat::getById($indice->idcandidat);
            $poste = Service::getPosteByIdService($candidat[0]->idservice);
            $service = Service::getByID($candidat[0]->idservice);
            $type_contrat = Contrat::getNom($service->idcontrat);
            $row = array(
                'nom' => $candidat[0]->nom,
                'prenoms' => $candidat[0]->prenom,
                'poste' => $poste[0]->nom,
                'contrat' => $type_contrat,
                'date' => $indice->date,
                'salaire' => $indice->salaire_base
            );
            array_push($list,$row);
        }
        return view('admin.contrat.list',[
            'list' => $list,
            'nom_profil' => $nom_profil
        ]);
    }
}
