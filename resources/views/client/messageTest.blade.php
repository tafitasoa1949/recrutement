<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Postes Disponibles</title>
    <link rel="stylesheet" href="{{ asset('clients/index.css') }}">
</head>
<body>
    <div class="navbar">
        <div class="navbar-container">
            <ul class="navbar-links">
                <li><a href="#">Accueil</a></li>
                <li><a href="#">Services</a></li>
            </ul>
            <div class="navbar-search">
                <input type="text" placeholder="Rechercher">
                <button>Rechercher</button>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container">
            <h1>Message</h1>
            <div class="postes-container">
                <div class="poste">
                    <div class="poste-details">
                        <h2>Je vous remercie par avance du temps que vous passerez à examiner cette demande, et reste à disposition pour une rencontre.
                            Dans cette attente ,
                            je vous prie de croire, Madame, Monsieur, à l'expression de mes salutations distinguées <br>
                            En vous envoi un email si vous êtres selection pour l'intretient
                        </h2>
                        <a class="postuler-button" href="{{ url('/annonce') }}">Une autre Candidature</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
