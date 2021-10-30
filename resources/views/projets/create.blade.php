@extends('general-layout')
@section('content')
    <div class="card card-secondary" style="margin:15px 15px">
        <div class="card-header">
        <h3 class="card-title">Enrégistrer un projet</h3>
        </div>
        @if(session()->has("success"))
        <div class="shadow-lg alert alert-info" style="margin:4px;width:720px; float:right;" >
          <h5>{{session()->get('success')}}</h5>
        </div>
        @endif
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('store-projet')}}" method="post">
            @csrf
        <div class="card-body row g-3">
            <div class="col-sm-12">
                <!-- textarea -->
                <div class="form-group">
                <label>Libellé</label>
                <textarea required name="libelle" class="form-control" rows="3" placeholder="Saisir ... "></textarea>
                </div>
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Cout</label>
                <input required name="cout" type="text" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group col-md-3">
                <label for="exampleInputEmail1">Date d'initiation</label>
                <input required name="date_initiation" type="date" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>
            <!-- select -->
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
            <!-- statut -->
            <div class="col-md-3">
                <!-- select -->
                <div class="form-group">
                    <label>Statut</label>
                    <select required name="statut" class="form-control">
                    <option>En attente</option>
                    <option>En cours</option>
                    <option>Réalisé</option>
                    </select>
                </div>
            </div>           
            <!--end form body  -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Enregistrer</button>
            <a href="{{route('projets')}}" 
            class="btn btn-secondary"><i class="fas fa-times-circle"></i> Annuler</a>
        </div>
        </form>
    </div>  
            <!-- /.card -->
@endsection