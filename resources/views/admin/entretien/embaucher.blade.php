
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
    {{-- pagination --}}

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
                                <h4 class="card-title">Embaucher un candidat</h4>
                                <form  id="TousFormulaire" action="{{ url('/contrat_embauche') }}" >
                                    <input type="hidden" name="idcandidat" value="{{ $idcandidat }}">
                                    <input type="hidden" name="idservice" value="{{ $idservice }}">
                                    <div class="">
                                        <div class="form-group">
                                            <p>Nom : <b>{{ $nom }}</b></p>
                                            <p>Prenoms : <b>{{ $prenoms }}</b></p>
                                            <p>Date de naissance : <b>{{ $dtn }}</b></p>
                                            <p>Poste : <b>{{ $poste }}</b></p>
                                            <label for="evaluation">Salaire de base (BRUT)</label>
                                            <input type="number" step="any" class="form-control" id="exampleInputUsername1" name="salaire" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="evaluation">Adresse</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Adresse" name="adresse" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputUsername1">Categories</label>
                                            <select class="form-control" name="categorie">
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}">{{ $categorie->categorie }}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-page" id="page1">
                                        <div class="form-group">
                                            <label for="evaluation">Evaluation</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Evaluation" name="evaluation" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="primes">Primes</label>
                                            <input type="number" class="form-control" id="exampleInputUsername1" placeholder="Ar" name="primes" required>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="remarque_sup">Remarque superieur hiérarchique</label>
                                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Remarque" name="remarque_sup" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-page" id="page2" style="display: none;">
                                        <div class="form-group">
                                            <label for="experience">Avantage</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control small-input" placeholder="Description" name="avantage[]" required>
                                                <input type="text" class="form-control small-input" placeholder="Detail" name="detail[]" required>
                                            </div>
                                        </div>
                                        <div id="inputContainer"> <!-- Conteneur pour les champs input dynamiques -->
                                        </div>
                                        <button type="button" id="ajoutCase" class="btn btn-primary btn-fw"> + Ajouter une case</button>
                                    </div>
                                    <div class="pagination-container">
                                        <button class="btn-pagination" type="button" onclick="showPage('previous')">Précédent</button>
                                        <div class="pagination-dots">
                                            <span class="pagination-dot" id="dot1"></span>
                                            <span class="pagination-dot" id="dot2"></span>
                                        </div>
                                        <button class="btn-pagination" type="button" onclick="showPage('next')">Suivant</button>
                                    </div>

                                    <button type="submit" class="btn btn-success btn-fw card-title creerService">Embaucher</button>
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
    {{-- pagination --}}>
    <script>
        var currentPage = 1;
        var numPages = document.querySelectorAll('.form-page').length;
        var dots = document.querySelectorAll('.pagination-dot');
        function showPage(action) {
          var newPage = currentPage;

          if (action === 'next' && currentPage < numPages) {
            newPage++;
          } else if (action === 'previous' && currentPage > 1) {
            newPage--;
          }

          // Masquer toutes les sections
          var pages = document.querySelectorAll('.form-page');
          for (var i = 0; i < pages.length; i++) {
            pages[i].style.display = 'none';
          }

          // Afficher la section actuelle
          var page = document.getElementById('page' + newPage);
          if (page) {
                page.style.display = 'block';
                currentPage = newPage;
                // Mettre à jour les points de pagination
                for (var i = 0; i < dots.length; i++) {
                    dots[i].classList.remove('active-dot');
                }
                var activeDot = document.getElementById('dot' + currentPage);
                if (activeDot) {
                    activeDot.classList.add('active-dot');
                }
            }
        }

        // Afficher la première section au chargement de la page
        showPage('previous'); // Pour afficher la première section

    </script>
    <script>
        document.getElementById('ajoutCase').addEventListener('click', function () {
            // Créez un nouveau groupe de formulaire
            var newFormGroup = document.createElement('div');
            newFormGroup.className = 'form-group';
            var newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group';

            // Créez un nouvel élément input
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.className = 'form-control small-input';
            newInput.placeholder = 'Description';
            newInput.name = 'avantage[]';
            newInput.setAttribute('required', 'required');

            var newInputDetail = document.createElement('input');
            newInputDetail.type = 'text';
            newInputDetail.className = 'form-control small-input';
            newInputDetail.placeholder = 'Detail';
            newInputDetail.name = 'detail[]';
            newInputDetail.setAttribute('required', 'required');

            newInputGroup.appendChild(newInput);
            newInputGroup.appendChild(newInputDetail);
            newFormGroup.appendChild(newInputGroup);

            // Ajoutez le nouveau groupe de formulaire au conteneur
            var inputContainer = document.getElementById('inputContainer');
            inputContainer.appendChild(newFormGroup);
        });
    </script>
    <script>
        function validateForm(form) {
        var requiredFields = form.querySelectorAll('[required]');
        var isValid = true;

        for (var i = 0; i < requiredFields.length; i++) {
            if (requiredFields[i].value.trim() === '') {
                isValid = false;
                break; // Sortez de la boucle dès qu'un champ vide est trouvé
            }
        }

        if (!isValid) {
            alert('Veuillez remplir tous les champs obligatoires.'); // Affichez un message d'erreur
            return false; // Empêchez la soumission du formulaire
        }

        return true; // Autorisez la soumission du formulaire s'il est valide
    }

    document.getElementById('TousFormulaire').addEventListener('submit', function (event) {
        var form = event.target; // Obtenez le formulaire actuel
        if (!validateForm(form)) {
            event.preventDefault(); // Empêchez la soumission du formulaire s'il est invalide
        }
    });
    </script>
    </body>
</html>
