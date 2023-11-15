<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\QuestionModel;
use App\Models\ReponseCandidat;

class QuestionController extends Controller
{

    // public function __construct(ReponseCandidat $candidatService)
    // {
    //     $this->candidatService = $candidatService;
    // }


    public function obtenirQuestionsEtReponses(){

        $dernierIdCandidat = session('dernier_id_candidat');
        // $idService = session('id_service');
        // dd($idService);

        // $idservice = $result['idservice'];

        $questions = QuestionModel::with('reponses')->get();
        
        return view('client.question', ['questions' => $questions, 'id_candidat' => $dernierIdCandidat]);
    }

    public function enregistrerReponsesCandidat(Request $request){
        $questions = $request->input('idquestion');
        $idCandidat = session('dernier_id_candidat');
        foreach($questions as $question){
            // echo 'Question'.$question;
            $reponseQuestion = 'reponsesQuestion'.$question;
            $reponses = $request->input($reponseQuestion);
            foreach($reponses as $valiny){
                // echo 'Valiny'.$valiny;

                $reponseCandidat = new ReponseCandidat();
                $reponseCandidat->reponse($idCandidat,$question,$valiny);

            }
        }
        return redirect()->route('message');
    }

    public function messageTest(){
        return view('client.messageTest');
    }
}