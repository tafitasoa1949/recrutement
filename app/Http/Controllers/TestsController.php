<?php

namespace App\Http\Controllers;

use App\Models\Contrat;
use App\Models\Question;
use App\Models\Poste;
use App\Models\Service;
use Illuminate\Http\Request;

class TestsController extends Controller
{
    public function index(){
        $result = [];
        $poste = new Poste();
        $service = new Service();
        $contrat = new Contrat();
        $nom_profil = session('profil');
        $listService = $service->getListService();
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
        return view('admin.tests.ajout',[
            'listService' => $result,
            'nom_profil' => $nom_profil
        ]);
    }

    public function listes_tests($id){
        $question = new Question();
        $nom_profil = session('profil');
        $listes_question = $question->getQuestionFromService($id);
        $listes_reponses = $question->getReponseFromService($id);
        return view('admin.tests.listes_tests', [
            'listes_questions' => $listes_question,
            'listes_reponses' => $listes_reponses,
            'id_service' => $id,
            'nom_profil' => $nom_profil
        ]);
    }

    public function ajouterQuestion(Request $request){
        $data_question = array(
          'idservice' => $request->input('id_service'),
          'fanontaniana' => $request->input('question'),
          'coefficient' => $request->input('coefficient')
        );

        $question = new Question();
        $question->insert($data_question);
        $get_last_sequence = Question::orderBy();

        $data_reponse = array(
            'idquestion' => $get_last_sequence[0]->id,
            'valiny' => $request->input('reponses'),
            'vrai' => $request->input('reponse_r')
        );

        $question->insertReponse($data_reponse);
        return redirect()->route('listes_tests', ['id' => $data_question['idservice']]);
    }
}
