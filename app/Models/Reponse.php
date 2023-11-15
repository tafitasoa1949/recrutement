<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Reponse extends Model
{
    use HasFactory;
    protected $table = 'reponse';

    public function question()
    {
        return $this->belongsTo(QuestionModel::class, 'idquestion');
    }
    public static function reponseCandidat($idcandidat,$idquestion){
        return DB::table('reponse_candidat')
        ->where('idcandidat', $idcandidat)
        ->where('idquestion', $idquestion)
        ->value('idreponse');
    }
    public static function checkReponseVrai($idreponse,$idquestion){
        return DB::table('reponse')
        ->where('id', $idreponse)
        ->where('idquestion', $idquestion)
        ->value('vrai');
    }
}
