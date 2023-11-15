<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contrat d'essai</title>
    <style>
        .tete{
            text-align: center;
        }
        .gauche{
            float: left;
            margin-left: 15px;
        }
        .droite{
            float: right;
            margin-right: 120px;
        }
    </style>
</head>
<body>
    <div class="tete">
        <h3>Contrat d'Essai</h3>
        <h4>Tek Tolo Madagascar</h4>
    </div>
    <div>
        <p>Nom : <b>{{ $candidat->nom }}</b></p>
        <p>Prenoms : <b>{{ $candidat->prenom }}</b></p>
        <p>Date de naissance : <b>{{ $candidat->date_naissance }}</b></p>
        <p>Email : <b>{{ $candidat->email }}</b></p>
        <p>Contact : <b>{{ $candidat->contact }}</b></p>
        <p>Poste : <b>{{ $poste }}</b></p>
        <p>Debut : <b>{{ $contratEssai[0]->datedebut }}</b></p>
        <p>Fin : <b>{{ $contratEssai[0]->datefin }}</b></p>
        <p>Edemnité : <b>{{ $contratEssai[0]->endmnite }} Ar</b></p>
    </div>
    <div class="gauche">
        <p>L'employeur</p>
    </div>
    <div class="droite">
        <p>L'employé(e)</p>
    </div>
</body>
</html>
