@extends('general-layout')
    @section('content')
    <!-- Head -->
 <!-- Content Header (Page header) -->
 <div class="content-header shadow-lg">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h2 class="border-bottom pb-2 mb-6 ">Guide d'utilisation de "GesCoop-App" </h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Guide</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <style>
        .container{
            margin : 10px;
        }
        .row{
            margin:10px;
        }
        .card{
            margin:10px;
        }
        img{
            margin:10px;
            border : 4px solid black;
        }
    </style>

    <!-- /.content-body -->
    <div class="container-fluid">
    <div class="album py-5 bg-light ">
        <div class="container">

          <div class="row rounded shadow-lg">
            <div class="col-md-12">
              <div class="card mb-4 box-shadow">
                <h4 style = "border-bottom : green solid 4px;">Tableau de bord</h4>
                <div class="card-body">
                  <p class="card-text">
                      C'est la page principale de l'application.Elle comporte toutes les fonctionnalités de l'application.
                      Vous pouvez voir les rapports et les coonsulter. <br>
                      *** Le ménu vertical comporte 4 liens : ma session, utilisateur, liste membres, guide. <br>
                        > Ma session : Ce lien vous redirige vers votre profile. <br>
                        > Utilisateur : Vous permet d'ajouter un administrateur ou un client. <br>
                        > Liste membres : Vous permet de consulter la liste de tous les membres. <br>
                        <hr>
                        *** Le ménu horizontal comporte 7 liens en plus de votre nom de compte : Tableau de bord,
                         Coopérations qui comporte 4 liens, projets, appels à projets
                         , réalisations, (utilisateurs, réalisation). <br>
                        > Tableau de bord : page principale comportant les rapports. <br>
                        > Coopérations : Comporte 4 liens vous permettant de gérer respectivement les partenaires,
                        les conventions, les dons et les missions. <br>
                        > Projets : Vous permet de gérer vos projets. <br>
                        > Appels à projets  : Vous permet de consulter la liste des idées proposées par les membres et de les gérer. <br>
                        [<br>
                        > Réalisations : Vous permet de suivre graphiquement le nombre de réalisations par rapports aux années. <br>
                        > Utilisateurs : Vous permet de suivre graphiquement le nombre d'inscriptions par rapports aux mois. <br>
                        ] <br>
                        <hr>
                        <img src="{{asset('/guideUser/tb.jpg')}}" class="img-fluid rounded shadow-sm" alt="Responsive image">
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Guide</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Apllication</button>
                    </div>
                    <small class="text-muted">WebCentrick Technologies</small>
                  </div>
                </div>
              </div>
            </div>
            <!-- Les listes -->
            <div class="col-md-12">
              <div class="card mb-4 box-shadow">
                <h4 style = "border-bottom : green solid 4px;">Les listes</h4>
                <div class="card-body">
                  <p class="card-text">
                      Comme on l'a dit en haut vous pouvez gérer chaque entité  . <br>
                      *** Chaque entité a ses fonctionalités. <br>
                        > Partenaires :  Regrouper les partenaires pour un pays donné à travers la barre de recherche,
                        télécharger la liste des partenaires, ajouter un partenaire(par le petit bouton '+'),
                         voir, modifier,supprimer un partenaire particulier <br><hr>
                         > Conventions :  Regrouper les conventions pour un partenaire donné à travers la barre de recherche,
                        télécharger la liste des conventions, ajouter une convention(par le petit bouton '+'),
                         voir, modifier,télécharger le document pour une convention particuliere. <br><hr>
                         > Dons :  Regrouper les dons pour un partenaire donné à travers la barre de recherche,
                        télécharger la liste des dons, ajouter une don(par le petit bouton '+'). <br><hr>
                        
                        > Missions :  Regrouper les missions pour une partenaire donné à travers la barre de recherche,
                        télécharger la liste des missions, ajouter une mission(par le petit bouton '+'),
                         voir, modifier,supprimer une mission particuliere. <br><hr>
                         > Projets :  Regrouper les projets pour un partenaire donné à travers la barre de recherche,
                        télécharger la liste des projets, ajouter une projet(par le petit bouton '+'),
                         voir, modifier,supprimer une projet particulier. <br><hr>
                         > Appel à projets : Télécharger la liste des idées envoyées par les membres,supprimer une idée donnée. <br><hr>
                         > Réalisations :  Regrouper les réalisations par année à travers la barre de recherche,
                        télécharger la liste des réalisations,
                         voir une réalisation particuliere. <br><hr>
                        
                        <img src="{{asset('/guideUser/vue.jpg')}}" class="img-fluid rounded shadow-sm" alt="Responsive image">
                        <img src="{{asset('/guideUser/ajouter.jpg')}}" class="img-fluid rounded shadow-sm" alt="Responsive image">
                        <img src="{{asset('/guideUser/voir.jpg')}}" class="img-fluid rounded shadow-sm" alt="Responsive image">
                        <img src="{{asset('/guideUser/modifier.jpg')}}" class="img-fluid rounded shadow-sm" alt="Responsive image">
                        <img src="{{asset('/guideUser/supprimer.jpg')}}" class="img-fluid rounded shadow-sm" alt="Responsive image">
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Guide</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Apllication</button>
                    </div>
                    <small class="text-muted">WebCentrick Technologies</small>
                  </div>
                </div>
              </div>
            </div>
              <!-- Graphs -->
              <div class="col-md-12">
              <div class="card mb-4 box-shadow">
                <h4 style = "border-bottom : green solid 4px;">Graphiques</h4>
                <div class="card-body">
                  <p class="card-text">
                     C'est les pages de suivi graphique. <br><hr>
                      > Réalisations. <br>
                        <img src="{{asset('/guideUser/graphR.jpg')}}" class="img-fluid rounded shadow-sm" alt="Responsive image"><hr>
                      > Utlisateurs. <br>
                        <img src="{{asset('/guideUser/graphU.jpg')}}" class="img-fluid rounded shadow-sm" alt="Responsive image">
                  </p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-outline-secondary">Guide</button>
                      <button type="button" class="btn btn-sm btn-outline-secondary">Apllication</button>
                    </div>
                    <small class="text-muted">WebCentrick Technologies</small>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>

    </main>
    </div>

    
    @endsection