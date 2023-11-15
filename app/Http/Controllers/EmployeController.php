<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Conge;
use App\Models\Employe;
use App\Models\Poste;
use App\Models\Motif;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Routing\Controller;
use function PHPUnit\Framework\isNull;

class EmployeController extends Controller
{

    public function index()
    {
        $employe = new Employe();
        // $combinaison_employe_et_conge = array();
        // $liste_employe_et_conge = $employe->getAllEmployes();
        // foreach ($liste_employe_et_conge as $employe) {
        //     $id_employe = $employe->matricule_id;
        //     $conge = new Conge();
        //     $class_to_array = (array) $employe;
        //     $derniere_conge_pris = $conge->getDernierConge($id_employe);

        //     if(isNull($derniere_conge_pris)){
        //         $derniere_conge_pris = array(
        //             'date_debut' => null,
        //             'date_fin' => null,
        //             'motif' => null
        //         );
        //     }
        //     $tab1 = (array) $derniere_conge_pris;
        //     $tab2 = (array) $employe;

        //     $array_merged = array_merge($tab1, $tab2);

        //     $employe = (object) $array_merged;
        //     $combinaison_employe_et_conge[] = $employe;
        // }
        $listEmp = [];
        $nom_profil = session('profil');
        $somme_salaire_array = $employe->getSommeSalaire();
        $allEmployes = $employe->getAllEmployesWithInfo();
        $somme_salaire = is_array($somme_salaire_array) ? array_sum($somme_salaire_array) : $somme_salaire_array;
        //$allEmployes =Employe::simplePaginate(2);

        foreach($allEmployes as $indice){
            $poste = new Poste();
            $row = array(
                'matricule_id' => $indice->matricule_id,
                'nom' => $indice->nom,
                'prenom' => $indice->prenom,
                'poste' => $poste->getNom($indice->idposte),
                'date_embauche' => $indice->date_embauche,
                'email' =>$indice->email
            );
            array_push($listEmp,$row);
        }
        return view('admin.employe.index',[
            'listEmp' => $listEmp,
            'nom_profil' => $nom_profil,
            'somme_salaire' => $somme_salaire
        ]);
    }

    public function info($id) {
        $employe = new Employe();
        $conge = new Conge();
        $motif = new Motif();
        $categories = new Categorie();
        $nom_profil = session('profil');
        $categories = $categories->categories();
        $info_employe = $employe->getEmploye($id);
        $employe_avec_categorie = array();
        foreach ($info_employe as $info) {
            $info_employe = $info;
            $salaires = $info->salaire;
            $cat = null;
            foreach ($categories as $categorie) {
                if($salaires >= $categorie->salary_min){
                    $cat = $categorie->categorie;
                }
            }
            $employe_avec_categorie[] = (object) (array_merge((array) $info_employe, array('categorie' => $cat)));
        }
        $liste_conge = $conge->getConges($id);
        $motifs = $motif->getAllMotifs();
        return view('admin.employe.info',[
            'info_employe' => $employe_avec_categorie,
            'liste_conge' => $liste_conge,
            'motifs' => $motifs,
            'categories' => $categories,
            'nom_profil' => $nom_profil
        ]);
    }

    public function ajout(){
        $categories = new Categorie();
        $categories = $categories->categories();
        $nom_profil = session('profil');
        $error = session('error');
        return view('admin.employe.ajoutemploye',[
            'categories' => $categories,
            'error' => $error,
            'nom_profil' => $nom_profil
        ]);
    }

    public function licencier(){
    }
}
