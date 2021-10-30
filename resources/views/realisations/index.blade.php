@extends('general-layout')
@section('content')
<!-- Head -->
 <!-- Content Header (Page header) -->
 <div class="content-header shadow-lg">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h2 class="border-bottom pb-2 mb-6 ">Nos réalisations</h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Réalisations</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
        <div class="div" style="padding:4px 4px;">
                <a href="{{route('export-realisations')}}" class="btn btn-success"
                    ><i class="fas fa-download"></i> Télécharger la liste
                </a>
            </div>
            @if(session()->has("error"))
                <div class="shadow-lg alert alert-danger" style="" >
                <h5>{{session()->get('error')}}</h5>
                </div>
            @endif
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Data grid -->
    <div class=".my-3 p-3 bg-body" style="padding:10px 10px;">
        <div class="mt-4 mb-2">
        <a href="{{route('create-realisation')}}" class="btn btn-secondary button-create">+</a>
        </div>
        <table class="table table-borered table-hover mt-4 shadow-sm">
        <thead class="table-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Projet</th>
            <th scope="col">Date réalisation</th>
            <th scope="col">Date initiation</th>
            <th scope="col">Partenaire</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            @foreach($realisations as $realisation)
            <tr>
            <th scope="row">{{ $loop->index + 1}}</th>
            <td>{{ $realisation->projet->libelle}}</td>
            <td>{{ $realisation->date_realisation}}</td>
            <td>{{ $realisation->projet->date_initiation}}</td>
            <td>{{ $realisation->projet->partenaire->nom}}</td>
            <td>
                <div class="div" style="display:flex;">
                    <div class="" style="padding:4px 4px;">
                        <a href="/realisations/{{$realisation->id}}" class="btn btn-primary" 
                            ><i class="fas fa-eye" style="color:black;"></i> Voir
                        </a>
                    </div>
                </div>
                </div>
            </td>
            </tr>
           @endforeach
        </tbody>
        <div class="float-end" style="float:right;">{{ $realisations->links()}}</div>
        </table>
    </div>
    @endsection
