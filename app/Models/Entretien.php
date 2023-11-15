<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Entretien extends Model
{
    use HasFactory;

    protected $table = 'entretien';

    public function insertEssai($data){

         DB::table('contrat_essaie')->insert([
            'idcandidat'=> $data['idcandidat'],
            'idservice' => $data['idservice'],
            'date' => $data['date'],
            'datedebut'=> $data['dateDebut'],
            'datefin'=>$data['dateFin'],
            'endmnite'=>$data['endmnite']
        ]);
    }
    public static function getListEssai(){
        $result = DB::select("select * from contrat_essaie");
        return $result;
    }
    public static function getListEssaiNonEmbauche(){
        $result = DB::select("SELECT ce.* FROM contrat_essaie ce LEFT JOIN contrat_embauche cem ON ce.idcandidat = cem.idcandidat WHERE cem.idcandidat IS NULL");
        return $result;
    }
    public static function getEssai($idcandidat){
        $query = "SELECT * FROM contrat_essaie where id=?";
        $result = DB::select($query, [$idcandidat]);
        return $result;
    }
    public static function deleteContratEssai($id){
        DB::table('contrat_essaie')
        ->where('id',$id)
        ->delete();
    }
}
