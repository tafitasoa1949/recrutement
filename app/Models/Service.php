<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    protected $table = "service";
    use HasFactory;
    public function getListService(){
        $result = DB::select("select * from service");
        return $result;
    }
    public function insert($data){
        $id = DB::table('service')->insertGetId([
            'identreprise' => 'ENT001',
            'idposte'=> $data['idposte'],
            'idcontrat'=> $data['idcontrat'],
            'jourhomme'=> $data['jourhomme'],
            'volumehoraire'=> $data['volumehoraire'],
            'description'=> $data['description'],
            'date'=> $data['date']
        ]);
        return $id;
    }
    public function insertChallenge($data){
        DB::table('challenge')->insert([
            'idservice'=> $data['idservice'],
            'description'=> $data['description']
        ]);
    }
    public static function terminerService($data){
        DB::table('final_service')->insert([
            'idservice'=> $data['idservice'],
            'date'=> $data['date']
        ]);
    }
    public static function ServiceEncours(){
        $result = DB::select(' SELECT s.* FROM service as s LEFT JOIN final_service fs ON s.id = fs.idservice WHERE fs.idservice IS NULL');
        return $result;
    }
    public static function ServiceTerminer(){
        $result = DB::select('SELECT s.*,fs.date as datefin FROM service s INNER JOIN final_service fs ON s.id = fs.idservice');
        return $result;
    }
    public static function getByID($id){
        $service = Service::find($id);
        return $service;
    }
    public static function getPosteByIdService($id){
        return DB::select('select p.nom as nom from service as s join poste as p on s.idposte = p.id where s.id = ?', [$id]);
    }
}
