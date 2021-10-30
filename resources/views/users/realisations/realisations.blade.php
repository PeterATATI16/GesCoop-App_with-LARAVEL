@extends('users.user-layout')
@section('content')

<!-- Head -->
 <!-- Content Header (Page header) -->
 <div class="content-header shadow-sm">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12" style="display:flex;">
          <h2 class="border-bottom pb-2 mb-6 ">Nos réalisations</h2>
          <div class="float-end justify-content-center" style="float:right;margin:0px 20px;">{{ $realisations->links()}}</div>
          </div><!-- /.col -->
          <a class="border-bottom pb-2 mb-6 btn btn-secondary" href="{{route('admin')}}">Quitter</a>
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
 </div>
    <!-- /.content-header -->
        @foreach($realisations as $realisation)
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
    @endforeach
@endsection