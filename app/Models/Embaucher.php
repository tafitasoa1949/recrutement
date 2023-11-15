<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Embaucher extends Model
{
    use HasFactory;
    public static function insertFicheEvaluation($data){
        $id = DB::table('fiche_evaluation')->insertGetId([
            'description' => $data['description'],
            'primes'=> $data['primes'],
            'remarque_sup'=> $data['remarque_sup']
        ]);
        return $id;
    }
    public static function insertContratEmbauche($data){
        $id = DB::table('contrat_embauche')->insertGetId([
            'idcandidat' => $data['idcandidat'],
            'idservice' => $data['idservice'],
            'salaire_base' => $data['salaire_base'],
            'date' => $data['date'],
            'idevaluation' => $data['idevaluation']
        ]);
        return $id;
    }
    public static function insertAvantage($data){
        DB::table('avantage')->insert([
            'idembauche' => $data['idembauche'],
            'description'=> $data['description'],
            'detail'=> $data['detail']
        ]);
    }
    public static function getListEmbaucher(){
        $result = DB::select("select * from contrat_embauche");
        return $result;
    }
}
