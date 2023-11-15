<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Formation;

class FormationController extends Controller
{
    //
    public function getList(){
        $formation = new Formation();
        $list = $formation->getFormation();
        //dd($list);

        // foreach($list as $l){
        //    $m= $l->theme;
        //     var_dump($m);
        // }
        $nom_profil = session('profil');
        return view('admin.formation.list',[
            'nom_profil' => $nom_profil,
            'list' => $list
        ]);
    }

    public function getAjout(){
        $nom_profil = session('profil');
        return view('admin.formation.ajout',[
            'nom_profil' => $nom_profil
        ]);
    }

    public function AjoutFormation(Request $request){
        $formation = new Formation();
        $data = array(
            'theme' => $request->input('theme'),
            'date_debut' => $request->input('date_debut'),
            'date_fin' => $request->input('date_fin'),
            'intervenant' => $request->input('intervenant'),
            'lieu' => $request->input('lieu'),
            'heure_debut' => $request->input('heure_debut'),
            'heure_fin' => $request->input('heure_fin'),
        );

        //dd($data);
        $formation->insertFormation($data);
        return redirect()->route('formation');
    }

    public function sincrire($id){
        $formation = new Formation();
        $matricule = session('idutilisateur');
        $formation->insertInscrire($id,$matricule);
        return redirect()->route('formation');
        //dd($id, $nom_profil);
        // return view('admin.formation.inscription',[
        //     'nom_profil' => $nom_profil,
        //     'id' => $id
        // ]);
    }
    public function voirListe($id){
        $list = Formation::getEmpByInfo($id);
        $nom_profil = session('profil');
        return view('admin.formation.listPeople',[
            'nom_profil' => $nom_profil,
            'listEmp' => $list
        ]);
    }
}
