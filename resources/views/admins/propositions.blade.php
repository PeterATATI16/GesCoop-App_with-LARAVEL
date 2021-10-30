@extends('general-layout')
@section('content')

 <div class="content-header shadow-lg">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h2 class="border-bottom pb-2 mb-6 ">Idées soumises par les membres</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Projets membres</li>
            </ol>
          </div><!-- /.col -->
           <!-- Barre de recherche -->
           <!-- <form class="form-inline ml-3" method="get" action="{{route('search-proposition')}}">
                  <div class="input-group input-group-sm shadow-sm">
                      <input name="search" class="form-control form-control-navbar" type="search" 
                      placeholder="Tri par nom" aria-label="">
                      <div class="input-group-append">
                      <button class="btn btn-secondary" type="submit">
                          <i class="fas fa-search"></i>
                      </button>
                      </div>
                  </div>
              </form> -->
            <!-- //search -->
        </div><!-- /.row -->
        <div class="div" style="padding:4px 4px;">
                <a href="{{route('export-propositions')}}" class="btn btn-success"
                    ><i class="fas fa-download"></i> Télécharger la liste
                </a>
            </div>   
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Data grid -->
    <div class=".my-3 p-3 bg-body" style="padding:10px 10px;">
        <table class="table table-borered table-hover mt-4 shadow-sm">
        <thead class="table-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom(s)</th>
            <th scope="col">Objet</th>
            <th scope="col">Email</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Date de soumission</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            @foreach($propositions as $proposition)
            <tr>
            <th scope="row">{{ $loop->index + 1}}</th>
            <td>{{ $proposition->name}}</td>
            <td>{{ $proposition->lastname}}</td>
            <td>{{ $proposition->libelle}}</td>
            <td>{{ $proposition->email}}</td>
            <td>{{ $proposition->telephone}}</td>
            <td>{{ $proposition->created_at}}</td>
            <td>
                  <div class="div" style="padding:4px 4px;">
                        <a href="" class="btn btn-danger"
                            onclick = "if(confirm('Supprimer cette idée ?'))
                            {document.getElementById('form-{{$proposition->id}}').submit() }"><i class="fas fa-trash-alt"></i> Supprimer
                        </a>
                        <form id = "form-{{$proposition->id}}" action="{{route('delete-proposition',['proposition'=>$proposition->id])}}" 
                          method="post">
                            @csrf
                            <input type="hidden" name = "_method" value = "delete">
                        </form>
                    </div>
            </td>
            </tr>
           @endforeach
        </tbody>
        <div class="float-end" style="float:right;">{{ $propositions->links()}}</div> 
        </table>
    </div>
    @endsection
