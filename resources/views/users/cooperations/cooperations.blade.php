@extends('users.user-layout')
@section('content')
<!-- Head -->
 <!-- Content Header (Page header) -->
 <div class="content-header shadow-sm">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12" style="display:flex;">
          <h2 class="border-bottom pb-2 mb-6 ">Conventions en cours</h2>
          <div class="float-end justify-content-center" style="float:right;margin:0px 20px;">{{ $conventions->links()}}</div>
          </div><!-- /.col -->
          <a class="border-bottom pb-2 mb-6 btn btn-secondary" href="{{route('admin')}}">Quitter</a>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
 </div>
    <!-- /.content-header -->
    @foreach($conventions as $convention)
    <div class="partenaire rounded shadow-lg" style="margin:20px 20px;padding:10px;">
    <div class="num"><h3>Convention {{ $convention->id}}</h3></div><hr>
        <div class="pays">
            @foreach($partenaires as $partenaire)
                @if($convention->partenaire_id == $partenaire->id)
            <p><strong>Partenaire :</strong> {{$partenaire->nom}}</p>
                @endif
            @endforeach
        </div>
        <hr>
        <div class="nom">
            <p><strong>Type :</strong>  {{$convention->type}}</p>
        </div>
        <hr>
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
            <p><strong>Statut :</strong>  {{$convention->statut}}</p>
        </div><hr>
        <div class="pays">
            <p><strong>Perspectives :</strong>  {{$convention->perspectives}}</p>
        </div>
    </div>
    @endforeach
@endsection