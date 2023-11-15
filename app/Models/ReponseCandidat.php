<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ReponseCandidat extends Model
{
    use HasFactory;
    protected $table = 'reponse_candidat';

    public function reponse($idCandidat,$question,$valiny){
        DB::table('reponse_candidat')->insert([
            'idcandidat'=> $idCandidat,
            'idquestion'=> $question,
            'idreponse'=> $valiny
        ]);
    }
}
