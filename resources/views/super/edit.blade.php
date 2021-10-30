@extends('super.layout')
@section('content')
<div class="content-header shadow-lg">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h2 class="border-bottom pb-2 mb-6 ">Changer le statut de 
              <strong>{{$user->name}}</strong></h2>
              <em>Statut actuel : " {{$user->statut}} "</em>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Membres</li>
            </ol>
          </div><!-- /.col -->
          @if(session()->has("success"))
        <div class="shadow-lg alert alert-info" style="margin:4px;width:720px; float:right;" >
          <h5>{{session()->get('success')}}</h5>
        </div>
        @endif
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="modal-body">
          <form role="form" action="{{route('users-update', ['user'=>$user->id])}}" method="post">
                @csrf
            <div class="card-body row g-3">
                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Nom</label>
                    <input value="{{$user->name}}" name="name" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom : ">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Prénom(s)</label>
                    <input value="{{$user->lastname}}" name="lastname" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom : ">
                </div>
                <div class="form-group col-md-3">
                    <label for="exampleInputEmail1">Email</label>
                    <input value="{{$user->email}}" name="email" required type="email" class="form-control" id="exampleInputEmail1" placeholder="">
                </div>
                <div class="form-group col-md-3">
                    <label>Statut</label>
                    <select required name="statut" class="form-control shadow-sm shadow">
                    <option selected>actif</option>
                    <option>inactif</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
              <a type="button" class="btn btn-secondary" href="{{route('admin')}}">Annuler</a>
              <button type="submit" class="btn btn-danger">Changer</button>
            </div>
          </form>
      </div>
@endsection