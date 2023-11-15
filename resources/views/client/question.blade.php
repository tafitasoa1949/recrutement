<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Postuler</title>
    <link rel="stylesheet" href="{{ asset('clients/postuler.css') }}">
   <link rel="stylesheet" href="{{ asset('assets2/css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('assets2/css/open-iconic-bootstrap.min.css')}}">
    
    <link rel="stylesheet" href="{{ asset('assets2/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets2/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets2/css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{ asset('assets2/css/aos.css')}}">

    <link rel="stylesheet" href="{{ asset('assets2/css/ionicons.min.css')}}">

    <link rel="stylesheet" href="{{ asset('assets2/css/bootstrap-datepicker.css')}}">
    <link rel="stylesheet" href="{{ asset('assets2/css/jquery.timepicker.css')}}">
    
    <link rel="stylesheet" href="{{ asset('assets2/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{ asset('assets2/css/icomoon.css')}}">
    <link rel="stylesheet" href="{{ asset('assets2/css/style.css')}}">
    <style>
    .custom-checkbox .custom-control-input:checked~.custom-control-label::before {
      border: 3px solid #007bff;
    }
  </style>
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

<div class="container mt-5">
<div class="card-body">

<div class="container mt-5">
      <blockquote class="blockquote text-center">
        <h2 class="mb-0 font-weight-bold">Partie de test</h2>
      </blockquote>
    </div>

    <h5>Veuillez cocher la réponse exacte aux questions suivante</h5>
    <br>
    <form method="post" action="{{ route('reponseTest') }}">
    @csrf

    @foreach ($questions as $question)
    <div class="card mb-5">
        <div class="card-body">
            <h5 class="card-title">{{ $question->fanontaniana }}</h5>
            <input type="hidden" name="idquestion[]" value="{{ $question->id }}">
            <p class="card-text">Choisir vôtre reponse(s)</p>

            @foreach ($question->reponses as $reponse)
                <div class="form-check">
                <input type="checkbox" class="form-check-input" id="radio{{ $reponse->id }}" name="reponsesQuestion{{ $question->id }}[]" value="{{ $reponse->id }}">
                    <label class="form-check-label" for="radio{{ $reponse->id }}">{{ $reponse->valiny }}</label>
                </div>
            @endforeach
        </div>
    </div>
    @endforeach

    <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</div>
</div> -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Patrix, Bootstrap 5 Landing Page</title>
    <link rel="stylesheet" href="{{ asset('clients/assets/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('clients/assets/css/fontawesome.css')}}">

</head>
<body>
<!-- ////////////////////////////////////////////////////////////////////////////////////////
                               START SECTION 1 - THE NAVBAR SECTION  
/////////////////////////////////////////////////////////////////////////////////////////////-->
<nav class="navbar navbar-expand-lg navbar-dark menu shadow fixed-top">
    <div class="container">
      <a class="navbar-brand" href="">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          </li>
        </ul>
      </div>
    </div>
  </nav>

<!-- /////////////////////////////////////////////////////////////////////////////////////////////////
                            START SECTION 2 - THE INTRO SECTION  
/////////////////////////////////////////////////////////////////////////////////////////////////////-->

<section id="home" class="intro-section">
  <div class="container">
    <div class="row align-items-center text-white">
      <!-- START THE CONTENT FOR THE INTRO  -->
      <div class="col-md-6 intros text-start">
        <h1 class="display-2">
          <span class="display-2--intro">Teste de Candidature</span>
          <span class="display-2--description lh-base">
            Évaluation des compétences du candidat. 
            (Veuillez vous rendre en bas, s'il vous plaît.)
          </span>
        </h1>
      </div>
      <!-- START THE CONTENT FOR THE VIDEO -->
      <div class="col-md-6 intros text-end">
        <div class="video-box">
          <img src="{{ asset('clients/images/arts/intro-section-illustration.png')}}" alt="video illutration" class="img-fluid">
          <a href="#" class="glightbox position-absolute top-50 start-50 translate-middle">
            <span>
              <i class="fas fa-play-circle"></i>
            </span>
            <span class="border-animation border-animation--border-1"></span>
            <span class="border-animation border-animation--border-2"></span>
          </a>
        </div>
      </div>
    </div>
  </div>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#ffffff" fill-opacity="1" d="M0,160L48,176C96,192,192,224,288,208C384,192,480,128,576,133.3C672,139,768,213,864,202.7C960,192,1056,96,1152,74.7C1248,53,1344,107,1392,133.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>
</section>

<!-- //////////////////////////////////////////////////////////////////////////////////////////////
                             START SECTION 3 - THE CAMPANIES SECTION  
////////////////////////////////////////////////////////////////////////////////////////////////////-->

<section id="faq" class="faq">
  <div class="container">
    <div class="row text-center">
      <h1 class="display-3 fw-bold text-uppercase">Question</h1>
      <div class="heading-line"></div>
      <p class="lead">Veuillez sélectionner la réponse ou les réponses exactes à la question suivante en cochant la case appropriée.</p>
    </div>
    <!-- ACCORDION CONTENT  -->
    <div class="row mt-5">
      <div class="col-md-12">
        <form action="{{ route('reponseTest') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="accordion" id="accordionExample">
            <!-- ACCORDION ITEM 1 -->
            @foreach ($questions as $question)
            <div class="accordion-item shadow mb-3">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                {{ $question->fanontaniana }}
                </button>
                <input type="hidden" name="idquestion[]" value="{{ $question->id }}">
              </h2>
              <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">

                <div class="accordion-body">
                  <strong>This is the first item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element.
                  <br> <br>
                    @foreach ($question->reponses as $reponse)
                    <label class="form-check-label" for="radio{{ $reponse->id }}">{{ $reponse->valiny }}</label>
                    <input type="checkbox" class="form-check-input" id="radio{{ $reponse->id }}" name="reponsesQuestion{{ $question->id }}[]" value="{{ $reponse->id }}">
                    @endforeach 
                </div>

              </div>
            </div>
            @endforeach     
            <div>
              <button type="submit" class="btn btn-primary rounded-pill pt-3 pb-3">
                Confirmé
                <i class="fas fa-paper-plane"></i>
              </button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</section>

<br>
<br>
<br>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////
                              START SECTION 7 - THE PORTFOLIO  
//////////////////////////////////////////////////////////////////////////////////////////////////////-->


    
    </script>
     <script src="{{ asset('clients/assets/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>


