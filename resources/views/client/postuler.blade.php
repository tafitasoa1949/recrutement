
<!DOCTYPE html>
<html lang="en">
   <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">

      <title>hightech</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">

      <link rel="stylesheet" href="{{ asset('assets3/css/bootstrap.min.css') }}">

      <link rel="stylesheet" href="{{ asset('assets3/css/style.css') }}">

      <link rel="stylesheet" href="{{ asset('assets3/css/responsive.css') }}">

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

   </head>

   <body class="main-layout">

      <div class="loader_bg">
         <div class="loader"><img src="{{ asset('assets3/images/loading.gif') }}" alt="" /></div>
      </div>

      <header>
         <div class="header">
            <div class="container-fluid">
               <div class="row d_flex">
                  <div class=" col-md-2 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.html"><img src="{{ asset('assets3/images/logo.png') }}" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-8 col-sm-9">
                     <nav class="navigation navbar navbar-expand-md navbar-dark ">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarsExample04">
                           <ul class="navbar-nav mr-auto">
                              <li class="nav-item active">
                                 <a class="nav-link" href="index.html">Home</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="about.html">About</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="we_do.html">What we do</a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="portfolio.html">Portfolio </a>
                              </li>
                              <li class="nav-item">
                                 <a class="nav-link" href="contact.html">Contact Us</a>
                              </li>
                           </ul>
                        </div>
                     </nav>
                  </div>
                  <div class="col-md-2 d_none">
                     <ul class="email text_align_right">
                        <li> <a href="Javascript:void(0)"> Login </a></li>
                        <li> <a href="Javascript:void(0)"> <i class="fa fa-search" style="cursor: pointer;" aria-hidden="true"> </i></a> </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </header>

      <div id="top_section" class=" banner_main">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div id="myCarousel" class="carousel slide" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="bluid">
                                    <h1>Trouver un <br>Job </h1>
                                    <p>There are many variations of passages of Lorem Ipsum <br>available, but the majority have suffered alteration
                                    </p>
                                    <a class="read_more" href="">About Company </a><a class="read_more" href="">Contact </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="bluid">
                                    <h1>Trouver un  <br>Job </h1>
                                    <p>There are many variations of passages of Lorem Ipsum <br>available, but the majority have suffered alteration
                                    </p>
                                    <a class="read_more" href="about.html">About Company </a><a class="read_more" href="contact.html">Contact </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="bluid">
                                    <h1>Creative  <br>Work Idea </h1>
                                    <p>There are many variations of passages of Lorem Ipsum <br>available, but the majority have suffered alteration
                                    </p>
                                    <a class="read_more" href="about.html">About Company </a><a class="read_more" href="contact.html">Contact </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container-fluid">
                              <div class="carousel-caption relative">
                                 <div class="bluid">
                                    <h1>Creative  <br>Work Idea </h1>
                                    <p>There are many variations of passages of Lorem Ipsum <br>available, but the majority have suffered alteration
                                    </p>
                                    <a class="read_more" href="about.html">About Company </a><a class="read_more" href="contact.html">Contact </a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
                     <i class="fa fa-angle-left" aria-hidden="true"></i>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
                     <i class="fa fa-angle-right" aria-hidden="true"></i>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="contact">
         <div class="container">
            <div class="row ">
               <div class="col-md-6">
                  <div class="titlepage text_align_left">
                     <h2>Formulaire CV</h2>
                  </div>
                  <form method="POST" action="{{ route('cvCandidat') }}" enctype="multipart/form-data" id="request" class="main_form">
                  @csrf
                  @foreach ($detailsAnnonce as $resultat)
                <input type="hidden" id="myInput" name="service" value="{{ $resultat->idservice }}">
                <input type="hidden" id="myInput" name="idposte" value="{{ $resultat->idposte }}">
                @endforeach
                     <div class="row">
                        <div class="col-md-6">
                           <input class="contactus" placeholder="Nom" type="type" name=" nom">
                        </div>
                        <div class="col-md-6">
                           <input class="contactus" placeholder="Prenom" type="type" name="prenom">
                        </div>
                        <div class="col-md-6">
                            <input class="contactus" type="date" name="date_naissance">
                         </div>
                        <div class="col-md-6">
                           <input class="contactus" placeholder="Email" type="type" name="email">
                        </div>
                        <div class="col-md-6">
                        <select class="contactus" name="sexe" aria-label="Default select example" style="height: 40px; width: 200px; border:0">
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->nom }}</option>
                            @endforeach
                        </select>
                        </div>
                        <div class="col-md-6">
                           <input class="contactus" placeholder="Situation Matrimonial" type="type" name="situationMatrimonial">
                        </div>
                        <div class="col-md-6">
                           <input class="contactus" placeholder="Contact" type="type" name="contact">
                        </div>
                        <div class="col-md-6">
                        <select class="form-select" name="diplome" aria-label="Default select example" style="height: 40px; width: 200px;border:0">
                            <option value="BEPC">BEPC</option>
                            <option value="BACC">BACC</option>
                            <option value="LICENCE">LICENCE</option>
                            <option value="MASTER">MASTER</option>
                            <option value="DOCTORAT">DOCTORAT</option>
                        </select>
                        </div>
                        <div class="col-md-6">
                        <select class="form-select" name="experience" aria-label="Default select example" style="height: 40px; width: 200px;border:0">
                            <option value="+1">+1</option>
                            <option value="+2">+2</option>
                            <option value="+3">+3</option>
                            <option value="+4">+4</option>
                            <option value="+5">+5</option>
                        </select>
                        </div>
                        <br>
                        <div class="col-md-12">
                           <input class="contactus" placeholder="centre d'interêt" type="type" name="centreInteret">
                        </div>
                        <br>
                        <div class="col-md-6">
                           <input class="" placeholder="" type="file" name="file">
                        </div>
                        <div class="col-md-6">
                           <input class="" placeholder="" type="file" name="file2">
                        </div>
                        <br>
                        <div class="col-md-12">
                           <button class="send_btn">Envoyer</button>
                        </div>
                     </div>
                  </form>
               </div>
               <div class="col-md-6">
                  <div class="titlepage text_align_left">
                     <h2>Detail du poste</h2>
                  </div>
                  <div id="clientsl" class="carousel slide our_clientsl" data-ride="carousel">
                     <ol class="carousel-indicators">
                        <li data-target="#clientsl" data-slide-to="0" class="active"></li>
                        <li data-target="#clientsl" data-slide-to="1"></li>
                        <li data-target="#clientsl" data-slide-to="2"></li>
                     </ol>
                     <div class="carousel-inner">
                        <div class="carousel-item active">
                           <div class="container">
                              <div class="carousel-caption posi_in">
                                 <div class="clientsl_text">
                                    <i><img src="images/clint.jpg" alt="#"/></i>
                                    <h3>Recrutement <img src="images/icon.png" alt="#"/></h3>
                                    <br>
                                    @foreach ($detailsAnnonce as $annonce)
                                       <h2>Entreprise: {{ $annonce->nom }}</h2>
                                       <h2>Poste :{{ $annonce->poste }} </h2>
                                       <br>
                                       <h3>À propos du poste</h3>
                                       <p>{{ $annonce->description }}</p>
                                       <h3>Criteres</h3>
                                       @foreach ($criteres as $critere)
                                             <ul>
                                                <li>{{ $critere->nom }} : {{ $critere->detail }}</li>
                                             </ul>
                                       @endforeach
                                       <br>

                                       <h3>Challenge</h3>
                                             @foreach ($challenge as $exigenece)
                                                <ul>
                                                   <li>{{ $exigenece->description }}</li>
                                                </ul>
                                             @endforeach
                                       <br>
                                       <h3>Contrat</h3>
                                             <ul>
                                                <li>{{ $annonce->contrat }}</li>
                                             </ul>
                                       <p>Si vous êtes passionné par le développement web et que vous souhaitez rejoindre une équipe passionnée, nous aimerions avoir de vos nouvelles !</p>
                                       <p>Email : <b>recrutement@gmail.com</b></p>
                                       <p>Contact : <b>034 12 345 56</b></p>
                                    @endforeach                        </div>
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item">
                           <div class="container">
                              <div class="carousel-caption posi_in">
                                 <div class="clientsl_text">
                                    <i><img src="images/clint.jpg" alt="#"/></i>
                                    <h3>Deno <img src="images/icon.png" alt="#"/></h3>
                                    <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem IpsumIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum</p>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <a class="carousel-control-prev" href="#clientsl" role="button" data-slide="prev">
                     <i class="fa fa-angle-left" aria-hidden="true"></i>
                     <span class="sr-only">Previous</span>
                     </a>
                     <a class="carousel-control-next" href="#clientsl" role="button" data-slide="next">
                     <i class="fa fa-angle-right" aria-hidden="true"></i>
                     <span class="sr-only">Next</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>


      <script src="{{ asset('assets3/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets3/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets3/js/jquery-3.0.0.min.js') }}"></script>
<script src="{{ asset('assets3/js/custom.js') }}"></script>

   </body>
</html>


