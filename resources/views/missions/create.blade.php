@extends('general-layout')
@section('content')
<div class="card card-secondary rounded shadow-sm" style="margin:20px;">
    <div class="card-header">
        <h3 class="card-title">Enrégistrer une mission</h3>
    </div>
        @if(session()->has("success"))
        <div class="shadow-lg alert alert-info" style="margin:4px;width:720px; float:right;" >
          <h5>{{session()->get('success')}}</h5>
        </div>
        @endif
    <!-- /.card-header -->
    <form class="row g-3" action="{{route('store-mission')}}" method="post">
        @csrf
        <div class="card-body row">
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Nom de l'intéressé</label>
                <input name="nom" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Nom : ">
            </div>
            <div class="form-group col-md-6">
                <label for="exampleInputEmail1">Prénom de l'intéressé</label>
                <input name="prenom" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Prénom : ">
            </div>
            <div class="col-md-6">
                <!-- textarea -->
                <div class="form-group">
                <label>Fonction</label>
                <textarea required name="fonction" class="form-control" rows="3" placeholder="Saisir ... "></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <!-- textarea -->
                <div class="form-group">
                <label>Motif</label>
                <textarea required name="motif" class="form-control" rows="3" placeholder="Saisir ..."></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <!-- select -->
                <div class="form-group">
                    <label>Partenaire</label>
                    <select required name="partenaire_id" class="form-control shadow-sm">
                        @foreach($partenaires as $partenaire)
                            <option value="{{$partenaire->id}}">{{$partenaire->nom}}</option>
                        @endforeach
                    </select>
                </div>
            </div> 
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Destination</label>
                <input name="destination" required type="text" class="form-control" id="exampleInputEmail1" placeholder="Destination : ">
            </div>
            <div class="form-group col-md-3">
                <label>Mode Trans</label>
                <select required name="mode_transport" class="form-control">
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
                    <select required name="statut" class="form-control">
                    <option>En attente</option>
                    <option>En cours</option>
                    <option>Accomplie</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Date dép</label>
                <input name="date_depart" required type="date" class="form-control" id="exampleInputEmail1">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Date ret</label>
                <input name="date_retour" required type="date" class="form-control" id="exampleInputEmail1">
            </div> 
            <div class="form-group col-md-3">
                <label>Frais trans</label>
                <select required name="frais_transport" class="form-control">
                    <option>Intéressé</option>
                    <option>Commune</option>
                    <option>Partenaire</option>
                    <option>Partenaire,Commune</option>
                    <option>Partenaire,Commune,Interessé</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label>Frais séjour</label>
                <select required name="frais_sejour" class="form-control">
                    <option>Intéressé</option>
                    <option>Commune</option>
                    <option>Partenaire</option>
                    <option>Partenaire,Commune</option>
                    <option>Partenaire,Commune,Interessé</option>
                </select>
            </div><hr>
            <div class="form-group col-md-6">
                <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Enregistrer</button>
                <a href="{{route('missions')}}"class="btn btn-secondary"><i class="fas fa-times-circle"></i> Annuler</a>
            </div>
        </div>
    </form>
</div>
@endsection