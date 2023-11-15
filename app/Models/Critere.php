<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Critere extends Model
{
    protected $table = "criteres";
    use HasFactory;
    public function insert($data){
        $id = DB::table('criteres')->insertGetId([
            'idservice'=> $data['idservice'],
            'nom'=> $data['nom']
        ]);
        return $id;
    }
    public function insertDetail($data){
        DB::table('detail_critere')->insert([
            'idcritere'=> $data['idcritere'],
            'detail'=> $data['detail'],
            'coefficient' => $data['coefficient']
        ]);
    }
    public static function getCriteresWithDetail($idservice){
        return DB::select('select * from criteres as c join detail_critere as det on det.idcritere=c.id where c.idservice=?', [$idservice]);
    }
}
