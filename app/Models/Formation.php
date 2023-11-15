<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Formation extends Model
{
    use HasFactory;

    public function getFormation()
    {
        $query = "select * from formation";
        $result = DB::select($query);
        return $result;
    }

    public static function insertFormation($data){
        DB::table('formation')->insert([
            'theme' => $data['theme'],
            'date_debut' => $data['date_debut'],
            'date_fin' => $data['date_fin'],
            'intervenant' => $data['intervenant'],
            'lieu' => $data['lieu'],
            'heure_debut' => $data['heure_debut'],
            'heure_fin' => $data['heure_fin']
        ]);
    }

    public function insertInscrire($id,$matricule){
        DB::table('formation_employe')->insert([
            'id_formation' => $id,
            'matricule_id' => $matricule
        ]);
    }
    public static function getEmpByInfo($id){
        $query = "select * from formation_employe as f join employe as e on e.matricule_id=f.matricule_id join formation as fo on fo.id = f.id_formation where f.id_formation=?";
        $result = DB::select($query,[$id]);
        return $result;
    }

}
