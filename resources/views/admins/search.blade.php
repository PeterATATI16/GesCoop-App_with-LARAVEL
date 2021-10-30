@extends('general-layout')
@section('content')
<!-- Head -->
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h2 class="border-bottom pb-2 mb-6 "><em>{{$count}}Résultat(s) trouvé(s) pour <strong class = "" style="color: green;">
              " {{$search2}} "
            </strong></em></h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Propositions</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class=".my-3 p-3 bg-body" style="margin:10px;">
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