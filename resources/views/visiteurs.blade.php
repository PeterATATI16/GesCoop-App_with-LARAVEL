<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
     integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

     <!-- Own Css -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<!-- Fontawesome -->
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
    <title>DRI -Visiteurs</title>
</head>
<style>
 
</style>
<body>
    <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm">
  <div class="container-fluid"><a class="shadow" style="padding:2px 2px; border:1px solid green;font-size:20px;color:black;opacity:.8;">D R I -> Ouagadougou Commune </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
     aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('visiteurs')}}">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Liste des idées</a>
        </li>
      </ul>
      <div class="d-flex">
        <div class="">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('/admin') }}" class="btn btn-warning">Continuer ma session</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-success"><i class="fas fa-sign-in-alt"></i> Se connecter</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-secondary"><i class="fas fa-user-plus"></i> Devenir membre</a>
                            @endif
                        @endauth
                    </div>
                @endif
            </div>
        </div>
    </div>
  </div>
</nav>
 <!-- Intro -->
 <div class="intro">
        <h3 class="text-center"><marquee>Devenez membre du suivi des coopérations internationales de la 
            commune de Ouagadougou
            <a href="{{route('password.request')}}">For</a>
        </marquee></h3>
    </div>
    <!-- Cards -->
    <div class="row justify-content-center rounded shadow-lg">
        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="card shadow" style="width: 25rem;">
                <div class="inner">
                    <img src="{{asset('images/hands.jpg')}}" class="card-img-top" alt="...">
                </div>               
                <div class="card-body text-center">
                    <h5 class="card-title">Conventions en cours</h5>
                    <p class="card-text">
                        Pour le développement de la commune,la Direction des Ressources Internationales (DRI) est chargée de chercher des 
                        opportunités partout dans le monde.Dans ce cadre des conventions décentralisées ont été signées.
                        Vous pouvez consulter nos conventions encours à travers le lien ci-dessous.
                    </p>
                    <a href="{{route('see-cooperations')}}" class="btn btn-primary disabled">Consulter</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="card shadow" style="width:  25rem;">
                <div class="inner">
                    <img src="{{asset('images/projects.jpg')}}" class="card-img-top" alt="...">
                </div> 
                <div class="card-body text-center">
                    <h5 class="card-title">Projets en cours</h5>
                    <p class="card-text">Nous faisons des appels à projets durant nos conventions avec nos difféents partenaires.
                        Ces projets nous permettent d'avoir des financements pour la réalisation des besoins ressentis au sein de la commune.
                        Vous pouvez consulter les différents projets en cours de réalisation grace au lien.
                    </p>
                    <a href="#" class="btn btn-secondary disabled">Consulter</a>
                    <button type="button" href="#" class="btn btn-warning shadow-lg disabled" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Nous proposer un appel à projet
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-lg-4 col-sm-12">
            <div class="card shadow" style="width:  25rem;">
                <div class="inner">
                    <img src="{{asset('images/echangeur.jpg')}}" class="card-img-top" alt="...">
                </div> 
                <div class="card-body text-center">
                    <h5 class="card-title">Réalisations</h5>
                    <p class="card-text">
                        Lorsque les projets aboutissent avec succes, ils sont enrégistrés dans la liste de nos réalisations.Vous pouvez consulter la liste 
                        de tous nos projets réalisés au compte de la commune.
                    </p>
                    <a href="#" class="btn btn-success disabled" >Consulter</a>
                </div>
            </div>
        </div><hr>
    </div>
    <footer class="blog-footer">
                <p>Construit par la DSI & Lex Consulting <a href="#">Financé</a> par <a href="https://twitter.com/mdo">Mairie</a>.</p>
                <p>
                    <a href="#nav">Remonter la page</a>
                </p>
        </footer>
    </div>
</body>
</html>