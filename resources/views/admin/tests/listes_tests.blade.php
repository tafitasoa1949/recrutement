
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
                <h4 class="card-title">Nouvelle question</h4>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                    <label for="exampleInputUsername1">Question</label>
                                <input type="hidden" name="id_service" value="{{ $id_service }}">
                                <div class="form-group row mx-2">
                                    <input type="text" class="form-control col-md-5" id="exampleInputUsername1" placeholder="votre question" name="question" required>
                                    <input type="number" class="form-control col-md-2 mx-2" id="exampleInputUsername1" placeholder="coefficient" name="coefficient" required>
                                </div>
                                <div class="form-group" id="checkbox_container">
                                    <label for="exampleInputUsername1">Details des réponses</label>
                                    <button type="button" class="btn btn-primary mx-5 mb-2" onclick="ajouter_reponse()">+ ajouter une reponse</button>
                                    <button type="button" class="btn btn-danger mx-5 mb-2" onclick="supprimer_reponse()" >x supprimer une réponse</button>
                                    <div class="row mx-1 mt-1" id="original">
                                        <input type="text" class="form-control col-md-5" id="exampleInputUsername1" placeholder="Choix" name="reponses[]" required>
                                        <label for="exampleInputUsername1"><span class="mx-1"></span></label>
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" name="reponse_r[]" value="0" class="form-check-input ck"> Réponse correcte </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-primary mr-2"  onclick="teste()">Ajouter</button>
                                <button class="btn btn-dark">Annuler</button>
                            </div>
                        </div>
                    </div>
                    <!--<button type="submit" class="btn btn-success btn-fw card-title creerService">creer le nouveau service</button>-->

                </div>
                <div class="d-flex flex-row justify-content-between mb-3">
                    <h4 class="card-title mb-1">Les questions</h4>
                    <p class="text-muted mb-1 small">Uniquement pour ce poste</p>
                </div>
                <div class="row">
                    <?php $i = 1; $idQuestion = null;?>
                    @foreach ($listes_questions as $indice)
                        <?php $idQuestion = $indice->id ?>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="">
                                            <div class="preview-item">
                                                <div class="preview-thumbnail">
                                                        <h6 class="">Question <?php echo $i ?></h6>
                                                </div>
                                                <div class="preview-item-content">
                                                    <div class="">
                                                        <p class="text-light font-weight-lighter mb-0">{{ $indice->fanontaniana }}</p>
                                                    </div>
                                                    <div class="mr-auto text-sm-center pt-2 pt-sm-0 mt-3">
                                                        <?php ?>
                                                        @foreach($listes_reponses as $reponses)
                                                            <?php
                                                                if($idQuestion == $reponses->idquestion){
                                                                    if($reponses->vrai == 1) { ?>
                                                                        <p class="text-success mb-0"><i class="mdi mdi-check-circle"></i> {{ $reponses->valiny }} </p>
                                                                    <?php }else{ ?>
                                                                        <p class="text-muted mb-0"> {{ $reponses->valiny }} </p>
                                                            <?php }} ?>
                                                        @endforeach
                                                        <?php ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php $i++; ?>
                    @endforeach
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
        newInput.name = 'nouvelleCase'; // Nom du nouvel input

        // Ajoutez le nouvel input au nouveau groupe de formulaire
        newFormGroup.appendChild(newInput);

        // Ajoutez le nouveau groupe de formulaire au conteneur
        var inputContainer = document.getElementById('inputContainer');
        inputContainer.appendChild(newFormGroup);
    });
</script>
<script>
    var counter = 1; // Utilisez un compteur pour donner des noms de champ uniques
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

    function supprimer_reponse() {
        var container = document.querySelector('#checkbox_container');
        var original = document.querySelector('#original');
        var copy = original.cloneNode(true);
        copy.id = "";
        copy.querySelector('input').value = "";
        copy.querySelector('input.ck').checked = false;
        if(container.childElementCount > 1){
            container.removeChild(container.lastChild);
        }else{
            alert('il faut au moins une reponse');
        }
    }

    function change_value_to_1_if_checked() {
        var reponses = document.getElementsByName('reponses[]');
        var reponse_r = document.getElementsByName('reponse_r[]');
        var question = document.getElementsByName('question');
        for (var i = 0; i < reponse_r.length; i++) {
            if (reponse_r[i].checked) {
                reponse_r[i].value = 1;
            }
            console.log(reponse_r[i].value);
        }

        var response = break_if_an_input_empty();
        if (response) {
            return;
        }else{
            reponses = Array.from(reponses).map(el => el.value);
            reponse_r = Array.from(reponse_r).map(el => el.value);

            var inputData = {
                '_token': '{{ csrf_token() }}',
                'id_service' : document.getElementsByName('id_service')[0].value,
                'question': question[0].value,
                'coefficient': document.getElementsByName('coefficient')[0].value,
                'reponses': reponses,
                'reponse_r': reponse_r
            };
            var jsonData = JSON.stringify(inputData);
            console.log(jsonData);
            $.ajax({
                url: "{{ url('ajouterQuestion') }}",
                type: "POST",
                data: jsonData,
                dataType: "json",
                contentType: "application/json"
            });
            alert('question ajoutée');
            location.reload();
            reset_all_input();
        }
    }

    function teste() {
        change_value_to_1_if_checked();
    }

    function reset_all_input() {
        var reponses = document.getElementsByName('reponses[]');
        var reponse_r = document.getElementsByName('reponse_r[]');
        var question = document.getElementsByName('question');
        for (var i = 0; i < reponse_r.length; i++) {
            if (reponse_r[i].checked) {
                reponse_r[i].checked = false;
            }
        }
        for (var i = 0; i < reponses.length; i++) {
            reponses[i].value = "";
        }
        question[0].value = "";
        document.getElementsByName('coefficient')[0].value = "";
    }

    function break_if_an_input_empty() {
        var reponses = document.getElementsByName('reponses[]');
        var reponse_r = document.getElementsByName('reponse_r[]');
        var question = document.getElementsByName('question');
        var coefficient = document.getElementsByName('coefficient');
        var is_empty = false;
        for (var i = 0; i < reponses.length; i++) {
            if (reponses[i].value == "") {
                is_empty = true;
                break;
            }
        }
        if (question[0].value == "") {
            is_empty = true;
        }
        if (coefficient[0].value == "") {
            is_empty = true;
        }
        if (is_empty) {
            alert('il faut remplir tous les champs');
            return true;
        }
        return false;
    }
</script>
{{--  --}}
</body>
</html>
