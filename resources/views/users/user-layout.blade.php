<x-app-layout>
<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<!-- Fontawesome -->
<link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
<!-- Js bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" 
crossorigin="anonymous"></script>
<!-- Own Css -->
<link rel="stylesheet" href="{{asset('css/style.css')}}">

<!-- Content -->
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light shadow rounded container" id="nav">
            <div class="">
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('admin')}}">Accueil</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{route('list-prop-membres')}}">Liste d'idées</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
        <!-- Layount -->
       @yield('content')
        <footer class="blog-footer">
                <p>Construit par la DSI & Lex Consulting <a href="#">Financé</a> par <a href="https://twitter.com/mdo">Mairie</a>.</p>
                <p>
                    <a href="#nav">Remonter la page</a>
                </p>
        </footer>
    </div>
</x-app-layout>
