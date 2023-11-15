<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DetailAnnonceModel;
use App\Models\Candidat;
use App\Models\CompetenceCandidat;

class CvControlleur extends Controller
{
    public function VoirPostuler($idposte)
    {
        $id = $idposte;
        $detailAnnonceModel = new DetailAnnonceModel();
        $detailsAnnonce = $detailAnnonceModel->GetDetailService($id);
        $challenge = $detailAnnonceModel->GetChallenge($id);
        $listcritere = DetailAnnonceModel::GetCritere($id);
        $genre = $detailAnnonceModel->GetSexe();
        return view('client.postuler', [
            'detailsAnnonce' => $detailsAnnonce,
            'genres' => $genre,
            'challenge' => $challenge,
            'criteres' => $listcritere
        ]);
    }

    public function InsertCv(Request $request){
        $candidatModel = new Candidat();
        $data = array(
            'idservice' => $request->input('service'),
            'nom' => $request->input('nom'),
            'prenom' => $request->input('prenom'),
            'email' => $request->input('email'),
            'sexe' => $request->input('sexe'),
            'contact' => $request->input('contact'),
            'date_naissance' => $request->input('date_naissance'),
            'situationMatrimoniale' => $request->input('situationMatrimonial'),
            'centreInteret' => $request->input('centreInteret'),
            'idposte' => $request->input('idposte'),
            'diplome' => $request->input('diplome'),
        );
        $idCandidat = $candidatModel->insertCandidat($data);
        $AllData = [];
        $dataDiplome = [
            'idcandidat' =>$idCandidat,
            'nom' => 'diplome',
            'detail' => $request->input('diplome')
        ];
        array_push($AllData,$dataDiplome);
        $dataExperience = [
            'idcandidat' =>$idCandidat,
            'nom' => 'experience',
            'detail' => $request->input('experience')
        ];
        array_push($AllData,$dataExperience);
        Candidat::insertCompetences($AllData);
        if ($request->hasFile('file') && $request->hasFile('file2')) {
            $file = $request->file("file");
            $nomFichier = $file->getClientOriginalName();
            $data1 = array(
                'idcandidat' => $idCandidat,
                'photo' => $nomFichier
            );
            Candidat::insertPhoto($data1);
            //
            $file2 = $request->file("file2");
            $nomFichier2 = $file2->getClientOriginalName();

            $file->move(public_path('uploads'), $nomFichier);
            $file2->move(public_path('uploads'), $nomFichier2);
            $data2 = array(
                'idcandidat' => $idCandidat,
                'photo' => $nomFichier2
            );
            Candidat::insertPhoto($data2);

            return redirect()->route('question');
        } else {
            return redirect('/annonce')->with('error', 'tsy mety.');
        }


    }
}
