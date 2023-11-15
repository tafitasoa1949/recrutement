<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Poste extends Model
{
    protected $table = "poste";
    use HasFactory;
    public function getByID($id){
        $poste = Poste::find($id);
        return $poste;
    }
    public function insert($data){
        DB::table('poste')->insert([
            'nom'=> $data['nom'],
            'minsalaire'=> $data['min'],
            'maxsalaire'=> $data['max'],
        ]);
    }
    public function getList(){
        $result = DB::select("select * from poste");
        return $result;
    }
    public function supprimer($id){
        DB::table('poste')
        ->where('id',$id)
        ->delete();
    }
    public function getNom($id){
        $poste = Poste::find($id);
        return $poste->nom;
    }
}
