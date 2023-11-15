<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AnnonceModel;

class ClientController extends Controller
{
    //
    public function index(){

        $modele = new AnnonceModel();
        $resultats = $modele->GetAnnonce();

        return view('client.index', ['resultats' => $resultats]);

    }
}
