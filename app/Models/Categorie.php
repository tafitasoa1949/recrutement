<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Categorie extends Model
{
    use HasFactory;
    protected $table = 'categories';

    public function categories() {
        $query = "select * from categories";
        $result = DB::select($query);
        return $result;
    }

    public function getSalaireCategorie($id_categorie) {
        $query = "select * from categories where id = ?";
        $result = DB::select($query,[$id_categorie]);
        return $result;
    }
}
