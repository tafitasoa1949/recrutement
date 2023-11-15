<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RH</title>
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
        .row{
            margin-top: 250px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black; /* Ajoute des bordures */
        }
        th, td {
            padding: 8px;
        }
        .montant {
            width: 120px;
        }
        .avia{
            float: left;
            margin-left: 15px;
        }
        .avanana{
            float: right;
            margin-right: 120px;
        }
    </style>
</head>
<body>
    <div class="tete">
        <h3>FICHE DE PAIE</h3>
        <h4>ARRETE AU 31/10/23</h4>
    </div>
    <div class="indetite" >
        <div class="gauche">
            <p>Nom : <b>{{ $employe[0]->nom }}</b></p>
            <p>Prenom : <b>{{ $employe[0]->prenom }}</b></p>
            <p>Matricule : <b>{{ $employe[0]->matricule_id }}</b></p>
            <p>Fonction : <b>{{ $poste }}</b></p>
            <p>N° CNAPS : <b>{{ $cnaps_id }}</b></p>
            <p>Date d'embauche : <b>{{ $employe[0]->date_embauche }}</b></p>
            <p>Ancienneté : <b>{{ $anciennete->y }}an(s) et {{ $anciennete->m }} mois et {{ $anciennete->d }} jours</b></p>
        </div>
        <div class="droite">
            <p>Classification : <b>{{ $categorieEmp[0]->categorie }}</b></p>
            <p>Salaire de base : <b>{{ $employe[0]->salaire }} Ar</b></p>
            <p>Taux journaliers : <b>{{ $tauxJournalier }} Ar</b></p>
            <p>Taux horaires : <b>{{ $tauxHoraire }}</b></p>
            <p>Indice : <b>{{ $categorieEmp[0]->indice }}</b></p>
        </div>
    </div>
    <div class="row">
        <table>
            <thead>
                <th>Désignation</th>
                <th>Nombre</th>
                <th>Taux</th>
                <th class="montant">Montant</th>
            </thead>
            <tbody>
                <tr>
                    <td>Salaire du 01/11/23 au 30/11/23</td>
                    <td>{{ $totalHeureEmpMois }} H</td>
                    <td>{{ $tauxJournalier }}</td>
                    <td>{{ $salaire_mois }}</td>
                </tr>
                <tr>
                    <td>Absences déductibles</td>
                    <td>{{ $heureabsence }} H</td>
                    <td>{{ $tauxJournalier }}</td>
                    <td>{{ $salMialaCauseAbsent }}</td>
                </tr>
                <tr>
                    <td>Primes de rendement</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Primes d'ancienneté</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Heures supplémentaires majorées de 30%</td>
                    <td></td>
                    <td>30 627</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Heures supplémentaires majorées de 40%</td>
                    <td></td>
                    <td>32 983</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Heures supplémentaires majorées de 50%</td>
                    <td></td>
                    <td>35 339</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Heures supplémentaires majorées de 100%</td>
                    <td></td>
                    <td>47 118</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Majoration pour heures de nuit</td>
                    <td></td>
                    <td>7 068</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Primes diverses</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Rappels sur période antérieure</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Droits de congés</td>
                    <td></td>
                    <td>{{ $tauxJournalier }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Droits de préavis</td>
                    <td></td>
                    <td>{{ $tauxJournalier }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Indemnités de licenciement</td>
                    <td></td>
                    <td>{{ $tauxJournalier }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><b>Salaire but</b></td>
                    <td><b>{{ $salaire_mois }}</b></td>
                </tr>
                <tr>
                    <td>Retenue CNAPS 1%</td>
                    <td></td>
                    <td>{{ $cnaps1P }}</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Retenue sanitaire</td>
                    <td></td>
                    <td>20 120</td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tranche IRSA INF 350 0000</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>Tranche IRSA I DE 350 0001 à 400 000</td>
                    <td></td>
                    <td>5%</td>
                    <td>2 500</td>
                </tr>
                <tr>
                    <td>Tranche IRSA I DE 400 0001 à 500 000</td>
                    <td></td>
                    <td>10%</td>
                    <td>10 000</td>
                </tr>
                <tr>
                    <td>Tranche IRSA I DE 500 0001 à 600 000</td>
                    <td></td>
                    <td>15%</td>
                    <td>15 000</td>
                </tr>
                <tr>
                    <td>Tranche IRSA SUP 600 000</td>
                    <td></td>
                    <td>20%</td>
                    <td>684 515</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><h4>TOTAL IRSA</h4></td>
                    <td>712 015</td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><h5>Total des retenues</h5></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><h5>Autres indemnités</h5></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><h4>Net à payer</h4></td>
                    <td><b>{{ $netPayer }}</b></td>
                </tr>
            </tbody>
        </table>
        <div class="sincerely">
            <p>Avantages en nature : </p>
            <p>Déductions IRSA : </p>
            <p>Montant imposable : <b>{{ $montantImposable }} Ar</b></p>
            <p>Mode de paiement  : <b>Virement/chèque</b></p>
        </div>
        <div class="avia">
            <p>L'employeur</p>
        </div>
        <div class="avanana">
            <p>L'employé(e)</p>
        </div>
    </div>
</body>
</html>
