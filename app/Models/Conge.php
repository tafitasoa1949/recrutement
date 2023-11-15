<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Conge extends Model
{
    use HasFactory;
    protected $table = 'conge';

    public function ajouterConge($data) {
        $id = DB::table('conge')->insertGetId([
            'employe_id' => $data['employe_id'],
            'date_debut' => $data['date_debut'],
            'motif_id' => $data['motif_id']
        ]);
        return $id;
    }

    public function nouvelleDemande($data) {
        $id = DB::table('demande_conge')->insertGetId([
            'employe_id' => $data['employe_id'],
            'motif_id' => $data['motif_id'],
            'date_debut' => $data['date_debut'],
            'date_fin' => $data['date_fin']
        ]);
        return $id;
    }

    public function resultatDemande($demande_id, $resultat) {
        $id = DB::table('resultat_demande_conge')->insertGetId([
            'demande_id' => $demande_id,
            'resultat' => $resultat
        ]);
        return $id;
    }

    public function updateDemande($id, $resultat){
        $query = "update resultat_demande_conge set resultat = ? where demande_id = ?";
        $result = DB::update($query, [$resultat, $id]);
        return $result;
    }

    public function getDemandeConge() {
        $query = "select * from demande_conge inner join motif on motif.id = demande_conge.motif_id inner join employe on employe.matricule_id = demande_conge.employe_id inner join resultat_demande_conge on resultat_demande_conge.demande_id = demande_conge.id where date_debut >= NOW() order by demande_conge.id";
        $result = DB::select($query);
        return $result;
    }

    public function getDemandeCongeAccepte($employe_id) {
        $query = "select * from demande_conge inner join motif on motif.id = demande_conge.motif_id inner join employe on employe.matricule_id = demande_conge.employe_id inner join resultat_demande_conge on resultat_demande_conge.demande_id = demande_conge.id where resultat = 50 and employe_id = ? order by demande_conge.id desc limit 1";
        $result = DB::select($query, [$employe_id]);
        return $result;
    }

    public function getConge($id_employe) {
        $query = "select * from conge where employe_id = ? order by id desc limit 1";
        $result = DB::select($query, [$id_employe]);
        return $result;
    }

    public function getConges($id_employe) {
        $query = "select * from conge inner join motif on motif.id = conge.motif_id inner join fin_conge on fin_conge.conge_id = conge.id inner join employe on employe.matricule_id = conge.employe_id where employe_id = ? order by conge.id desc";
        $result = DB::select($query, [$id_employe]);
        return $result;
    }

    public function getCountConge($id_employe) {
        $query = "select count(*) as nb from conge where employe_id = ?";
        $result = DB::select($query, [$id_employe]);
        return $result;
    }

    public function getDernierConge($id_employe){
        $query = "select * from conge inner join motif on motif.id = conge.motif_id inner join fin_conge on fin_conge.conge_id = conge.id inner join employe on employe.matricule_id = conge.employe_id where employe_id = ? order by conge.id desc limit 1";
        $result = DB::select($query, [$id_employe]);
        return $result;
    }

    public function getCongesEnCours() {
        $query = "select * from conge where id not in (select conge_id from fin_conge)";
        $result = DB::select($query);
        return $result;
    }

}
