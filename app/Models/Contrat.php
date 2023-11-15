<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Contrat extends Model
{
    protected $table = "contrat";
    use HasFactory;
    public static function getNom($id){
        $contrat = Contrat::find($id);
        return $contrat->nom;
    }
    public function getList(){
        $result = DB::select("select * from contrat");
        return $result;
    }
}
