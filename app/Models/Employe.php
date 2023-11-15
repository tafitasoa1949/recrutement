<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Employe extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'employe';
    protected $primeryKey = 'matricule_id';
    protected $fillable = [
        'matricule', 'employe_id'
    ];
    public static function getNextMatriculeID(){
        $lastID = self::max('matricule_id');
        $lasNumber = intval(substr($lastID, 3));
        $nextNumber = $lasNumber + 1 ;
        $nextID = 'EMP' .str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        return $nextID;
    }

    public function employes()
    {
        $query = "select distinct id,nom,prenom, date_naissance, date_embauche,date_fin_employe,poste,salaire from employe_conge";
        $result = DB::select($query);
        return $result;
    }

    public function getAllEmployes() {
        $query = "select * from employe";
        $result = DB::select($query);
        return $result;
    }

    public function getEmploye($id) {
        $query = "select * from cnaps as c join employes as e on c.employe_id = e.id where e.id = ?";
        $result = DB::select($query, [$id]);
        return $result;
    }

    public function getSommeSalaire(){
        $query = "SELECT
            TO_CHAR(COALESCE(date_fin, CURRENT_DATE), 'YYYY-MM') AS mois,
            SUM(salaire) AS somme_salaires
        FROM
            info_employe
        WHERE
            CURRENT_DATE BETWEEN date_embauche AND COALESCE(date_fin, CURRENT_DATE)
        GROUP BY
            TO_CHAR(COALESCE(date_fin, CURRENT_DATE), 'YYYY-MM')";
        $result = DB::select($query);
        return $result;
    }

    public function ajouterEmploye($data){
        $id = DB::table('employe')->insertGetId([
            'matricule_id' => self::getNextMatriculeID(),
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'date_naissance' => $data['date_naissance'],
            'email' => $data['email'],
            'contact' => $data['contact'],
            'adresse' => $data['adresse']
        ],'matricule_id');

        DB::table('info_employe')->insert([
            'employe_id' => $id,
            'date_embauche' => $data['date_embauche'],
            'idposte' => $data['poste'],
            'salaire' => $data['salaire'],
            'categorie_id' => $data['categorie']
        ]);
        return $id;
    }
    public function getInfoEmploye($id){
        $query = "select * from info_employe as i join categories as c on c.id = i.categorie_id where employe_id=?";
        $result = DB::select($query, [$id]);
        return $result;
    }
    public static function getAllEmployesWithInfo(){
        $query = DB::select("select * from employe as emp join info_employe as info on info.employe_id = emp.matricule_id");
        return $query;
    }
    public static function getAllEmployesWithInfoById($id){
        $query = "select * from employe as emp join info_employe as info on info.employe_id = emp.matricule_id where emp.matricule_id=?";
        $result = DB::select($query, [$id]);
        return $result;
    }
    public static function getAbsenceByMonth($id, $mois, $annee){
        $query = "SELECT * FROM heure_sup WHERE employe_id = ? AND etat = 1
                  AND EXTRACT(MONTH FROM date) = ?
                  AND EXTRACT(YEAR FROM date) = ?";
        $result = DB::select($query, [$id, $mois, $annee]);
        return $result;
    }
    public static function getHeureSupByMonth($id,$date){
        $query = "select * from heure_sup where employe_id = ? and etat = 0";
        $result = DB::select($query, [$id]);
        return $result;
    }
}
