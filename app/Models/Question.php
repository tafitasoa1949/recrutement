<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{
    use HasFactory;

    public static function orderBy()
    {
        $request = "select id from question order by id desc limit 1";
        $result = DB::select($request);
        return $result;
    }

    public function insert($data){
        DB::table('question')->insert([
            'idservice'=> $data['idservice'],
            'fanontaniana'=> $data['fanontaniana'],
            'coefficient'=> $data['coefficient']
        ]);
    }
    public function insertReponse($data){
        $data_length = count($data['valiny']);
        for ($i = 0; $i < $data_length; $i++) {
            DB::table('reponse')->insert([
                'idquestion'=> $data['idquestion'],
                'valiny'=> $data['valiny'][$i],
                'vrai'=> $data['vrai'][$i]
            ]);
        }
    }
    public function getByID($id){
        $question = Question::find($id);
        return $question;
    }

    public function getQuestionFromService($id){
        $request = "select * from question where idservice= $id";
        $result = DB::select($request);
        return $result;
    }

    public static function getReponseFromService($id){
        $request = "select * from reponse join question q on reponse.idquestion = q.id where idservice= $id";
        $result = DB::select($request);
        return $result;
    }

}
