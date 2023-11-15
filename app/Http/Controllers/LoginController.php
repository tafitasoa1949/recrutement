<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Login;
use App\Models\Poste;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login');
    }

    // public function verifications(Request $request)
    // {
    //     $login = new Login();
    //     $resultats = $login->GetUsers();
    //     $email = $request->input('email');
    //     $mdp = $request->input('mdp');

    //     try {
    //         foreach ($resultats as $resultat) {
    //             $idutilisateur = $resultat->idutilisateur;
    //             $emailB = $resultat->email;
    //             $mdpB = $resultat->mdp;
    //             $poste =$resultat->poste;

    //             if ($email == $emailB && $mdp == $mdpB) {

    //                 session(['idutilisateur' => $idutilisateur, 'poste' => $poste]);

    //                 $nom_poste = session('poste');

    //                 $poste = new Poste();
    //                 $list = $poste->getList();

    //                 // foreach($list as $lists){
    //                 //     $nom = $lists->nom;

    //                         if($nom_poste != 'Poste 1'){
    //                             echo "mety";
    //                             return view('admin.home',[
    //                                 'list' => $list
    //                             ]);
    //                         } else{
    //                             return view('admin.conge.conges',[
    //                             ]);
    //                         }
    //                 // }

    //                 // return response()->json(['message' => 'Authentification réussie']);
    //             }
    //         }

    //         throw new \Exception('Identifiants invalides');
    //     } catch (\Exception $e) {
    //         return view('admin.users.login')->with('error', 'Identifiants invalides');
    //     }
    // }


    public function verifications(Request $request)
    {
        $login = new Login();
        $resultats = $login->GetUsers();
        $email = $request->input('email');
        $mdp = $request->input('mdp');

        try {
            foreach ($resultats as $resultat) {
                $idutilisateur = $resultat->employe_id;
                $emailB = $resultat->email;
                $mdpB = $resultat->mdp;
                $profil =$resultat->profil;

                //dd($emailB, $mdpB);
                if ($email == $emailB && $mdp == $mdpB) {

                    session(['idutilisateur' => $idutilisateur, 'profil' => $profil]);

                    $nom_profil = session('profil');
                    //dd($nom_profil);
                    // return view('admin.content.siderbar',[
                    //     'nom_profil' => $linom_profilst
                    // ]);

                    $poste = new Poste();
                    $list = Poste::simplePaginate(2);

                    // foreach($list as $lists){
                    //     $nom = $lists->nom;

                            if ($nom_profil == 'Admin') {
                                return view('admin.home', [
                                    'list' => $list,
                                    'nom_profil' => $nom_profil
                                ]);
                            } else {
                                return redirect()->route('conges');
                            }
                    // }

                    // return response()->json(['message' => 'Authentification réussie']);
                }
            }

            throw new \Exception('Identifiants invalides');
        } catch (\Exception $e) {
            return view('admin.users.login')->with('error', 'Identifiants invalides');
        }
    }


    public function registre(){

        return view('admin.users.register');
    }

    public function inscription(Request $request){
        $login = new Login();
        $data = array(
            'nom' => $request->input('nom'),
            'mdp' => $request->input('mdp'),
            'email' => $request->input('email')
        );

        dd($data);
        // $login->insertUsers($data);



    }

}
