@extends('general-layout')
@section('content')
<div class="card card-secondary rounded shadow-sm" style="margin:20px;">
    <div class="card-header">
        <h3 class="card-title">Modifier les informations de la mission</h3>
    </div>
        @if(session()->has("success"))
        <div class="shadow-lg alert alert-info" style="margin:4px;width:720px; float:right;" >
          <h5>{{session()->get('success')}}</h5>
        </div>
        @endif
    <!-- /.card-header -->
    <form class="row g-3" action="{{route('update-mission', ['mission'=>$mission->id])}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="put">
        <div class="card-body row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Nom de l'intéressé</label>
                <input value="{{$mission->nom}}" name="nom" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom : ">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Prénom de l'intéressé</label>
                <input value="{{$mission->prenom}}"  name="prenom" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Prénom : ">
            </div>
            <div class="col-md-6">
                <!-- textarea -->
                <div class="form-group">
                <label>Fonction</label>
                <textarea value=""  required name="fonction" class="form-control" rows="3" placeholder="Saisir ... ">{{$mission->fonction}}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <!-- textarea -->
                <div class="form-group">
                <label>Motif</label>
                <textarea disabled="true" required name="motif" class="form-control" rows="3" placeholder="Saisir ...">{{$mission->motif}}</textarea>
                </div>
            </div>
            <div class="col-md-3">
                <!-- select -->
                <div class="form-group">
                    <label>Partenaire</label>
                    <select disabled = "true" required name="partenaire_id" class="form-control shadow-sm">
                        @foreach($partenaires as $partenaire)
                            @if($partenaire->id == $mission->partenaire_id)
                            <option value="{{$partenaire->id}}" selected>{{$partenaire->nom}} {{$partenaire->validite}}</option>
                            @else
                            <option value="{{$partenaire->id}}">{{$partenaire->nom}} {{$partenaire->validite}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Destination</label>
                <input value="{{$mission->destination}}" disabled="true" name="destination" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Destination : ">
            </div>
            <div class="form-group col-md-3">
                <label>Mode Trans</label>
                <select value="{{$mission->mode_transport}}" required name="mode_transport" class="form-control">
                    <option value="{{$mission->mode_transport}}" selected >{{$mission->mode_transport}}</option>
                    <option>Avion</option>
                    <option>Train</option>
                    <option>Voiture</option>
                </select>
            </div>
            <!-- statut -->
            <div class="col-md-3">
                <!-- select -->
                <div class="form-group">
                    <label>Statut</label>
                    <select value="{{$mission->statut}}" required name="statut" class="form-control">
                    <option value="{{$mission->mode_statut}}" selected >{{$mission->statut}}</option>
                    <option>En attente</option>
                    <option>En cours</option>
                    <option>Accomplie</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Date dép</label>
                <input value="{{$mission->date_depart}}" name="date_depart" required type="date" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Date ret</label>
                <input value="{{$mission->date_retour}}" name="date_retour" required type="date" class="form-control" id="exampleInputEmail1">
            </div> 
            <div class="form-group col-md-3">
                <label>Frais trans</label>
                <select value="{{$mission->frais_transport}}" required name="frais_transport" class="form-control">
                    <option value="{{$mission->frais_transport}}" selected >{{$mission->frais_transport}}</option>
                    <option>Intéressé</option>
                    <option>Commune</option>
                    <option>Partenaire</option>
                    <option>Partenaire,Commune</option>
                    <option>Partenaire,Commune,Interessé</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Frais séjour</label>
                <select value="{{$mission->frais_sejour}}" required name="frais_sejour" class="form-control">
                    <option value="{{$mission->frais_sejour}}" selected >{{$mission->frais_sejour}}</option>
                    <option>Intéressé</option>
                    <option>Commune</option>
                    <option>Partenaire</option>
                    <option>Partenaire,Commune</option>
                    <option>Partenaire,Commune,Interessé</option>
                </select>
            </div><hr>
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Modifier</button>
                <a href="{{route('missions')}}"class="btn btn-secondary"><i class="fas fa-times-circle"></i> Annuler</a>
            </div>
        </div>
    </form>
</div>
@endsection