@extends('general-layout')
@section('content')
    <div class="card card-secondary" style="margin:15px 15px">
        <div class="card-header">
        <h3 class="card-title">Enrégistrer une convention</h3>
        </div>
        @if(session()->has("success"))
        <div class="shadow-lg alert alert-info" style="margin:4px;width:720px; float:right;" >
          <h5>{{session()->get('success')}}</h5>
        </div>
        @endif
        
        <!-- /.card-header -->
        <!-- form start -->
        <form role="form" action="{{route('store-convention')}}" method="post" enctype = "multipart/form-data">
            @csrf
        <div class="card-body row g-3">
            <div class="form-group col-md-6">
                <label>Partenaire</label>
                <select required name="partenaire_id" class="form-control shadow-sm">
                        @foreach($partenaires as $partenaire)
                    <option value="{{$partenaire->id}}">{{$partenaire->nom}}</option>
                        @endforeach
                </select> 
            </div>
            <div class="form-group col-md-6">
                <label>Type de convention</label>
                <select required name="type" class="form-control" >
                    <option>Nord-Sud</option>
                    <option>Sud-Sud</option>
                    <option>Ville-Organisation</option>
                    <option>Réseaux de villes</option>
                </select> 
            </div>
            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                <label>Domaines</label>
                <textarea required name="domaines" class="form-control" rows="3" placeholder="Saisir ..."></textarea>
                </div>
            </div>
            <div class="col-sm-6">
                <!-- textarea -->
                <div class="form-group">
                <label>Objectif</label>
                <textarea required name="objet" class="form-control" rows="3" placeholder="Saisir ..."></textarea>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Date signature</label>
                <input required name="date_sign" type="date" class="form-control" id="exampleInputEmail1" placeholder="">
            </div>
            <div class="form-group col-md-4">
                <label for="exampleInputEmail1">Validité</label>
                <input required name="validite" value="" type="text" class="form-control" id="exampleInputEmail1" placeholder="xxxx-yyyy">
            </div>
            <!-- select -->
            <div class="col-md-4">
                <!-- select -->
                <div class="form-group ">
                    <label>Statut</label>
                    <select required name="statut" class="form-control shadow-sm">
                    <option>En cours</option>
                    <option>Expirée</option>
                    </select>
                </div>
            </div>            
            <!-- end select -->
            <div class="form-group col-md-12">
                <label for="formFile" class="form-label">Importer le document</label>
                <input required class="form-control" type="file" id="formFile" name="file">
            </div>
            <div class="col-sm-12">
                <!-- textarea -->
                <div class="form-group">
                <label>Perspectives</label>
                <textarea name="perspectives" class="form-control" rows="3" placeholder="Saisir ..."></textarea>
                </div>
            </div>

            <!--end form body  -->
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
        <button type="submit" class="btn btn-info"><i class="fas fa-save"></i> Enregistrer</button>
            <a href="{{route('conventions')}}" 
            class="btn btn-secondary"><i class="fas fa-times-circle"></i> Annuler</a>
        </div>
        </form>
    </div>  
            <!-- /.card -->
@endsection