<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
    use HasFactory;

    protected $table = 'utlisateur';

    public function GetUsers()
    {
        return DB::select('SELECT * from user_employe as ue join info_employe as ie on ie.employe_id = ue.employe_id
        join profil_employe as pe on pe.idposte = ie.idposte');
    }


    public function insertUsers($data){

        $id = DB::table('utlisateur')->insert([
            'idposte'=> $data['idposte'],
            'nom'=> $data['nom'],
            'email'=>$data['email'],
            'mdp'=>$data['mdp']
        ]);
    }

}
