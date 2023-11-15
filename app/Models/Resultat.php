<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Resultat extends Model
{
    use HasFactory;
    public function getList(){
        $result = DB::select("select * from resultat_test");
        return $result;
    }
    public function calendrierEntretien(){
        $result = DB::select("
        select p.nom as poste,cdt.nom,cdt.prenom,ca.date from calendrier as ca join service as s on s.id =ca.idservice
        join candidat as cdt on cdt.id=ca.idcandidat
        join poste as p on p.id=s.idposte
        ");
        return $result;
    }
}
