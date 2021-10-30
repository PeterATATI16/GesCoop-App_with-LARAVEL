@extends('super.layout')
@section('content')
<!-- Head -->
 <!-- Content Header (Page header) -->
 <div class="content-header shadow-lg">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h2 class="border-bottom pb-2 mb-6 ">Administrateurs</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Utilisateurs</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
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
                <div class="div" style="display:flex;">
                    <div class="" style="padding:4px 4px;">
                      <a href="/super/{{$user->id}}/edit" class="btn btn-warning"
                            ><i class="fas fa-edit"></i> Modifier
                        </a>
                    </div>
                    <div class="div" style="padding:4px 4px;">
                        <a href="" class="btn btn-danger"
                            onclick = "if(confirm('Supprimer cet utilisateur ?'))
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
