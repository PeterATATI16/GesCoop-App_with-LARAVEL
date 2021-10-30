@extends('general-layout')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5 class="border-bottom pb-2 mb-6 ">Mission effectuée par  
              <em style="color:green;">{{$mission->nom}} {{$mission->prenom}}</em></h5>
              <a class="btn btn-primary"
              type="" style="border-radius:60%;" href="{{route('missions')}}">
              <i class="fas fa-arrow-circle-left"></i></a>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Detail sur la mission</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
 </div>
<div class="partenaire rounded shadow-lg" style="margin:20px;padding:10px;">
        <div class="nom">
            <p><strong>Nom :</strong>  {{$mission->nom}}</p>
        </div>
        <hr>
        <div class="pays">
            <p><strong>Prénom :</strong>  {{$mission->prenom}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Fonction :</strong>  {{$mission->fonction}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Destination :</strong>  {{$mission->destination}}</p>
        </div><hr>
        <div class="pays">
            @foreach($partenaires as $partenaire)
                @if($mission->partenaire_id == $partenaire->id)
            <p><strong>Convention :</strong> {{$partenaire->nom}} {{$partenaire->date_sign}}</p>
                @endif
            @endforeach
        </div>
        <div class="transport card shadow-sm" style="margin:6px; padding:6px;">
            <div class="pays">
                <p><strong>Mode transport :</strong>  {{$mission->mode_transport}}</p>
            </div><hr>
            <h5 class="btn btn-secondary">Prise en charge</h5>
            <div class="pays">
                <p><strong>Frais transport :</strong>  {{$mission->frais_transport}}</p>
            </div><hr>
            <div class="pays">
                <p><strong>Frais séjour :</strong>  {{$mission->frais_sejour}}</p>
            </div>
        </div>
        <div class="pays">
            <p><strong>Date départ :</strong>  {{$mission->date_depart}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Date retour :</strong>  {{$mission->date_retour}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Motif :</strong>  {{$mission->motif}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Statut :</strong>  {{$mission->statut}}</p>
        </div><hr>
    </div>
    <hr>
@endsection