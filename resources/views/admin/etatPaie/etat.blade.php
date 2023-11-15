
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Recrutement Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2/owl.theme.default.min.css') }}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>
</head>
<body>
<div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    @include('admin.content.sidebar')
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin.content.navbar')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <h4 class="card-title">Etat de paie</h4>
                                <h4>{{ $dateNow }}</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Nbre</th>
                                        <th>Immatricule</th>
                                        <th>N° CNAPS</th>
                                        <th>Nom et Prenoms</th>
                                        <th>Date d'embauche</th>
                                        <th>Absence du mois</th>
                                        <th>CAT</th>
                                        <th>Fonction</th>
                                        <th>Salaire de base</th>
                                        <th>Retenues sur Absence</th>
                                        <th>Salaire de base du mois</th>
                                        <th>Endemnite</th>
                                        <th>Rappel L</th>
                                        <th>Autres S</th>
                                        <th>HR SUR/MAJ</th>
                                        <th>Salaire brut</th>
                                        <th>CNAPS 1%</th>
                                        <th>CNAPS 8%</th>
                                        <th>OSTIE 1%</th>
                                        <th>OSTIE 8%</th>
                                        <th>Revenu Imposable</th>
                                        <th>Autres retenues</th>
                                        <th>Total retenues</th>
                                        <th>Salaire net</th>
                                        <th>Avance</th>
                                        <th>NET a Payer</th>
                                        <th>Net du mois</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($list_empolyes as $indice)
                                        <tr>
                                            <td>{{ $date }}</td>
                                            <td>1</td>
                                            <td>{{ $indice['matricule_id'] }}</td>
                                            <td>{{ $indice['cnaps_im'] }}</td>
                                            <td>{{ $indice['nom'] }} {{ $indice['prenom'] }}</td>
                                            <td>{{ $indice['date_embauche'] }}</td>
                                            <td>{{ $indice['heureabsence'] }} H</td>
                                            <td></td>
                                            <td>{{ $indice['poste'] }}</td>
                                            <td>{{ $indice['salaire'] }} </td>
                                            <td></td>
                                            <td>{{ $indice['salaire_mois'] }} </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $indice['heure_sup'] }} H</td>
                                            <td>{{ $indice['salaire_brut'] }} </td>
                                            <td>{{ $indice['cnaps1P'] }} </td>
                                            <td>{{ $indice['cnaps8P'] }} </td>
                                            <td>{{ $indice['ostie1P'] }} </td>
                                            <td>{{ $indice['ostie5P'] }} </td>
                                            <td>{{ $indice['revenueImposable'] }} </td>
                                            <td></td>
                                            <td>{{ $indice['totalRetenue'] }} </td>
                                            <td>{{ $indice['salaireNet'] }} </td>
                                            <td></td>
                                            <td>{{ $indice['netPayer'] }} </td>
                                            <td>{{ $indice['netPayer'] }} </td>
                                        </tr>
                                    @endforeach
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $dataTotal['totalsalaireBase'] }} </td>
                                            <td></td>
                                            <td>{{ $dataTotal['totalsalaireMois'] }} </td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>{{ $dataTotal['totalHeureSup'] }} H</td>
                                            <td>{{ $dataTotal['totalsalaireBrut'] }} </td>
                                            <td>{{ $dataTotal['totalCnaps1P'] }} </td>
                                            <td>{{ $dataTotal['totalCnaps8P'] }} </td>
                                            <td>{{ $dataTotal['totalOstie1P'] }} </td>
                                            <td>{{ $dataTotal['totalOstie5P'] }} </td>
                                            <td>{{ $dataTotal['totalRevenueImposable'] }} </td>
                                            <td></td>
                                            <td>{{ $dataTotal['totalTotalRetenue'] }} </td>
                                            <td>{{ $dataTotal['totalsalaireNet'] }} </td>
                                            <td></td>
                                            <td>{{ $dataTotal['totalNetaPayer'] }} </td>
                                            <td>{{ $dataTotal['totalNetDuMois'] }} </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Administrator Of Recrutement</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/vendors/progressbar.js/progressbar.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<script src="{{ asset('assets/vendors/owl-carousel-2/owl.carousel.min.js') }}"></script>
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{ asset('assets/js/off-canvas.js') }}"></script>
<script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
<script src="{{ asset('assets/js/misc.js') }}"></script>
<script src="{{ asset('assets/js/settings.js') }}"></script>
<script src="{{ asset('assets/js/todolist.js') }}"></script>
<!-- endinject -->
<!-- Custom js for this page -->
<script src="{{ asset('assets/js/dashboard.js') }}"></script>
<!-- End custom js for this page -->
</body>
</html>
