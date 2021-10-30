@extends('general-layout')
@section('content')
<!-- Head -->
 <!-- Content Header (Page header) -->
 <div class="content-header shadow-lg">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          <h2 class="border-bottom pb-2 mb-6 ">Conventions expirées</h2>
          </div><!-- /.col -->

          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin')}}"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active">Conventions</li>
            </ol>
          </div><!-- /.col -->
          <!-- Barre de recherche -->
         <form class="form-inline ml-3" method="get" action="{{route('searchconv')}}">
                <div class="input-group input-group-sm shadow-sm">
                    <input name="search" class="form-control form-control-navbar" type="search" placeholder="Recharche par 'partenaire'" aria-label="">
                    <div class="input-group-append">
                    <button class="btn btn-secondary" type="submit">
                        <i class="fas fa-search"></i>
                    </button>
                    </div>
                </div>
            </form>
          <!-- //search -->
        </div><!-- /.row -->
            <div class="div" style="padding:4px 4px;">
                <a href="{{route('export-conventions')}}" class="btn btn-success"
                    ><i class="fas fa-download"></i> Télécharger la liste
                </a>
            </div>      
      </div><!-- /.container-fluid -->
            @if(session()->has("error"))
                <h5 class="shadow-lg alert alert-danger">{{session()->get('error')}}</h5>
            @endif
 </div>
    <!-- /.content-header -->
    
    
    <!-- Data grid -->
    <div class=".my-3 p-3 bg-body" style="margin:4px 4px;">
        <div class="mt-4 mb-2" style="display:flex;">
            <a href="{{route('create-convention')}}" class="btn btn-secondary button-create">+</a>
        </div>
        <table class="table table-borered table-hover mt-4 rounded shadow-sm">
        <thead class="table-dark">
            <tr>
            <th scope="col">#</th>
            <th scope="col">Partenaire</th>
            <th scope="col">Type</th>
            <th scope="col">Date-sign</th>
            <th scope="col">Validité</th>
            <th scope="col">Statut</th>
            <th scope="col">action</th>
            <th scope="col">Document</th>
            </tr>
        </thead>
        <tbody>
            @foreach($conventions as $convention)
            <tr>
            <th scope="row">{{ $loop->index + 1}}</th>
            <td>{{ $convention->partenaire->nom}}</td>
            <td>{{ $convention->type}}</td>
            <td>{{ $convention->date_sign}}</td>
            <td>{{ $convention->validite}}</td>
            <td>{{ $convention->statut}}</td>
            <td>
                <div class="div" style="display:flex;">
                    <div class="" style="padding:4px 4px;">
                        <a href="/conventions/{{$convention->id}}" class="btn btn-primary" 
                            ><i class="fas fa-eye" style="color:black;"></i> Voir
                        </a>
                    </div>
                    <div class="div" style="padding:4px 4px;">
                        <a href="/conventions/{{$convention->id}}/edit" class="btn btn-warning"
                            ><i class="fas fa-edit"></i> Modifier
                        </a>
                    </div>
                    <!-- <div class="div" style="padding:4px 4px;">
                        <a href="/conventions/{{$convention->id}}" class="btn btn-danger"
                            ><i class="fas fa-trash-alt"></i>
                        </a>
                    </div> -->
                </div>           
            </td>
            <td>
                    <div class="div" style="padding:4px 4px;">
                        <a href="{{route('download',$convention->file)}}" class="btn btn-success"
                            ><i class="fas fa-download"></i> Télécharger
                        </a>
                    </div>
            </td>
            </tr>
           @endforeach
        </tbody> 
        <div class="float-end" style="float:right;">{{ $conventions->links()}}</div>     
        </table>
    </div>
@endsection