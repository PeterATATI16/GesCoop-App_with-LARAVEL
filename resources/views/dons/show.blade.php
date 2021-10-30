@extends('general-layout')
@section('content')
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h5 class="border-bottom pb-2 mb-6 ">Don recu le 
              <em style="color:green;">{{$don->date}}</em></h5>
              <a class="btn btn-primary"
              type="" style="border-radius:60%;" href="{{route('dons')}}">
              <i class="fas fa-arrow-circle-left"></i></a>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Detail sur le don</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
 </div>
<div class="partenaire rounded shadow-lg" style="margin:20px 20px;padding:10px;">
        <div class="nom">
            <p><strong>Objet :</strong>  {{$don->objet}}</p>
        </div>
        <hr>
        <div class="pays">
            <p><strong>Contenu :</strong>  {{$don->libelle}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Date :</strong>  {{$don->date}}</p>
        </div><hr>
        <div class="pays">
            @foreach($partenaires as $partenaire)
                @if($don->partenaire_id == $partenaire->id)
            <p><strong>Partenaire donneur :</strong>{{$partenaire->nom}}</p>
                @endif
            @endforeach
        </div><hr>
        <div class="pays">
            <p><strong>Structure ayant bénéficier :</strong>  {{$don->beneficiaire}}</p>
        </div><hr>
    </div>
    <hr>
@endsection