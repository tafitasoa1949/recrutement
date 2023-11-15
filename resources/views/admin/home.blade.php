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
              <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste poste</h4>
                    <div class="table-responsive">
                      <table class="table">
                        <thead>
                          <tr>
                            <th>Poste</th>
                            <th>Salaire minimium.</th>
                            <th>Salaire maximium</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $indice)
                                <tr>
                                    <td>{{ $indice->nom }}</td>
                                    <td>{{ $indice->minsalaire }} Ar</td>
                                    <td>{{ $indice->maxsalaire }} Ar</td>
                                    <td><a href="{{ url('supprimer_poste/'.$indice->id) }}"><label class="badge badge-danger">Supprimer</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="pagination justify-content-center mt-4">

                        @if ($list->onFirstPage())
                            <span class="btn btn-secondary">&laquo;&nbsp;&nbsp;</span>
                        @else
                            <a class="btn btn-light" href="{{ $list->previousPageUrl() }}" rel="prev">&laquo;&nbsp;&nbsp;</a>
                        @endif

                        @foreach ($list as $page => $url)
                            @if ($page == $list->currentPage())
                                <span class="btn btn-primary">{{ $page }}</span>
                            @else
                                <a class="btn btn-light" href="{{ $url }}">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($list->hasMorePages())
                            <a class="btn btn-light" href="{{ $list->nextPageUrl() }}" rel="next">&nbsp;&nbsp;&raquo;</a>
                        @else
                            <span class="btn btn-light">&nbsp;&nbsp;&raquo;</span>
                        @endif

                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Nouveau poste</h4>
                    <form class="forms-sample" method="GET" action="{{ url('/save_poste') }}">
                      <div class="form-group">
                        <label for="exampleInputUsername1">Nom</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Nom" name="nom">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Salaire minimium</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Min Slaire" name="min">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Salaire maximium</label>
                        <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Max salaire" name="max">
                      </div>
                      <button type="submit" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-dark">Cancel</button>
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
