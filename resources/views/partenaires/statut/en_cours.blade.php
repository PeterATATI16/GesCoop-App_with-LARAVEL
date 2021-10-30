@extends('general-layout')
@section('content')
<!-- Head -->
 <!-- Content Header (Page header) -->
 <div class="content-header shadow-lg">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h2 class="border-bottom pb-2 mb-6 ">Conventions en cours</h2>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Conventions</li>
            </ol>
          </div><!-- /.col -->
          <!-- Barre de recherche -->
            <form class="form-inline ml-3" method="get" action="{{route('searchpart')}}">
                <div class="input-group input-group-sm shadow-sm">
                    <input name="query" class="form-control form-control-navbar" type="search" placeholder="" aria-label="">
                    <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    </div>
                </div>
            </form>
          <!-- //search -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
 </div>
    <!-- /.content-header -->
    
    <!-- Data grid -->
    <div class=".my-3 p-3 bg-body" style="margin:4px 4px;">
        <div class="mt-4 mb-2" style="display:flex;">
            <a href="{{route('create-partenaire')}}" class="btn btn-secondary button-create">+</a>
        </div>
        <table class="table table-borered table-hover mt-4 rounded shadow-sm">
        <thead class="table-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Partenaire</th>
            <th scope="col">Pays</th>
            <th scope="col">Adresse</th>
            <th scope="col">Date-sign</th>
            <th scope="col">Validité</th>
            <th scope="col">Statut</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partenaires as $partenaire)
            <tr>
            <th scope="row">{{ $loop->index + 1}}</th>
            <td>{{ $partenaire->nom}}</td>
            <td>{{ $partenaire->pays}}</td>
            <td>{{ $partenaire->adresse}}</td>
            <td>{{ $partenaire->date_sign}}</td>
            <td>{{ $partenaire->validite}}</td>
            <td>{{ $partenaire->statut}}</td>
            <td>
                <div class="div" style="display:flex;">
                    <div class="" style="padding:4px 4px;">
                        <a href="/partenaires/{{$partenaire->id}}" class="" 
                            ><i class="fas fa-eye" style="color:black;"></i> 
                        </a>
                    </div>
                    <div class="div" style="padding:4px 4px;">
                        <a href="/partenaires/{{$partenaire->id}}/edit" class="" data-bs-toggle="modal" 
                            data-bs-target=""><i class="fas fa-edit"></i>
                        </a>
                    </div>
                </div>
                
            </td>
            </tr>
           @endforeach
        </tbody> 
        <div class="float-end" style="float:right;">{{ $partenaires->links()}}</div>     
        </table>
    </div>
@endsection