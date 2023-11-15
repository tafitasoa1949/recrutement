<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Entreprise extends Model
{
    use HasFactory;
    public function getList(){
        $result = DB::select("select * from entreprise");
        return $result;
    }
}
