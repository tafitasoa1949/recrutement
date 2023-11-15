<?php

namespace App\Http\Controllers;

use App\Models\Entretien;
use App\Models\Candidat;
use App\Models\Service;
use App\Models\Poste;
use App\Models\Categorie;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class EntretienController extends Controller
{
    //
    public function faireEntretien_essaie($id){
        $candidat = Candidat::getById($id);
        $nom_profil = session('profil');
        return view('admin.entretien.testEssaie',[
            'candidat' => $candidat,
            'nom_profil' => $nom_profil
        ]);
    }

    public function insertEssai(Request $request){
        $dateEtHeureActuellesMadagascar = Carbon::now('Indian/Antananarivo');
        $dateFormateeMadagascar = $dateEtHeureActuellesMadagascar->format('Y-m-d H:i:s');
        $entretien = new Entretien();
        $data = array(
            'idcandidat' => $request->input('idcandidat'),
            'idservice' => $request->input('idservice'),
            'date' => $dateFormateeMadagascar,
            'dateDebut' => $request->input('dateDebut'),
            'dateFin' => $request->input('dateFin'),
            'endmnite' => $request->input('endmnite')
        );
        $entretien->insertEssai($data);
        return redirect()->route('listeEntretien');
    }
    public function voir_listeEntretien(){
        $Bigdata = [];
        $nom_profil = session('profil');
        $listEssai = Entretien::getListEssaiNonEmbauche();
        foreach($listEssai as $indice){
            $poste = Service::getPosteByIdService($indice->idservice);
            $candidat = Candidat::getCandidat($indice->idcandidat);
            $data = array(
                'idcandidat' => $indice->idcandidat,
                'id' => $indice->id,
                'nom' => $candidat->nom,
                'prenoms' => $candidat->prenom,
                'poste' => $poste[0]->nom,
                'debut' => $indice->datedebut,
                'fin' => $indice->datefin,
                'endemnite' => $indice->endmnite
            );
            array_push($Bigdata,$data);
        }
        return view('admin.entretien.list',[
            'listEssai' => $Bigdata,
            'nom_profil' => $nom_profil
        ]);
    }
    public function supprimerContratEssai($id){
        Entretien::deleteContratEssai($id);
        return redirect()->route('listeEntretien');
    }
    public function voirEmbaucher($id){
        $candidat = Candidat::getCandidat($id);
        $poste = Service::getPosteByIdService($candidat->idservice);
        $categories = new Categorie();
        $nom_profil = session('profil');
        $categories = $categories->categories();
        return view('admin.entretien.embaucher',[
            'idservice' => $candidat->idservice,
            'idcandidat' => $candidat->id,
            'nom' => $candidat->nom,
            'prenoms' => $candidat->prenom,
            'dtn' => $candidat->date_naissance,
            'poste' => $poste[0]->nom,
            'categories' => $categories,
            'nom_profil' => $nom_profil
        ]);
    }
    public function exportPDFEssai($id){
        $contratEssai = Entretien::getEssai($id);
        $candidat = Candidat::getCandidat($contratEssai[0]->idcandidat);
        $poste = Service::getPosteByIdService($contratEssai[0]->idservice);
        $data = array(
            'candidat' => $candidat,
            'contratEssai' => $contratEssai,
            'poste' => $poste[0]->nom
        );
        $pdf = Pdf::loadView('admin.entretien.pdf',$data)->setPaper('a4');
        return $pdf->download('ContratEssai.pdf');
    }
}
