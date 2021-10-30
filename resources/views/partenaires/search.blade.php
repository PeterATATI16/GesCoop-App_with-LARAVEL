@extends('general-layout')
@section('content')
<!-- Head -->
 <!-- Content Header (Page header) -->
 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h2 class="border-bottom pb-2 mb-6 "><em>({{$count}}) Résultat(s) trouvé(s) pour <strong class = "" style="color: green;">
              " {{$search2}} "
            </strong></em></h2>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Partenaires</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
            <div class="div" style="padding:4px 4px;">
                <a href="{{route('export-searchPartenaires')}}" class="btn btn-success"
                    ><i class="fas fa-download"></i> Télécharger la liste
                </a>
            </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    
    <div class=".my-3 p-3 bg-body" style="margin:4px 4px;">
        <div class="mt-4 mb-2" style="display:flex;">
            <a href="{{route('create-partenaire')}}" class="btn btn-secondary button-create">+</a>
        </div>
        <table class="table table-borered table-hover mt-4 rounded shadow-sm">
        <thead class="table-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Partenaire</th>
            <th scope="col">Pays</th>
            <th scope="col">Adresse</th>
            <th scope="col">Date d'ajout</th>
            <th scope="col">action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($partenaires as $partenaire)
            <tr>
            <th scope="row">{{ $loop->index + 1}}</th>
            <td>{{ $partenaire->nom}}</td>
            <td>{{ $partenaire->pays}}</td>
            <td>{{ $partenaire->adresse}}</td>
            <td>{{ $partenaire->created_at}}</td>
            <td>
                <div class="div" style="display:flex;">
                    <div class="" style="padding:4px 4px;">
                        <a href="/partenaires/{{$partenaire->id}}" class="btn btn-primary" 
                            ><i class="fas fa-eye" style="color:black;"></i> Voir
                        </a>
                    </div>
                    <div class="div" style="padding:4px 4px;">
                        <a href="/partenaires/{{$partenaire->id}}/edit" class="btn btn-warning"
                            ><i class="fas fa-edit"></i> Modifier
                        </a>
                    </div>
                    <div class="div" style="padding:4px 4px;">
                        <a href="" class="btn btn-danger"
                            onclick = "if(confirm('Supprimer ce partenaire ?'))
                            {document.getElementById('form-{{$partenaire->id}}').submit() }"><i class="fas fa-trash-alt"></i> Supprimer
                        </a>
                        <form id = "form-{{$partenaire->id}}" action="{{route('delete-partenaire',['partenaire'=>$partenaire->id])}}" 
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
        </tbody> 
        <div class="float-end" style="float:right;">{{ $partenaires->links()}}</div>     
        </table>
    </div>
@endsection