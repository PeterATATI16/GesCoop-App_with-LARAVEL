@extends('general-layout')
@section('content')
<div class="modal fade" id="statut" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Activer ou désactiver le membre</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form role="form" action="{{route('store-user')}}" method="post">
                @csrf
            <div class="card-body row g-3">
                <div class="form-group col-md-6">
                    <label>Statut</label>
                    <select required name="statut" class="form-control shadow-sm" value="">
                    <option>actif</option>
                    <option>inactif</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
              <button type="submit" class="btn btn-info">Changer</button>
            </div>
          </form>
      </div>
    </div>
  </div>
</div>
<!-- Head -->
 <!-- Content Header (Page header) -->
 <div class="content-header shadow-lg">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h2 class="border-bottom pb-2 mb-6 ">Nos membres</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Membres</li>
            </ol>
          </div><!-- /.col -->
           <!-- Barre de recherche -->
           <form class="form-inline ml-3" method="get" action="{{route('search-user')}}">
                  <div class="input-group input-group-sm shadow-sm">
                      <input name="search" class="form-control form-control-navbar" type="search" 
                      placeholder="Recherche par le 'nom'" aria-label="">
                      <div class="input-group-append">
                      <button class="btn btn-secondary" type="submit">
                          <i class="fas fa-search"></i>
                      </button>
                      </div>
                  </div>
              </form>
            <!-- //search -->
        </div><!-- /.row -->
        @if(session()->has("error"))
          <h5 class="shadow-lg alert alert-danger">{{session()->get('error')}}</h5>
        @endif
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
            <th scope="col">Email</th>
            <th scope="col">Role</th>
            <th scope="col">Date d'inscription</th>
            <th scope="col">Statut</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
            <th scope="row">{{ $loop->index + 1}}</th>
            <td>{{ $user->name}}</td>
            <td>{{ $user->lastname}}</td>
            <td>{{ $user->email}}</td>
            <td>{{ $user->role}}</td>
            <td>{{ $user->created_at}}</td>
            <td>{{ $user->statut}}</td>
            <td>
              <div class="all" style="display:flex;">
                      <div class="view" style="padding:4px 4px;">
                          <a href="/admins/{{$user->id}}/edit" class="btn btn-warning"
                              ><i class="fas fa-edit"></i> Modifier
                          </a>
                      </div>
                      <div class="div" style="padding:4px 4px;">
                          <a href="" class="btn btn-danger"
                              onclick = "if(confirm('Supprimer ce membre ?'))
                              {document.getElementById('form-{{$user->id}}').submit() }"><i class="fas fa-trash-alt"></i> Supprimer
                          </a>
                          <form id = "form-{{$user->id}}" action="{{route('user.delete2',['user2'=>$user->id])}}"
                            method="post">
                              @csrf
                              <input type="hidden" name = "_method" value = "delete">
                          </form>
                      </div>
                  </div>
            </td>
            </tr>
           @endforeach
        </tbody>
        <div class="float-end" style="float:right;">{{ $users->links()}}</div>
        </table>
    </div>
    @endsection
