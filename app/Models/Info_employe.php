<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Info_employe extends Model
{
    use HasFactory;
    protected $table = 'info_employe';

    public function get_info_employe($id_employe) {
        $query = "select * from info_employe where employe_id = ? and date_fin is null";
        $result = DB::select($query, [$id_employe]);
        return $result;
    }
}
