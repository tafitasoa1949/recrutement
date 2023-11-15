<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuestionModel extends Model
{
    use HasFactory;
    protected $table = 'question';

    public function reponses()
    {
        return $this->hasMany(Reponse::class, 'idquestion');
        // ->where('votre_colonne', '=', 'votre_valeur');
    }
}
