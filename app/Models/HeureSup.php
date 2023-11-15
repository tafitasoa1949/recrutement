<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class HeureSup extends Model
{
    use HasFactory;
    public static function insert($data){
        DB::table('heure_sup')->insert([
            'employe_id' => $data['employe_id'],
            'nbrheure' => $data['nbrheure'],
            'date' => $data['date'],
            'etat' => $data['etat']
        ]);
    }
}
