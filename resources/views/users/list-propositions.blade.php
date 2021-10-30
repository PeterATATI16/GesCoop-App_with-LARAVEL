@extends('users.user-layout')
@section('content')

 <div class="content-header shadow-lg">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h2 class="border-bottom pb-2 mb-6 ">Idées proposées par les membres</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                
            </ol>
          </div><!-- /.col -->
          <a class="border-bottom pb-2 mb-6 btn btn-secondary" href="{{route('admin')}}">Quitter</a>
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
            <th scope="col">Objet</th>
            <th scope="col">Nom</th>
            <th scope="col">Prénom(s)</th>
            <th scope="col">Email</th>
            <th scope="col">Téléphone</th>
            <th scope="col">Date de soumission</th>
        </thead>
        <tbody>
            @foreach($props as $proposition)
            <tr>
            <th scope="row">{{ $loop->index + 1}}</th>
            <td>{{ $proposition->libelle}}</td>
            <td>{{ $proposition->name}}</td>
            <td>{{ $proposition->lastname}}</td>
            <td>{{ $proposition->email}}</td>
            <td>{{ $proposition->telephone}}</td>
            <td>{{ $proposition->created_at}}</td>
            </tr>
           @endforeach
        </tbody>
        <div class="float-end" style="float:right;">{{ $props->links()}}</div>
        </table>
    </div>
    @endsection
