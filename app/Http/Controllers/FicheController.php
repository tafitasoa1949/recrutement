<?php

namespace App\Http\Controllers;


use App\Models\Employe;
use App\Models\Cnaps;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use App\Models\Poste;
use App\Models\Categorie;
use Illuminate\Http\Request;


class FicheController extends Controller
{
    public function index(){
        $employe = new Employe();
        $listEmp = [];
        $nom_profil = session('profil');
        $allEmployes = $employe->getAllEmployesWithInfo();
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
        return view('admin.fiche.fiche_de_paie',[
            'list_empolyes' => $listEmp,
            'nom_profil' => $nom_profil
        ]);
    }
    public function voirDetail($id){
        $employe = new Employe();
        $nom_profil = session('profil');
        $em = $employe->getAllEmployesWithInfoById($id);
        $dateEtHeureActuellesMadagascar = Carbon::now('Indian/Antananarivo');
        $date_embauche = $em[0]->date_embauche;
        $dureeAnciennete = $dateEtHeureActuellesMadagascar->diff($date_embauche);
        //
        $tauxJournalier = $em[0]->salaire / 30;
        $tauxHoraire = $em[0]->salaire / 173.33;
        $taux_sal = ($em[0]->salaire / 30 ) * 1.3;
        $mont_sal = $taux_sal;
        $employe_id = $em[0]->matricule_id;
        //absence du mois
        $mois = $dateEtHeureActuellesMadagascar->format('m');
        $anne = $dateEtHeureActuellesMadagascar->format('Y');
        $absence = Employe::getAbsenceByMonth($employe_id,$mois,$anne);
        $heureabsence = 0;
        foreach($absence as $row){
            $heureabsence = $heureabsence + $row->nbrheure;
        }
        $salMialaCauseAbsent = $heureabsence*$tauxHoraire;
        //heure sup
        $mois = $dateEtHeureActuellesMadagascar->format('m');
        $anne = $dateEtHeureActuellesMadagascar->format('Y');
        $absence = Employe::getHeureSupByMonth($employe_id,$mois,$anne);
        $heureSup = 0;
        foreach($absence as $row){
            $heureSup = $heureSup + $row->nbrheure;
        }
        $heureMois = 22 * 8;
        $totalHeureEmpMois = ($heureMois+$heureSup)-$heureabsence;
        $salaire_mois = $totalHeureEmpMois * $tauxHoraire;
        //
        $poste = new Poste();
        $nomPoste = $poste->getNom($em[0]->idposte);
        //cnaps
        $cnaps = Cnaps::getCnapsByEmpId($em[0]->matricule_id);
        $cnaps1P = ($cnaps[0]->argent*1)/100;
        //categroie
        $categorie = new Categorie();
        $categorieEmp = $categorie->getSalaireCategorie($em[0]->categorie_id);
        //
        $netPayer = $salaire_mois - 772849;
        $montantImposable = $salaire_mois-$cnaps1P-20120;
        return view('admin.fiche.detail',[
            'employe'=>$em,
            'anciennete' =>$dureeAnciennete,
            'tauxJournalier' => $tauxJournalier,
            'tauxHoraire' => $tauxHoraire,
            'taux_sal' => $taux_sal,
            'poste' => $nomPoste,
            'cnaps_id' => $cnaps[0]->matricule,
            'categorieEmp' => $categorieEmp,
            'totalHeureEmpMois' => $totalHeureEmpMois,
            'salaire_mois' => $salaire_mois,
            'heureabsence' => $heureabsence,
            'salMialaCauseAbsent'=> $salMialaCauseAbsent,
            'cnaps1P' => $cnaps1P,
            'netPayer' => $netPayer,
            'montantImposable' => $montantImposable,
            'nom_profil' => $nom_profil
        ]);
    }
    public function exportPDF($id){
        $employe = new Employe();
        $em = $employe->getAllEmployesWithInfoById($id);
        $dateEtHeureActuellesMadagascar = Carbon::now('Indian/Antananarivo');
        $date_embauche = $em[0]->date_embauche;
        $dureeAnciennete = $dateEtHeureActuellesMadagascar->diff($date_embauche);
        //
        $tauxJournalier = $em[0]->salaire / 30;
        $tauxHoraire = $em[0]->salaire / 173.33;
        $taux_sal = ($em[0]->salaire / 30 ) * 1.3;
        $mont_sal = $taux_sal;
        $employe_id = $em[0]->matricule_id;
        //absence du mois
        $mois = $dateEtHeureActuellesMadagascar->format('m');
        $anne = $dateEtHeureActuellesMadagascar->format('Y');
        $absence = Employe::getAbsenceByMonth($employe_id,$mois,$anne);
        $heureabsence = 0;
        foreach($absence as $row){
            $heureabsence = $heureabsence + $row->nbrheure;
        }
        $salMialaCauseAbsent = $heureabsence*$tauxHoraire;
        //heure sup
        $mois = $dateEtHeureActuellesMadagascar->format('m');
        $anne = $dateEtHeureActuellesMadagascar->format('Y');
        $absence = Employe::getHeureSupByMonth($employe_id,$mois,$anne);
        $heureSup = 0;
        foreach($absence as $row){
            $heureSup = $heureSup + $row->nbrheure;
        }
        $heureMois = 22 * 8;
        $totalHeureEmpMois = ($heureMois+$heureSup)-$heureabsence;
        $salaire_mois = $totalHeureEmpMois * $tauxHoraire;
        //
        $poste = new Poste();
        $nomPoste = $poste->getNom($em[0]->idposte);
        //cnaps
        $cnaps = Cnaps::getCnapsByEmpId($em[0]->matricule_id);
        $cnaps1P = ($cnaps[0]->argent*1)/100;
        //categroie
        $categorie = new Categorie();
        $categorieEmp = $categorie->getSalaireCategorie($em[0]->categorie_id);
        //
        $netPayer = $salaire_mois - 772849;
        $montantImposable = $salaire_mois-$cnaps1P-20120;
        $data = array(
            'employe'=>$em,
            'anciennete' =>$dureeAnciennete,
            'tauxJournalier' => $tauxJournalier,
            'tauxHoraire' => $tauxHoraire,
            'taux_sal' => $taux_sal,
            'poste' => $nomPoste,
            'cnaps_id' => $cnaps[0]->matricule,
            'categorieEmp' => $categorieEmp,
            'totalHeureEmpMois' => $totalHeureEmpMois,
            'salaire_mois' => $salaire_mois,
            'heureabsence' => $heureabsence,
            'salMialaCauseAbsent'=> $salMialaCauseAbsent,
            'cnaps1P' => $cnaps1P,
            'netPayer' => $netPayer,
            'montantImposable' => $montantImposable
        );
        $pdf = Pdf::loadView('admin.fiche.pagePDF',$data)->setPaper('a4');
        return $pdf->download('FicheDePaie.pdf');
    }
}
