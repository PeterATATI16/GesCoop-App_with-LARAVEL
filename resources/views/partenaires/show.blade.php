@extends('general-layout')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5 class="border-bottom pb-2 mb-6 ">Détails sur  
              <em style="color:green;">{{$partenaire->nom}}</em></h5>
              <a class="btn btn-primary"
              type="" style="border-radius:60%;" href="{{route('partenaires')}}">
              <i class="fas fa-arrow-circle-left"></i></a>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Partenaire</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
 </div>
<div class="partenaire rounded shadow-lg" style="margin:20px 20px;padding:10px;">
        <div class="nom">
            <p><strong>Partenaire :</strong>  {{$partenaire->nom}}</p>
        </div>
        <hr>
        <div class="pays">
            <p><strong>Pays :</strong>  {{$partenaire->pays}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Adresse :</strong>  {{$partenaire->adresse}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Date de création :</strong>  {{$partenaire->created_at}}</p>
        </div>
    </div>
    <hr>
@endsection