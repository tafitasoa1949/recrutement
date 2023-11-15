<?php

namespace App\Http\Controllers;
use App\Models\Employe;
use App\Models\Poste;
use App\Models\Cnaps;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EtatPaieController extends Controller
{
    //
    public function index(){
        $dateEtHeureActuellesMadagascar = Carbon::now('Indian/Antananarivo');
        //emp
        $listEmp = [];
        $nom_profil = session('profil');
        $employe = new Employe();
        $allEmployes = $employe->getAllEmployesWithInfo();
        //total
        $totalsalaireBase = 0;
        $totalsalaireMois = 0;
        $totalHeureSup = 0;
        $totalsalaireBrut = 0;
        $totalCnaps1P = 0;
        $totalCnaps8P = 0;
        $totalOstie1P = 0;
        $totalOstie5P = 0;
        $totalRevenueImposable = 0;
        $totalTotalRetenue = 0;
        $totalsalaireNet = 0;
        $totalNetaPayer = 0;
        $totalNetDuMois = 0;
        //
        foreach($allEmployes as $indice){
            //absence du mois
            $mois = $dateEtHeureActuellesMadagascar->format('m');
            $anne = $dateEtHeureActuellesMadagascar->format('Y');
            $employe_id = $indice->matricule_id;
            $absence = Employe::getAbsenceByMonth($employe_id,$mois,$anne);
            $heureabsence = 0;
            foreach($absence as $row){
                $heureabsence = $heureabsence + $row->nbrheure;
            }
            //heure sup
            $mois = $dateEtHeureActuellesMadagascar->format('m');
            $anne = $dateEtHeureActuellesMadagascar->format('Y');
            $employe_id = $indice->matricule_id;
            $absence = Employe::getHeureSupByMonth($employe_id,$mois,$anne);
            $heureSup = 0;
            foreach($absence as $row){
                $heureSup = $heureSup + $row->nbrheure;
            }
            //Cnaps
            $cnaps = Cnaps::getCnapsByEmpId($employe_id);
            $cnaps1P = ($cnaps[0]->argent*1)/100;
            $cnaps8P = ($cnaps[0]->argent*8)/100;
            //
            $poste = new Poste();
            //salaire
            $tauxJournalier = $indice->salaire / 30;
            $tauxHoraire = $indice->salaire / 173.33;
            $heureMois = 22 * 8;
            $totalHeureEmpMois = ($heureMois+$heureSup)-$heureabsence;
            $salaire_mois = $totalHeureEmpMois * $tauxHoraire;
            $salaire_brut = $indice->salaire+($heureSup*$tauxHoraire);
            //Ostie
            $ostie1P = ($salaire_brut * 1)/100;
            $ostie5P = ($salaire_brut * 5)/100;
            //
            $revenueImposable =$salaire_brut-$cnaps1P-$ostie1P;
            $totalRetenue = $cnaps1P+$ostie1P;
            $salaireNet = $salaire_brut-$totalRetenue;
            $avance = 0;
            $netPayer = $salaireNet - $avance;
            //calcul total
            $totalsalaireBase = $totalsalaireBase + $indice->salaire;
            $totalsalaireMois = $totalsalaireMois + $salaire_mois;
            $totalHeureSup  = $totalHeureSup + $heureSup;
            $totalsalaireBrut = $totalsalaireBrut + $salaire_brut;
            $totalCnaps1P = $totalCnaps1P + $cnaps1P;
            $totalCnaps8P = $totalCnaps8P + $cnaps8P;
            $totalOstie1P = $totalOstie1P + $ostie1P;
            $totalOstie5P = $totalOstie5P + $ostie5P;
            $totalRevenueImposable = $totalRevenueImposable + $revenueImposable;
            $totalTotalRetenue = $totalTotalRetenue + $totalRetenue;
            $totalsalaireNet = $totalsalaireNet + $salaireNet;
            $totalNetaPayer = $totalNetaPayer + $netPayer;
            $totalNetDuMois = $totalNetDuMois + $netPayer;
            $row = array(
                'matricule_id' => $indice->matricule_id,
                'nom' => $indice->nom,
                'prenom' => $indice->prenom,
                'poste' => $poste->getNom($indice->idposte),
                'date_embauche' => $indice->date_embauche,
                'salaire' =>$indice->salaire,
                'heureabsence' => $heureabsence,
                'cnaps_im' => $cnaps[0]->matricule,
                'salaire_mois' => $salaire_mois,
                'heure_sup' => $heureSup,
                'salaire_brut' => $salaire_brut,
                'cnaps1P' => $cnaps1P,
                'cnaps8P' => $cnaps8P,
                'ostie1P' => $ostie1P,
                'ostie5P' => $ostie5P,
                'revenueImposable' => $revenueImposable,
                'totalRetenue' => $totalRetenue,
                'salaireNet' => $salaireNet,
                'netPayer' => $netPayer
            );
            array_push($listEmp,$row);
        }
        //
        $dataTotal = array(
            'totalsalaireBase' => $totalsalaireBase,
            'totalsalaireMois' => $totalsalaireMois,
            'totalHeureSup' => $totalHeureSup,
            'totalsalaireBrut' => $totalsalaireBrut,
            'totalCnaps1P' => $totalCnaps1P,
            'totalCnaps8P' => $totalCnaps8P,
            'totalOstie1P' => $totalOstie1P,
            'totalOstie5P' => $totalOstie5P,
            'totalRevenueImposable' => $totalRevenueImposable,
            'totalTotalRetenue' => $totalTotalRetenue,
            'totalsalaireNet' => $totalsalaireNet,
            'totalNetaPayer' => $totalNetaPayer,
            'totalNetDuMois' => $totalNetDuMois
        );
        $dateFormateeMadagascar = $dateEtHeureActuellesMadagascar->format('d-M-Y');
        $dateNow = $dateEtHeureActuellesMadagascar->format('F Y');
        return view('admin.etatPaie.etat',[
            'list_empolyes' => $listEmp,
            'date' => $dateFormateeMadagascar,
            'dateNow' => $dateNow,
            'dataTotal' => $dataTotal,
            'nom_profil' => $nom_profil
        ]);
    }
}
