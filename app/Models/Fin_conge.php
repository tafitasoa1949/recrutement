<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Fin_conge extends Model
{
    use HasFactory;
    protected $table = "fin_conge";

    public function fin_conge($data) {
        $id = DB::table('fin_conge')->insertGetId([
            'conge_id' => $data['conge_id'],
            'date_fin' => $data['date_fin'],
            'reste_conge' => $data['reste_conge'],
            'reste' => $data['reste']
        ]);
        return $id;
    }

    public function getCountFinConge($id_employe) {
        $query = "select count(*) as nb from fin_conge join conge on conge.id = fin_conge.conge_id where conge.employe_id = ?";
        $result = DB::select($query, [$id_employe]);
        return $result;
    }

    public function total_conge_pris($id_employe) {
        $query = "select sum(reste_conge) as total from fin_conge join conge on conge.id = fin_conge.conge_id where conge.employe_id = ?";
        $result = DB::select($query, [$id_employe]);
        return $result;
    }

    public function getDernierFinConge($id_employe) {
        $query = "select * from fin_conge join conge on conge.id = fin_conge.conge_id where conge.employe_id = ? order by fin_conge.id desc limit 1";
        $result = DB::select($query, [$id_employe]);
        return $result;
    }
}
