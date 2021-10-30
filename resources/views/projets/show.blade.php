@extends('general-layout')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5 class="border-bottom pb-2 mb-6 ">Projet initié à la date 
              <em style="color:green;">{{$projet->date_initiation}}</em></h5>
              <a class="btn btn-primary"
              type="" style="border-radius:60%;" href="{{route('projets')}}">
              <i class="fas fa-arrow-circle-left"></i></a>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Detail sur le projet</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
 </div>
<div class="partenaire rounded shadow-lg" style="margin:20px 20px;padding:10px;">
        <div class="nom">
            <p><strong>Libelle :</strong>  {{$projet->libelle}}</p>
        </div>
        <hr>
        <div class="pays">
            <p><strong>Cout :</strong>  {{$projet->cout}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Date initiation :</strong>  {{$projet->date_initiation}}</p>
        </div><hr>
        <div class="pays">
            @foreach($partenaires as $partenaire)
                @if($projet->partenaire_id == $partenaire->id)
            <p><strong>Partenaire concerné  :</strong>{{$partenaire->nom}}</p>
                @endif
            @endforeach
        </div>
        <div class="pays">
            <p><strong>Statut :</strong>  {{$projet->statut}}</p>
        </div>
    </div>
@endsection