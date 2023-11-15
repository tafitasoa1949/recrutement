<?php

namespace App\Http\Controllers;

use App\Models\Conge;
use App\Models\Employe;
use App\Models\Fin_conge;
use App\Models\Info_employe;
use App\Models\Motif;
use DateTime;

class CongeController extends Controller
{
    public function index()
    {
        $motif = new Motif();
        $employe = new Employe();
        $nom_profil = session('profil');
        $conge = new Conge();
        $motifs  = $motif->getAllMotifs();
        $combinaison = $conge->getDemandeConge();
        $erreur = request()->input('error');
        $combinaison_employe_et_conge = array();

        //$liste_employe_et_conge = $employe->employes();
        foreach ($combinaison as $employe) {
            $id_employe = $employe->employe_id;
            $conge = new Conge();
            $fin_conge = new Fin_conge();
            $class_to_array = (array) $employe;
            $derniere_conge_pris = $fin_conge->getDernierFinConge($id_employe);
            if($derniere_conge_pris == null){
               $derniere_conge_pris[0] = array(
                    'date_debut' => null,
                    'date_fin' => null,
                    'motif' => null,
                    'reste_conge' => 0,
                    'reste' => 0

               );
            }
            $tab1 = (array) $derniere_conge_pris[0];
            $tab2 = (array) $employe;

            $array_merged = array_merge($tab1, $tab2);

            $employe = (object) $array_merged;
            $combinaison_employe_et_conge[] = $employe;
        }
        return view('admin.conge.index',[
            'liste_employe_et_conge' => $combinaison_employe_et_conge,
            'motifs' => $motifs,
            'erreur' => $erreur,
            'nom_profil' => $nom_profil
        ]);
    }

    public function demande_conge()
    {
        $conge = new Conge();
        $data = array(
            'employe_id' => $_POST['id_employe'],
            'motif_id' => $_POST['motif'],
            'date_debut' => $_POST['date_debut'],
            'date_fin' => $_POST['date_fin']
        );
        $quinze_jour_avant_demande = strtotime($data['date_debut']) - strtotime(date('Y-m-d'));
        $quinze_jour_avant_demande = $quinze_jour_avant_demande / 86400;
        if($quinze_jour_avant_demande < 15) {
            return redirect()->route('conges', ['error' => 'Vous ne pouvez pas faire une demande de congé à moins de 15 jours de la date de début de congé.']);
        }
        else {
            $id = $conge->nouvelleDemande($data);
            $conge->resultatDemande($id, 0);
            return redirect()->route('conges');
        }
    }

    public function valider_rh($id) {
        $conge = new Conge();
        $conge->updateDemande($id, 10);
        return redirect()->route('conges');
    }

    public function valider_sh($id) {
        $conge = new Conge();
        $conge->updateDemande($id, 50);
        return redirect()->route('conges');
    }

    public function refuser_demande($id) {
        $conge = new Conge();
        $conge->updateDemande($id, 100);
        return redirect()->route('conges');
    }

    public function ajouterConge()
    {
        $conge = new Conge();
        $data = array(
            'employe_id' => $_POST['id_employe'],
            'date_debut' => $_POST['date_debut'],
            'motif_id' => $_POST['motif']
        );
        $id = $conge->ajouterConge($data);
        return redirect()->route('conges');
    }

    public function fin_conge()
    {
        $conge = new Conge();
        $heure_absence = 0;
        $motif = new Motif();
        $info_employe = new Info_employe();
        $fin_conge = new Fin_conge();
        $id_employe = $_POST['id_employe'];
        $date_debut = $conge->getConge($id_employe)[0]->date_debut;
        $motif_id = $conge->getConge($id_employe)[0]->motif_id;
        $motif_nom = $motif->getMotif($motif_id)[0]->motif;
        $demande_conge_accepte = $conge->getDemandeCongeAccepte($id_employe);
        $date_fin_demande = $demande_conge_accepte[0]->date_fin;
        $absence_date_fin = strtotime($_POST['date_fin']) - strtotime($date_fin_demande);

        if($absence_date_fin > 0) {
            $heure_absence = $absence_date_fin / 3600;
        }

        $conge_id = $conge->getConge($id_employe)[0]->id;
        $date_embauche = $info_employe->get_info_employe($id_employe)[0]->date_embauche;
        $date_aujourdhui = new DateTime($_POST['date_fin']);
        $date_embauche = new DateTime($date_embauche);
        //dd($date_embauche);die();
        //dd($date_aujourdhui);die();
        $diff=$date_embauche->diff($date_aujourdhui);
        //dd($diff);die();
        $nombre_de_mois = $diff->m + ($diff->y*12) + ($diff->d/30) + ($diff->h/(30*24));
        //dd($nombre_de_mois);die();
        $nombre_de_heure = $nombre_de_mois * 2.5 * 8;
        //dd($nombre_de_heure);die();

        $conge_max = 90 * 8;
        if($nombre_de_heure > $conge_max) {
            $nombre_de_heure = $conge_max;
        }

        $date_fin = $_POST['date_fin'];
        $date_total = strtotime($date_fin) - strtotime($date_debut);
        $heure = $date_total / 3600;
        $heure = (($heure*8)/24);
        //dd($heure);die();
        //$heure = $nombre_de_heure - $heure;

        $total_conge_pris = $fin_conge->total_conge_pris($id_employe)[0]->total;
        //var_dump($total_conge_pris);die();
        //var_dump($nombre_de_heure);die();
        $reste_conge = $nombre_de_heure - ($total_conge_pris+$heure);
        $reste_conge2 = $nombre_de_heure - $total_conge_pris;
        //dd($reste_conge2);die();
        //dd($reste_conge);die();
        $nombre_conge = $conge->getCountConge($id_employe);
        $nombre_fin_conge = $fin_conge->getCountFinConge($id_employe);
        if($nombre_conge[0]->nb == $nombre_fin_conge[0]->nb) {
            return redirect()->route('conges');
        } else {
            $reste = $nombre_conge[0]->nb - $nombre_fin_conge[0]->nb;
            if($reste == 1) {
                if($motif_nom == "Non defini") {
                    $data = array(
                        'conge_id' => $conge_id,
                        'date_fin' => $_POST['date_fin'],
                        'reste_conge' => $heure,
                        'reste' => $reste_conge
                    );
                }else{
                    $data = array(
                        'conge_id' => $conge_id,
                        'date_fin' => $_POST['date_fin'],
                        'reste_conge' => 0,
                        'reste' => $reste_conge2
                    );
                }
                //dd($data);die();
                $id = $fin_conge->fin_conge($data);
            }else{
                return redirect()->route('conges');
            }
        }
        return redirect()->route('conges', ['erreur' => 'absence de '.$heure_absence.' heure(s)']);
    }

    public function encore_en_conge() {
        $conge = new Conge();
        $employes_en_conge = $conge->getCongesEnCours();
        $nom_profil = session('profil');
        $employe = new Employe();
        $employe_en_cours = array();
        foreach ($employes_en_conge as $employe_en_conge) {
            $id_employe = $employe_en_conge->employe_id;
            $employe_en_cours[] = $employe->getEmploye($id_employe)[0];
        }
        return view('admin.conge.encore_en_conge',[
            'employes_en_conge' => $employe_en_cours,
            'nom_profil' => $nom_profil
        ]);
    }
}
