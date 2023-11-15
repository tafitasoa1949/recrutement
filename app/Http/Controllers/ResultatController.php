<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Contrat;
use App\Models\Critere;
use App\Models\Poste;
use App\Models\Question;
use App\Models\Reponse;
use App\Models\Service;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class ResultatController extends Controller
{
    //
    public function index(){
        $poste = new Poste();
        $service = new Service();
        $contrat = new Contrat();
        $serviceTerminer = [];
        $nom_profil = session('profil');
        $listServiceTerminer = Service::ServiceTerminer();
        //service terminer
        foreach ($listServiceTerminer as $service) {
            $indice = array(
                'id' => $service->id,
                'identreprise' => $service->identreprise,
                'poste' => $poste->getNom($service->idposte),
                'contrat' => $contrat->getNom($service->idcontrat),
                'jourhomme' => $service->jourhomme,
                'date' => $service->date,
                'datefin' => $service->datefin
            );
            $serviceTerminer[] = $indice;
        }
        //service en cours
        $servinceEnCours = [];
        $listServiceEnCours = Service::ServiceEncours();
        foreach ($listServiceEnCours as $service) {
            $indice = array(
                'id' => $service->id,
                'identreprise' => $service->identreprise,
                'poste' => $poste->getNom($service->idposte),
                'contrat' => $contrat->getNom($service->idcontrat),
                'jourhomme' => $service->jourhomme,
                'date' => $service->date
            );
            $servinceEnCours[] = $indice;
        }
        return view('admin.resultats.listService',[
            'listServiceTerminer' => $serviceTerminer,
            'listServiceEnCours' => $servinceEnCours,
            'nom_profil' => $nom_profil
        ]);
    }
    public function voirListeAdmin($id){
        $resultatCollection = collect();
        $ListRangCandidat = [];
        $totalcoeffCompetences = 0;
        $totalcoeffQuestion = 0;
        $nom_profil = session('profil');
        $listCandidat = Candidat::getCandidatByService($id);
        $listCriteres = Critere::getCriteresWithDetail($id);
        $QuestionReponse = Question::getReponseFromService($id);
        foreach($listCriteres as $critere){
            $totalcoeffCompetences += $critere->coefficient;
        }
        foreach($QuestionReponse as $question){
            $totalcoeffQuestion += $question->coefficient;
        }
        foreach($listCandidat as $indice){
            $note = 0;
            //competences
            $listcompetences = Candidat::getCompetences($indice->id);
            foreach($listcompetences as $competences){
                foreach($listCriteres as $critere){
                    if(strtolower($critere->nom) == strtolower($competences->nom)){
                        $note += $critere->coefficient;
                        //var_dump($note);
                    }
                }
            }
            //QCM
            $coeffQuestion = 0;
            foreach($QuestionReponse as $question){
                $idreponse = Reponse::reponseCandidat($indice->id,$question->idquestion);
                $valiny = Reponse::checkReponseVrai($idreponse,$question->idquestion);
                if($valiny == 1){
                    $coeffQuestion += $question->coefficient;
                }
            }
            $resultat = array(
                'id' => $indice->id,
                'nom' => $indice->nom,
                'prenoms' => $indice->prenom,
                'noteComptence' => $note,
                'noteQuestion' => $coeffQuestion,
                'totalNote' => $note +$coeffQuestion ,
                'bareme' => ($totalcoeffCompetences+$totalcoeffQuestion),
                'coeffCompetences' => $totalcoeffCompetences,
                'coeffQuestion' => $totalcoeffQuestion
            );
            //array_push($ListRangCandidat,$resultat);
            $resultatCollection->push($resultat);
        }
        $Newresultat = $resultatCollection->sortByDesc('totalNote');
        return view('admin.resultats.resultat',[
            'resultat' => $Newresultat,
            'nom_profil' => $nom_profil
        ]);
    }

}
