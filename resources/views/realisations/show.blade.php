@extends('general-layout')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5 class="border-bottom pb-2 mb-6 ">Projet réalisé à la date 
              <em style="color:green;">{{$realisation->date_realisation}}</em></h5>
              <a class="btn btn-primary"
              type="" style="border-radius:60%;" href="{{route('realisations')}}">
              <i class="fas fa-arrow-circle-left"></i></a>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Detail sur la réalisation</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
 </div>
 <div class="partenaire rounded shadow-lg" style="margin:20px 20px;padding:10px;">
            <div class="num"><h3>Réalisation {{ $realisation->id}}</h3></div><hr>
            <div class="pays">
                <p><strong>Libellé :</strong>  {{$realisation->projet->libelle}}</p>
            </div>
            <hr>
            <div class="pays">
                <p><strong>Cout :</strong>  {{$realisation->projet->cout}}</p>
            </div>                                 
            <hr>
            <div class="pays">
                <p><strong>Date d'initiation :</strong>  {{$realisation->projet->date_initiation}}</p>
            </div>
            <div class="pays">
                <p><strong>Date de réalisation :</strong>  {{$realisation->date_realisation}}</p>
            </div>
            <hr>
            <div class="pays">
                <p><strong>Partenaire :</strong>  {{$realisation->projet->partenaire->nom}}</p>
            </div>
    </div>
@endsection