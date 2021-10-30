@extends('general-layout')
@section('content')
<!-- Head -->
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h2 class="border-bottom pb-2 mb-6 "><em>({{$count}}) Résultat(s) trouvé(s) pour <strong class = "" style="color: green;">
              " {{$searchname}} "
            </strong></em></h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Dons</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
            <!-- <div class="div" style="padding:4px 4px;">
                <a href="{{route('export-dons')}}" class="btn btn-success"
                    ><i class="fas fa-download"></i> Télécharger la liste
                </a>
            </div> -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Data grid -->
    <div class=".my-3 p-3 bg-body" style="padding:10px 10px;">
        <div class="mt-4 mb-2">
        <a href="{{route('create-don')}}" class="btn btn-secondary button-create">+</a>
        </div>
        <table class="table table-borered table-hover mt-4 shadow-sm">
        <thead class="table-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Objet</th>
            <th scope="col">Partenaire</th>
            <th scope="col">Date</th>
            <th scope="col">Bénéficiare</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            @foreach($dons as $don)
            <tr>
            <th scope="row">{{ $loop->index + 1}}</th>
            <td>{{ $don->objet}}</td>
            <td>{{ $don->partenaire->nom}}</td>
            <td>{{ $don->date}}</td>
            <td>{{ $don->beneficiaire}}</td>
            <td>
                    <div class="" style="padding:4px 4px;">
                        <a href="/dons/{{$don->id}}" class="btn btn-primary" 
                            ><i class="fas fa-eye" style="color:black;"></i> Voir
                        </a>
                    </div>
            </td>
            </tr>
           @endforeach
        </tbody>
        <div class="float-end" style="float:right;">{{ $dons->links()}}</div> 
        </table>
    </div>
    @endsection
