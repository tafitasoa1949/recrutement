<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Motif extends Model
{
    use HasFactory;
    protected $table = 'motif';

    public function getAllMotifs() {
        $query = "select * from motif";
        $result = DB::select($query);
        return $result;
    }

    public function getMotif($id) {
        $query = "select * from motif where id = ?";
        $result = DB::select($query, [$id]);
        return $result; }
}
