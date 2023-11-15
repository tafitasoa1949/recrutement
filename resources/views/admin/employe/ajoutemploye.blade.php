
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

                    <form class="forms-sample" method="POST" action="{{ url('/employe') }}">
                        @csrf
                    <div class="col-md-12 grid-margin stretch-card">
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Nouvel employe</h4>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Nom</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nom" name="nom">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Prenoms</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Prenoms" name="prenom">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Date d'embauche</label>
                                            <input type="date" name="date_embauche" class="form-control" placeholder="Date d'embauche">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Poste</label>
                                            <input type="text" name="poste" class="form-control" placeholder="Poste">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Categories</label>
                                            <select class="form-control" name="categorie">
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Salaire</label>
                                            <input type="number" name="salaire" class="form-control" placeholder="Salaire">
                                            @if(session('error'))
                                                <div class="alert alert-danger">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class="col-md-6 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Plus d'informations</h4>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Genre</label>
                                            <select class="form-control" name="genre">
                                                <option value="homme">Homme</option>
                                                <option value="femme">Femme</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Adresse</label>
                                            <input type="text" name="adresse" class="form-control" placeholder="Adresse">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Contact</label>
                                            <input type="tel" name="contact" class="form-control" placeholder="Contact">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Date de naissance</label>
                                            <input type="date" name="date_naissance" class="form-control" placeholder="Date de naissance">
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Valider</button>
                                        <button class="btn btn-dark">Annuler</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </form>
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

