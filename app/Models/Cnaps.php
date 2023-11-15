<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cnaps extends Model
{
    use HasFactory;
    public $timestamps = false;

    protected $table = 'cnaps';
    public static function getNextCNAPSID(){
        $lastID = self::max('matricule');
        $lasNumber = intval(substr($lastID, 3));
        $nextNumber = $lasNumber + 1 ;
        $nextID = 'CPS' .str_pad($nextNumber, 3, '0', STR_PAD_LEFT);
        return $nextID;
    }
    public static function insertCnaps($data){
        DB::table('cnaps')->insert([
            'matricule' => self::getNextCNAPSID(),
            'employe_id' => $data['employe_id'],
            'argent' => $data['argent']
        ]);
    }
    public static function getCnapsByEmpId($employe_id){
        $query = "select * from cnaps where employe_id = ?";
        $result = DB::select($query, [$employe_id]);
        return $result;
    }
}
