<?php

namespace App\Http\Controllers;
use App\Models\Employe;
use App\Models\HeureSup;
use Illuminate\Http\Request;

class HeureSupController extends Controller
{
    //
    public function index(){
        $employe = new Employe();
        $nom_profil = session('profil');
        $listEmp = $employe->getAllEmployes();
        return view('admin.heure_sup.ajouter',[
            'listEmploye' => $listEmp,
            'nom_profil' => $nom_profil
        ]);
    }
    public function ajouter(Request $request){
        $data = array(
            'employe_id' => $request->input('employe'),
            'nbrheure' => $request->input('nbrheure'),
            'date' => $request->input('date'),
            'etat' => $request->input('type')
        );
        HeureSup::insert($data);
        return redirect()->route('heure_sup');
    }
}
