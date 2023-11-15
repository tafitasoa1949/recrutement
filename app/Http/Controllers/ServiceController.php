<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Critere;
use App\Models\Poste;
use App\Models\Service;
use App\Models\DetailAnnonceModel;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ServiceController extends Controller
{
    //
    public function index(){
        $result = [];
        $poste = new Poste();
        $service = new Service();
        $contrat = new Contrat();
        $nom_profil = session('profil');
        $listService = Service::ServiceEncours();
        //service
        foreach ($listService as $service) {
            $indice = array(
                'id' => $service->id,
                'identreprise' => $service->identreprise,
                'poste' => $poste->getNom($service->idposte),
                'contrat' => $contrat->getNom($service->idcontrat),
                'jourhomme' => $service->jourhomme,
                'date' =>$service->date
            );
            $result[] = $indice;
        }
        return view('admin.service.list',[
            'listService' => $result,
            'nom_profil' => $nom_profil
        ]);
    }
    public function ajouter(){
        $poste = new Poste();
        $listPoste = $poste->getList();
        $contrat = new Contrat();
        $nom_profil = session('profil');
        $listContrat =$contrat->getList();
        return view('admin.service.ajouter',[
            'listposte' => $listPoste,
            'listcontrat' => $listContrat,
            'nom_profil' => $nom_profil
        ]);
    }
    public function creationNouveau(Request $request){
        //service
        $nouveauService = array(
            'idposte' =>$request->input('poste'),
            'idcontrat' =>$request->input('contrat'),
            'jourhomme' =>$request->input('dureetache'),
            'volumehoraire' => $request->input('volumehoraire'),
            'description' => $request->input('description'),
            'date' => $request->input('dateLimite')

        );
        $service = new Service();
        $idService = $service->insert($nouveauService);
        //challenge
        $challenges = $request->input('challenge');
        foreach ($challenges as $challenge) {
            $indice = array(
                'idservice' => $idService,
                'description' => $challenge
            );
            $service->insertChallenge($indice);
        }
        //critere
        $diplome = $request->input('diplome');
        $coeffDiplome = $request->input('coeffDiplome');
        $experience = $request->input('experience');
        $coeffExperience = $request->input('coeffExperience');
        $criteres = $request->input('critere');
        $coeffCritere = $request->input('coeffCritere');
        $detailCritere = $request->input('detailCritere');
        $critere = new Critere();
        //diplome
        $dataDiplome = array(
            'idservice' =>$idService,
            'nom' => 'DIPLOME'
        );
        $idDiplome = $critere->insert($dataDiplome);
        $dataDetailDiplome = array(
            'idcritere' => $idDiplome,
            'detail' => $diplome,
            'coefficient' => $coeffDiplome
        );
        $critere->insertDetail($dataDetailDiplome);
        //exeprience
        $dataExperience = array(
            'idservice' =>$idService,
            'nom' => 'EXPERIENCE'
        );
        $idExperience = $critere->insert($dataExperience);
        $dataDetailExperience = array(
            'idcritere' => $idExperience,
            'detail' => $experience,
            'coefficient' => $coeffExperience
        );
        $critere->insertDetail($dataDetailExperience);
        //autre
        for($i=0 ; $i<count($criteres);$i++){
            $dataCritere = array(
                'idservice' =>$idService,
                'nom' => $criteres[$i]
            );
            $idCritere = $critere->insert($dataCritere);
            $dataDetailCritere = array(
                'idcritere' => $idCritere,
                'detail' => $detailCritere[$i],
                'coefficient' => $coeffCritere[$i]
            );
            $critere->insertDetail($dataDetailCritere);
        }
        return redirect()->route('listservice');
    }
    public function voirDetail($id){
        $detailAnnonceModel = new DetailAnnonceModel();
        $detailsAnnonce = $detailAnnonceModel->GetDetailService($id);
        $challenge = $detailAnnonceModel->GetChallenge($id);
        $nom_profil = session('profil');
        $listcritere = DetailAnnonceModel::GetCritere($id);
        return view('admin.service.detail', [
            'detailsAnnonce' => $detailsAnnonce,
            'challenge' => $challenge,
            'id' => $id,
            'criteres' => $listcritere,
            'nom_profil' => $nom_profil
        ]);
    }

    public function terminerUnService($id){
        $dateEtHeureActuellesMadagascar = Carbon::now('Indian/Antananarivo');
        $dateFormateeMadagascar = $dateEtHeureActuellesMadagascar->format('Y-m-d H:i:s');
        $data = array(
            'idservice' => $id,
            'date' => $dateFormateeMadagascar
        );
        Service::terminerService($data);
        return redirect()->route('resultat');
    }
}
