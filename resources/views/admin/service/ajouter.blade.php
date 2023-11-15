
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
                                <h4 class="card-title">UN NOUVEAU SERVICE</h4>
                                <form  id="TousFormulaire" action="{{ url('/creer') }}">
                                    <div class="form-page" id="page1">
                                        <div class="form-group">
                                            <label for="poste">Poste</label>
                                            <select class="form-control" id="" name="poste" required>
                                                @foreach ($listposte as $poste)
                                                    <option value="{{ $poste->id }}">{{ $poste->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="contrat">Contrat</label>
                                            <select class="form-control" id="" name="contrat" required>
                                                @foreach ($listcontrat as $contrat)
                                                    <option value="{{ $contrat->id }}">{{ $contrat->nom }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="dureetache">Durée de tache</label>
                                                <input type="number" class="form-control" id="exampleInputUsername1" placeholder="Nombre de jour" name="dureetache" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="volumehoraire">Volume horaire</label>
                                                <input type="number" class="form-control" id="exampleInputUsername1" placeholder="Nombre d'heure" name="volumehoraire" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="dateLimite">Date de limite de depot de dossier</label>
                                            <input type="datetime-local" class="form-control" id="exampleInputUsername1" name="dateLimite" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">A propos de service</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Text" name="description" required>
                                        </div>
                                    </div>
                                    <div class="form-page" id="page2" style="display: none;">
                                        <div class="form-group">
                                            <label for="challenge">Challenge</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Text" name="challenge[]" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Text" name="challenge[]" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Text" name="challenge[]" required>
                                        </div>
                                        <div id="inputContainer"> <!-- Conteneur pour les champs input dynamiques -->
                                        </div>
                                        <button type="button" id="ajoutCase" class="btn btn-primary btn-fw"> + Ajouter une case</button>
                                    </div>
                                    <div class="form-page" id="page3" style="display: none;">
                                        <h2>Critere</h2>
                                        <div class="form-group">
                                            <label for="diplome">Diplome</label>
                                            <div class="input-group">
                                                <select class="form-control" id="" name="diplome" style="margin-right: 10px;" >
                                                    <option value="BEPC">AUCUN</option>
                                                    <option value="BEPC">BEPC</option>
                                                    <option value="BACC">BACC</option>
                                                    <option value="LICENCE">LICENCE</option>
                                                    <option value="MASTER">MASTER</option>
                                                    <option value="DOCTORAT">DOCTORAT</option>
                                                </select>
                                                <input type="number" class="form-control small-input" placeholder="Coefficient" name="coeffDiplome" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="experience">Experience</label>
                                            <div class="input-group">
                                                <select class="form-control" id="" name="experience" style="margin-right: 10px;" >
                                                    <option value="+1">+1</option>
                                                    <option value="+2">+2</option>
                                                    <option value="+3">+3</option>
                                                    <option value="+4">+4</option>
                                                    <option value="+5">+5</option>
                                                </select>
                                                <input type="number" class="form-control small-input" placeholder="Coefficient" name="coeffExperience" >
                                            </div>
                                        </div>
                                        <h2> Autre Critere</h2>
                                        <div class="form-group">
                                            <label for="critere">critere</label>
                                            <div class="input-group">
                                                <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Text" name="critere[]" style="margin-right: 10px;" >
                                                <input type="number" class="form-control small-input" placeholder="Coefficient" name="coeffCritere[]" >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="detailCritere">Detail</label>
                                            <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Text" name="detailCritere[]" >
                                        </div>
                                        <div id="inputContainerCritere">
                                        </div>
                                        <button type="button" id="ajoutCritere" class="btn btn-primary btn-fw"> + Ajouter un critère</button>
                                    </div>
                                    <div class="pagination-container">
                                        <button class="btn-pagination" type="button" onclick="showPage('previous')">Précédent</button>
                                        <div class="pagination-dots">
                                            <span class="pagination-dot" id="dot1"></span>
                                            <span class="pagination-dot" id="dot2"></span>
                                            <span class="pagination-dot" id="dot3"></span>
                                        </div>
                                        <button class="btn-pagination" type="button" onclick="showPage('next')">Suivant</button>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-fw card-title creerService">creer le nouveau service</button>
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

            // Créez un nouvel élément input
            var newInput = document.createElement('input');
            newInput.type = 'text';
            newInput.className = 'form-control';
            newInput.placeholder = 'Text';
            newInput.name = 'challenge[]';

            // Ajoutez le nouvel input au nouveau groupe de formulaire
            newFormGroup.appendChild(newInput);

            // Ajoutez le nouveau groupe de formulaire au conteneur
            var inputContainer = document.getElementById('inputContainer');
            inputContainer.appendChild(newFormGroup);
        });
    </script>
    <script>
        var counter = 1; // Utilisez un compteur pour donner des noms de champ uniques

        document.getElementById('ajoutCritere').addEventListener('click', function () {
            // Créez un nouveau groupe de formulaire
            var newFormGroup = document.createElement('div');
            newFormGroup.className = 'form-group';
            var newFormGroupDetail = document.createElement('div');
            newFormGroupDetail.className = 'form-group';

            // Créez un groupe de champ d'entrée
            var newInputGroup = document.createElement('div');
            newInputGroup.className = 'input-group';

            // Créez le champ de critère
            var newInputCritere = document.createElement('input');
            newInputCritere.type = 'text';
            newInputCritere.className = 'form-control';
            newInputCritere.placeholder = 'Critère';
            newInputCritere.setAttribute('style', 'margin-right: 10px;');
            newInputCritere.name = 'critere' + counter; // Nom unique pour le champ de critère
            newInputGroup.appendChild(newInputCritere);

            // Créez le champ de coefficient
            var newInputCoeff = document.createElement('input');
            newInputCoeff.type = 'number';
            newInputCoeff.className = 'form-control small-input';
            newInputCoeff.placeholder = 'Coefficient';
            newInputCoeff.name = 'coefficient' + counter; // Nom unique pour le champ de coefficient
            newInputGroup.appendChild(newInputCoeff);

            // Ajoutez le groupe de champ d'entrée au groupe de formulaire
            newFormGroup.appendChild(newInputGroup);

            // Créez le champ de détail
            var newInputDetail = document.createElement('input');
            newInputDetail.type = 'text';
            newInputDetail.className = 'form-control';
            newInputDetail.placeholder = 'Détail';
            newInputDetail.name = 'detail' + counter; // Nom unique pour le champ de détail
            newFormGroupDetail.appendChild(newInputDetail);

            // Ajoutez le nouveau groupe de formulaire au conteneur
            var inputContainer = document.getElementById('inputContainerCritere');
            inputContainer.appendChild(newFormGroup);
            inputContainer.appendChild(newFormGroupDetail);

            // Incrémentez le compteur pour les noms de champ uniques
            counter++;
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
    <script>
        var i = 0;
        function ajouter_reponse() {
            var container = document.querySelector('#checkbox_container');
            var original = document.querySelector('#original');
            var copy = original.cloneNode(true);
            copy.id = "";
            copy.querySelector('input').value = "";
            copy.querySelector('input.ck').checked = false;
            container.appendChild(copy);
        }

        function change_value_to_1_if_checked() {
            var reponse_r = document.getElementsByName('reponse_r[]');
            for (var i = 0; i < reponse_r.length; i++) {
                if (reponse_r[i].checked) {
                    reponse_r[i].value = 1;
                }
                console.log(reponse_r[i].value);
            }
        }

        function teste() {
            change_value_to_1_if_checked();
        }
    </script>
    {{--  --}}
    </body>
</html>
