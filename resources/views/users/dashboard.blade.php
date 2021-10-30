@extends('users.user-layout')
@section('content')
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Soumettez votre idée</h5>
                <!-- @if(session()->has("success"))
                    <div class="shadow-lg alert alert-info" style="margin:4px;width:720px; float:right;" >
                    <h5>{{session()->get('success')}}</h5>
                    </div>
                @endif -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('store-proposition')}}" method="post">
                    @csrf
                    <div class="col-sm-12">
                        <!-- textarea -->
                        <div class="form-group">
                        <label>Idée</label><br>
                        <textarea required name="libelle" class="form-control" rows="3" placeholder="Saisir ... "></textarea>
                        </div>
                    </div>
                    <div class="form-group col-md-12"  hidden="true">
                    <label for="exampleInputEmail1">Votre email</label><br>
                    <input value="{{$email}}" required name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group col-md-12">
                    <label for="exampleInputEmail1">Votre numéro de téléphone</label><br>
                    <input value="" required name="telephone" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group col-md-2" hidden="true">
                    <label for="exampleInputEmail1">Name</label>
                    <input value="{{$name}}"name="name" required type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group col-md-2" hidden="true">
                    <label for="exampleInputEmail1">Lastname</label>
                    <input value="{{$lastname}}"name="lastname" required type="text" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fas fa-window-close"></i> Annuler</button>
                        <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Soumettre</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <!-- Banner -->
    <div class="banner rounded shadow-sm" id="banner">
        <div id="carouselExampleCaptions" class="carousel slide rounded shadow" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <img src="{{asset('images/education.jpg')}}" class="d-block w-100 rounded" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5 class="btn btn-secondary">Education</h5> -->
                    <p>Nous avons des conventions dans le domaine de l'éducation ou nous recevons des dons pour la construction des écoles ...</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{asset('images/lect.jpg')}}" class="d-block w-100 rounded" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5 class="btn btn-secondary">Education</h5> -->
                    <p>Nous recevons également des kits scolaires que nous redistribuons aux éleves et aux étudiants</p>
                </div>
                </div>
                <div class="carousel-item">
                <img src="{{asset('images/sante.jpg')}}" class="d-block w-100 rounded" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <!-- <h5 class="btn btn-secondary">Santé</h5> -->
                    <p>La santé étant la fondamentale de toute vie, nous partons à la chasse aux aides dans le domaine de la santé afin de mieux équiper
                        nos hopitaux pour une meilleurs santé toute la population.
                    </p>
                </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Précédant</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Suivant</span>
            </button>
            </div>
    </div>
    <!-- Intro -->
    <div class="intro">
        <h1 class="text-center">Suivez <span class="votre">votre</span> <span class="commune shadow-sm">commune</span>(Ouagadougou pour le changement)</h1>
    </div>
    <!-- Cards -->
    <div class="row justify-content-center rounded shadow-lg">
        <div class="col-md-4">
            <div class="card shadow" style="width: 26rem;">
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
                    <a href="{{route('see-cooperations')}}" class="btn btn-primary">Consulter <strong>( {{$conv_encours}} )</strong></a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow" style="width: 26rem;">
                <div class="inner">
                    <img src="{{asset('images/projects.jpg')}}" class="card-img-top" alt="...">
                </div> 
                <div class="card-body text-center">
                    <h5 class="card-title">Projets en cours</h5>
                    <p class="card-text">Nous faisons des appels à projets durant nos conventions avec nos difféents partenaires.
                        Ces projets nous permettent d'avoir des financements pour la réalisation des besoins ressentis au sein de la commune.
                        Vous pouvez consulter les différents projets en cours de réalisation grace au lien.
                    </p>
                    <a href="{{route('see-projets')}}" class="btn btn-secondary">Consulter <strong>( {{$proj_encours}} )</strong></a>
                    <button type="button" href="" class="btn btn-warning shadow-lg" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Proposer un appel à projet ( {{$totalProp}} )
                    </button>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow" style="width:24rem;">
                <div class="inner">
                    <img src="{{asset('images/echangeur.jpg')}}" class="card-img-top" alt="...">
                </div> 
                <div class="card-body text-center">
                    <h5 class="card-title">Réalisations</h5>
                    <p class="card-text">
                        Lorsque les projets aboutissent avec succes, ils sont enrégistrés dans la liste de nos réalisations.Vous pouvez consulter la liste 
                        de tous nos projets réalisés au compte de la commune.
                        Vos appels à projets les plus interessants seront initiés et lorsqu'ils seront aussi en cours vous les verrai.
                    </p>
                    <a href="{{route('see-realisations')}}" class="btn btn-success">Consulter <strong>( {{$totalRealisation}} )</strong></a>
                </div>
            </div>
        </div><hr>
    </div>
@endsection  

