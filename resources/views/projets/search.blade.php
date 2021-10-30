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
              <li class="breadcrumb-item active">Projets</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
            <!-- <div class="div" style="padding:4px 4px;">
                <a href="{{route('export-searchPartenaires')}}" class="btn btn-success"
                    ><i class="fas fa-download"></i> Télécharger la liste
                </a>
            </div> -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Data grid -->
    <div class=".my-3 p-3 bg-body" style="padding:10px 10px;">
        <div class="mt-4 mb-2">
        <a href="{{route('create-projet')}}" class="btn btn-secondary button-create">+</a>
        </div>
        <table class="table table-borered table-hover mt-4 shadow-sm">
        <thead class="table-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Libelle</th>
            <th scope="col">Cout</th>
            <th scope="col">Date initiation</th>
            <th scope="col">Partenaire</th>
            <th scope="col">Statut</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            @foreach($projets as $projet)
            <tr>
            <th scope="row">{{ $loop->index + 1}}</th>
            <td>{{ $projet->libelle}}</td>
            <td>{{ $projet->cout}}</td>
            <td>{{ $projet->date_initiation}}</td>
            <td>{{ $projet->partenaire->nom}}</td>
            <td>{{ $projet->statut}}</td>
            <td>
                <div class="div" style="display:flex;">
                        <div class="" style="padding:4px 4px;">
                            <a href="/projets/{{$projet->id}}" class="btn btn-primary" 
                                ><i class="fas fa-eye" style="color:black;"></i> Voir
                            </a>
                        </div>
                        <div class="div" style="padding:4px 4px;">
                            <a href="/projets/{{$projet->id}}/edit" class="btn btn-warning">
                            <i class="fas fa-edit"></i> Modifier
                            </a>
                        </div>
                        <div class="div" style="padding:4px 4px;">
                        <a href="" class="btn btn-danger"
                            onclick = "if(confirm('Supprimer ce projet ?'))
                            {document.getElementById('form-{{$projet->id}}').submit() }"><i class="fas fa-trash-alt"></i> Supprimer
                        </a>
                        <form id = "form-{{$projet->id}}" action="{{route('delete-projet',['projet'=>$projet->id])}}" 
                          method="post">
                            @csrf
                            <input type="hidden" name = "_method" value = "delete">
                        </form>
                    </div>
                </div>
            </td>
            </tr>
           @endforeach
        </tbody>
        <div class="float-end" style="float:right;">{{ $projets->links()}}</div>
        </table>
    </div>
    @endsection
