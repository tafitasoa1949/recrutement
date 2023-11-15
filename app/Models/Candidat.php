<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Candidat extends Model
{
    use HasFactory;

    protected $table = 'candidat';

    public function insertCandidat($data){

        $id = DB::table('candidat')->insertGetId([
            'idservice'=> $data['idservice'],
            'nom'=> $data['nom'],
            'prenom'=>$data['prenom'],
            'email'=>$data['email'],
            'genre'=>$data['sexe'],
            'date_naissance'=>$data['date_naissance'],
            'contact'=>$data['contact'],
            'situation_matrimoniale'=>$data['situationMatrimoniale']
        ],'id');
        session(['dernier_id_candidat' => $id]);
        return $id;
    }
    public static function insertPhoto($data){
        DB::table('photo')->insert([
            'idcandidat' => $data['idcandidat'],
            'nom' => $data['photo']
        ]);
    }
    public static function insertCompetences($data){
        // $query = "INSERT INTO comptences_candidat (idcandidat, nom, detail) VALUES (?, ?, ?)";
        // $result = DB::insert($query, [$idcandidat , $nom, $detail]);
        // return $result;
        $insertData = [];

        foreach ($data as $item) {
            $insertData[] = [
                'idcandidat' => $item['idcandidat'],
                'nom' => $item['nom'],
                'detail' => $item['detail']
            ];
        }

        $result = DB::table('comptences_candidat')->insert($insertData);

        return $result;
    }
    public static function getCandidatByService($idservice){
        return DB::select('SELECT * FROM candidat WHERE idservice = ?', [$idservice]);
    }
    public static function getCompetences($idcandidat){
        return DB::select('select * from comptences_candidat where idcandidat = ?', [$idcandidat]);
    }
    public static function getById($idcandidat){
        return DB::select('SELECT * FROM candidat WHERE id = ?', [$idcandidat]);
    }
    public static function getCandidat($id){
        $candidat = Candidat::find($id);
        return $candidat;
    }
}
