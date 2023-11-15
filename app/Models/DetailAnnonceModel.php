<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailAnnonceModel extends Model
{
    use HasFactory;

    public function GetChallenge($id)
    {
        return DB::select('SELECT description FROM challenge WHERE idservice = ?', [$id]);
    }

    public static function GetCritere($idP){
        return DB::select(' select c.id,c.nom,det.detail,det.coefficient from detail_critere as det join criteres as c on c.id=det.idcritere where c.idservice=?', [$idP]);
    }

    public function GetSexe()
    {
        return DB::select('SELECT * FROM sexe');
    }

    public function GetDetailService($id)
    {
        return DB::select('SELECT * FROM detail_annonce WHERE idservice = ?', [$id]);
    }

    public function GetDetailPoste($id)
    {
        return DB::select('SELECT * FROM detail_annonce WHERE idservice = ?', [$id]);
    }




}
