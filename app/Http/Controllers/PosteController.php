<?php

namespace App\Http\Controllers;

use App\Models\Poste;
use Illuminate\Http\Request;

class PosteController extends Controller
{
    //
    public function index(){
        $poste = new Poste();
        $nom_profil = session('profil');
        $list = Poste::simplePaginate(2);
        return view('admin.home',[
            'list' => $list,
            'nom_profil' => $nom_profil
        ]);
    }
    public function save(Request $request){
        $data = array(
            'nom' => $request->input('nom'),
            'min' => $request->input('min'),
            'max' => $request->input('max')
        );
        $poste = new Poste();
        $poste->insert($data);
        return redirect()->route('index');
    }
    public function supprimer($id){
        $poste = new Poste();
        $poste->supprimer($id);
        return redirect()->route('index');
    }
}
