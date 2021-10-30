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
              <li class="breadcrumb-item active">Missions</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class=".my-3 p-3 bg-body" style="margin:10px;">
            <div class="mt-4 mb-2">
                <a href="{{route('create-mission')}}" class="btn btn-secondary button-create">+</a>
            </div>
            <table class="table table-borered table-hover mt-4 shadow-sm">
            <thead class="table-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom(s)</th>
                <th scope="col">Destination</th>
                <th scope="col">Mode Trans</th>
                <th scope="col">Date dep</th>
                <th scope="col">Date retour</th>
                <th scope="col">Statut</th>
                <th scope="col">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($missions as $mission)
                <tr>
                <th scope="row">{{ $loop->index + 1}}</th>
                <td>{{ $mission->nom}}</td>
                <td>{{ $mission->prenom}}</td>
                <td>{{ $mission->destination}}</td>
                <td>{{ $mission->mode_transport}}</td>
                <td>{{ $mission->date_depart}}</td>
                <td>{{ $mission->date_retour}}</td>
                <td>{{ $mission->statut}}</td>
                <td>
                    <div class="div" style="display:flex;">
                        <div class="" style="padding:4px 4px;">
                            <a href="/missions/{{$mission->id}}" class="btn btn-primary"
                                ><i class="fas fa-eye" style="color:black;"></i> Voir
                            </a>
                        </div>
                        <div class="div" style="padding:4px 4px;">
                            <a href="/missions/{{$mission->id}}/edit" class="btn btn-warning"><i class="fas fa-edit"></i> Modifier
                            </a>
                        </div>
                        <div class="div" style="padding:4px 4px;">
                        <a href="" class="btn btn-danger"
                            onclick = "if(confirm('Supprimer cette mission ?'))
                            {document.getElementById('form-{{$mission->id}}').submit() }"><i class="fas fa-trash-alt"></i> Supprimer
                        </a>
                        <form id = "form-{{$mission->id}}" action="{{route('delete-mission',['mission'=>$mission->id])}}" 
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
            <div class="float-end" style="float:right;">{{ $missions->links()}}</div>       
            </table>
    </div>
@endsection