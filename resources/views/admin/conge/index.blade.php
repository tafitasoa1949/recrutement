
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
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                @if(isset($erreur))
                                    <div class="alert alert-danger">
                                        {{ $erreur }}
                                    </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="card-title">Liste des demandes</h4>
                                    <a href="{{ url('/encore_en_conge') }}"><button class="btn btn-primary">Les employes encore en conge</button></a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>Immatricule</th>
                                            <th>Nom</th>
                                            <th>Congés disponibles</th>
                                            <th>Debut</th>
                                            <th>Fin</th>
                                            <th>Motif</th>
                                            <th>Etat</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($liste_employe_et_conge as $indice)
                                            <tr>
                                                <td>{{ $indice->employe_id }}</td>
                                                <td>{{ $indice->nom }}</td>
                                                <td>{{ number_format($indice->reste,2) }} heures <sub>({{ number_format($indice->reste/8,2) }} Jours)</sub></td>
                                                <td>{{ $indice->date_debut }}</td>
                                                <td>{{ $indice->date_fin }}</td>
                                                <td>{{ $indice->motif }}</td>
                                                <td>
                                                    @if($indice->resultat == 0)
                                                        <label class="badge badge-danger">En attente</label>
                                                    @elseif($indice->resultat == 10)
                                                        <label class="badge badge-warning">En confirmation</label>
                                                    @elseif($indice->resultat == 50)
                                                        <label class="badge badge-success">Confirmé</label>
                                                    @elseif($indice->resultat == 100)
                                                        <label class="badge badge-danger">Refusé</label>
                                                    @endif
                                                </td>
                                                <td class="d-flex">
                                                    @if($indice->resultat == 0)
                                                        <a class="nav-link text-success" href="{{ url('/valider_rh/'.$indice->demande_id) }}"><sup>valider RH</sup></a>
                                                        <a class="nav-link text-danger" href="{{ url('/refuser_demande/'.$indice->demande_id) }}"><sub>refuser RH</sub></a>
                                                    @elseif($indice->resultat == 10)
                                                        <a class="nav-link text-success" href="{{ url('/valider_sh/'.$indice->demande_id) }}"><sup>valider SH</sup></a>
                                                        <a class="nav-link text-danger" href="{{ url('/refuser_demande/'.$indice->demande_id) }}"><sub>refuser SH</sub></a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Nouveau congé</h4>
                                <form class="forms-sample" method="POST" action="{{ url('/demande_conge') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Immatricule</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Immatricule" name="id_employe">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Le</label>
                                        <input type="datetime-local" class="form-control" id="exampleInputUsername1" placeholder="date" name="date_debut">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Au</label>
                                        <input type="datetime-local" class="form-control" id="exampleInputUsername1" placeholder="date" name="date_fin">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Motifs</label>
                                        <select name="motif" class="form-control">
                                            @foreach($motifs as $indice)
                                                <option value="{{ $indice->id }}">{{ $indice->motif }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Valider</button>
                                    <button class="btn btn-dark">Annuler</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Demarrer un congé</h4>
                                <form class="forms-sample" method="POST" action="{{ url('/conge') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Immatricule</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Immatricule" name="id_employe">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Le</label>
                                        <input type="datetime-local" class="form-control" id="exampleInputUsername1" placeholder="date" name="date_debut">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Motifs</label>
                                            <select name="motif" class="form-control">
                                                @foreach($motifs as $indice)
                                                    <option value="{{ $indice->id }}">{{ $indice->motif }}</option>
                                                @endforeach
                                            </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Valider</button>
                                    <button class="btn btn-dark">Annuler</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Terminer un congé</h4>
                                <form class="forms-sample" method="POST" action="{{ url('/fin_conge') }}">
                                    @csrf
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Immatricule</label>
                                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Immatricule" name="id_employe">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputUsername1">Le</label>
                                        <input type="datetime-local" class="form-control" id="exampleInputUsername1" placeholder="date" name="date_fin">
                                    </div>
                                    <button type="submit" class="btn btn-primary mr-2">Terminer</button>
                                    <button class="btn btn-dark">Annuler</button>
                                </form>
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
