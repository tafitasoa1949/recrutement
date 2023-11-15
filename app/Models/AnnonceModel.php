<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AnnonceModel extends Model
{
    use HasFactory;
    
    public function GetAnnonce()
    {
        return DB::select('select * from annonce');
    }
}
