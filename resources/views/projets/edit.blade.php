@extends('general-layout')
@section('content')
<div class="card card-secondary rounded shadow-sm" style="margin:20px;">
    <div class="card-header">
        <h3 class="card-title">Modifier le projet</h3>
    </div>
        @if(session()->has("success"))
        <div class="shadow-lg alert alert-info" style="margin:4px;width:720px; float:right;" >
          <h5>{{session()->get('success')}}</h5>
        </div>
        @endif
    <!-- /.card-header -->
    <form class="row g-3" action="{{route('update-projet', ['projet'=>$projet->id])}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="card-body row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Libelle du projet</label>
                <input value="{{$projet->libelle}}" name="libelle" required type="text" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Cout du projet</label>
                <input value="{{$projet->cout}}"  name="cout" required type="text" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="col-md-3">
                <!-- select -->
                <div class="form-group">
                    <label>Convention</label>
                    <select  required name="partenaire_id" class="form-control shadow-sm">
                        @foreach($partenaires as $partenaire)
                            @if($partenaire->id == $projet->partenaire_id)
                            <option value="{{$partenaire->id}}" selected>{{$partenaire->nom}} {{$partenaire->validite}}</option>
                            @else
                            <option value="{{$partenaire->id}}">{{$partenaire->nom}} {{$partenaire->validite}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div> 
            <!-- statut -->
            <div class="col-md-3">
                <!-- select -->
                <div class="form-group">
                    <label>Statut</label>
                    <select  required name="statut" class="form-control">
                    <option value="{{$projet->statut}}" selected >{{$projet->statut}}</option>
                    <option>En attente</option>
                    <option>En cours</option>
                    <option>Réalisé</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Date initiation</label>
                <input value="{{$projet->date_initiation}}" name="date_initiation" required type="date" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Modifier</button>
                <a href="{{route('projets')}}"class="btn btn-secondary"><i class="fas fa-times-circle"></i> Annuler</a>
            </div>
        </div>
    </form>
</div>
@endsection