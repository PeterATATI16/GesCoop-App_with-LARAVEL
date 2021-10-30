@extends('general-layout')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5 class="border-bottom pb-2 mb-6 ">Détail sur la convention du
              <em style="color:green;">{{$convention->date_sign}}</em></h5>
              <a class="btn btn-primary"
              type="" style="border-radius:60%;" href="{{route('conventions')}}">
              <i class="fas fa-arrow-circle-left"></i></a>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Detail de la convention</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
 </div>
<div class="partenaire rounded shadow-lg" style="margin:20px 20px;padding:10px;">
        <div class="pays">
            @foreach($partenaires as $partenaire)
                @if($convention->partenaire_id == $partenaire->id)
            <p><strong>Partenaire :</strong>{{$partenaire->nom}}</p>
                @endif
            @endforeach
        </div><hr>
        <div class="pays">
            <p><strong>Type de convention :</strong>  {{$convention->type}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Domaines :</strong>  {{$convention->domaines}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Objet :</strong>  {{$convention->objet}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Date de signature de la convention :</strong>  {{$convention->date_sign}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Validite :</strong>  {{$convention->validite}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Perspectives :</strong>  {{$convention->perspectives}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Statut :</strong>  {{$convention->statut}}</p>
        </div><hr>   
        <!-- <iframe style="margin : 30px" src="/assets/{{$convention->file}}"></iframe>   -->
    </div>
@endsection